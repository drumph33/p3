<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PastaController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }
    public function results(Request $request)
    {
        $results = [];
        $alDenteTime = 1;
        $softTime = 2;
        $div = 1; #determines the yield of the pasta, long pasta uses 1.5 short pasta uses 2
        //Process the drop down menu selection of type of pasta
        //Each type of pasta has two separate cooking times and a value to calculate the amount of servings

        $valid = $request->validate([
        'pasta' => 'required',
        'quantity' => 'required|numeric|min:1|max:32',
        'cook' => 'required'
        ]);

        $pasta = $valid['pasta'];
        //Set variable values for each type of pasta
        switch ($pasta){
            case 'farfalle':
                $alDenteTime = 13;
                $softTime = 15;
                $div = 1.5;
                break;
            case 'ziti':
                $alDenteTime = 14;
                $softTime = 15;
                $div = 1.5;
                break;
            case 'vermicelli':
                $alDenteTime = 5;
                $softTime = 7;
                $div = 2;
                break;
            case 'rigatoni':
                $alDenteTime = 12;
                $softTime = 15;
                $div = 1.5;
                break;
            case 'rotini':
                $alDenteTime = 8;
                $softTime = 10;
                $div = 1.5;
                break;
            case 'spaghetti':
                $alDenteTime = 8;
                $softTime = 10;
                $div = 2;
                break;
            case 'penne':
                $alDenteTime = 9;
                $softTime = 13;
                $div = 1.5;
                break;
            case 'linguine':
                $alDenteTime = 9;
                $softTime = 13;
                $div = 2;
                break;
            default:
                $alDenteTime = 11;
                $softTime = 13;
                $div = 2;
                break;
        }
        //Process the radio button values.
        //Sets cooking time to the appropiate value from the above list
        $cook = $valid['cook'];

        if ($cook == 'soft'){
                $time = $softTime;
        }
        else{
                $time = $alDenteTime;
        }
        //Process the quantity from the numerical text input
        $quantity = $valid['quantity'];
        //Sets the amount of water needed based on the amount of pasta to be cooked
        if ($quantity <= 4){
            $water = 3;
        }
        elseif ($quantity <= 12){
            $water = 4;
        }
        elseif ($quantity <= 18){
            $water = 5;
        }
        elseif ($quantity <= 24){
            $water = 6;
        }
        elseif ($quantity <= 28){
            $water = 7;
        }
        else{
            $water = 8;
        }
        //Calculates how many servings will be made by using the scalar set in the pasta list and the input quantity. Rounds to one decimal place
        if ($quantity > 0){
            $yield = round($quantity/$div, 1);
        }
        else{
            $yield = 0;
        }
        //Sets and returns the results
        $results = [
            'pasta'=>$pasta,
            'cook'=>$cook,
            'quantity'=>$quantity,
            'time'=>$time,
            'water'=>$water,
            'yield'=>$yield
        ];

        return view('directions')->with([
            'data' => $results
        ]);
    }

}
