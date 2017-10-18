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
    public function results()
    {
        $datas = [
            'pasta' => 'rigatoni',
            'water' => 5,
            'cook' => 'al dente',
            'yield' => 9,
            'quantity' => 18,
            'time' => 12
        ];
        return view('directions')->with([
            'data' => $datas
        ]);
    }

}
