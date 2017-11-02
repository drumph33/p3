@extends('layouts.master')

@section('title')
    Pasta Cooking Guide
@endsection

@section('content')
    <h1 class='text-center'>Pasta Cooking Guide</h1>
    <div class='container'>
        <h4>This is an easy guide to help you cook perfect pasta.  Simply fill out the form below with
        some basic information about the pasta you would like to cook, how much you plan to cook and what
        kind of consistency you would like the pasta to have.</h4>
    </div>
    <!-- User Input Form -->
    <div class='container'>
        <div class='panel panel-info'>
            <div class="panel-heading"></div>
            <div class="panel-body">
                <form method='GET' action='/directions'>
                    <!-- Drop down menu to select the type of pasta the user is cooking -->
                    <div class='form-group'>
                        <label for='pasta'>Select which type of pasta you want to cook</label>
                        <select name='pasta' id='pasta'>
                            <option value=''>Choose a pasta...</option>
                            <option value='penne'>Penne</option>
                            <option value='rigatoni'>Rigatoni</option>
                            <option value='rotini'>Rotini</option>
                            <option value='ziti'>Ziti</option>
                            <option value='spaghetti'>Spaghetti</option>
                            <option value='vermicelli'>Vermicelli</option>
                            <option value='fettuccine'>Fettuccine</option>
                            <option value='linguine'>Linguine</option>
                            <option value='farfalle'>Farfalle</option>
                        </select>
                    </div>
                    <!--
                    Numerical input for the amount of pasta to be cooked
                    Value is set to default of 8 and must be between 1-32
                    -->
                    <div class='form-group'>
                        <label for='quantity'> Ounces of dry pasta to be cooked (1-32): </label>
                        <input type='number' name='quantity' min='1' max='32' id='quantity'>
                    </div>
                    <!-- Radio button for the type of cook on the pasta, defaults to al dente -->
                    <div class='form-group'>
                        <fieldset class='radios'>
                            <legend>What consistency would you like the pasta?</legend>
                            <label><input type='radio' name='cook' value='al dente' checked='checked'> Al dente</label>
                            <label><input type='radio' name='cook' value='soft'> Soft</label>
                        </fieldset>
                    </div>
                    <!-- Form submission buttion -->
                    <div class='form-group'>
                        <input type='submit' class='btn btn-primary btn-sm'>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if ($errors->any())
    <div class='container'>
        <div class='alert alert-danger'>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
@endsection
