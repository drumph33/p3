@extends('layouts.master')

@section('title')
    Pasta Cooking Directions
@endsection

@section('content')
    <div class='container'>
        <h1 class='text-center'>Pasta Cooking Instructions</h1>
        <!-- The what you will need section-->
        <div class='panel-group'>
            <div class='panel panel-info'>
                <div class='panel-heading'><h2 class='text-center'>What You Will Need</h2></div>
                <div class='panel-body'>
                    <div class='img-group'>
                        <!-- Display the correct number of water images-->
                        @for($i = 0; $i < $data['water']; $i++)
                            <img src='/images/water.jpg' alt='quart of water' height='80' width='80'>
                        @endfor
                        <!-- Display the other images and text to sum up-->
                        <img src='/images/salt.jpg' alt='salt' height='80' width='80'>
                        <img src='/images/pot.png' alt='pot' height='80' width='80'>
                        <img src='/images/pan.png' alt='pan' height='80' width='80'>
                        <img src='/images/sauce.png' alt='sauce' height='80' width='100'>
                        <img src="/images/<?=$data['pasta']?>.jpg" alt='pasta' height='80' width='80'>
                    </div>
                    <h5>{{ $data['water'] }} quarts of water, lots of salt, a large pot, a large sauce pan, a sauce of your choosing,
                         and {{ $data['quantity'] }} oz. of dry {{ $data['pasta'] }}</h5>
                </div>
            </div>
            <!-- Directions paragraph-->
            <div class='panel panel-info'>
                    <div class='panel-heading'><h2 class='text-center'>Directions</h2></div>
                    <div class='panel-body'>
                    <h3 class='text-justify'>To cook {{ $data['quantity'] }} ounces of {{ $data['pasta'] }} with {{ $data['cook'] }} consistency,
                    you will first need to bring {{ $data['water'] }} quarts of very salty water to a hard boil.
                    Next, add in the full amount of pasta while occasionally stirring for the first 2 minutes.
                    Remember to keep the heat high so that the water stays at a hard boil the entire time. The desired
                    cooking time to achieve {{ $data['cook'] }} {{ $data['pasta'] }} will be {{ $data['time'] }} minutes. After the pasta has
                    boiled for this amount of time, reserve 1/8 cup of the pasta water and then strain the pasta.
                    Place the pasta into a large sauce pan and combine with reserved pasta water and warmed pasta sauce. Heat
                    together for 2 minutes. Top with herbs or cheese to your liking.  You will have approximately {{ $data['yield'] }} servings of {{ $data['pasta'] }} to enjoy!
                    </h3>
                </div>
            </div>
        </div>
        <img class='img-responsive' src="/images/cook<?=$data['pasta']?>.jpg" alt='cooked pasta'>
    </div>
@endsection
