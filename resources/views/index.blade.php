@extends('layouts.app')

@section('content')
<div id="container">
    <img src="{{ asset('img/owoce.png') }}" style="padding-top:0px!important; width:100%" class="">
    <div class="flex justify-between sm:mx-0 md:mx-20 lg:mx-48 my-12 font-semibold w-auto">
        <div class="flex items-center border-solid border-2 border-gray-400 p-10"><i class="fa fa-truck mr-3" style="font-size:42px;"></i> Darmowa dostawa</div>
        <div class="flex items-center border-solid border-2 border-gray-400 p-10"><i class="fa fa-comments mr-3" style="font-size:42px"></i> Obsługa klienta 24/7</div>
        <div class="flex items-center border-solid border-2 border-gray-400 p-10"><i class="fa fa-repeat mr-3" style="font-size:42px"></i> Szybki zwrot pieniędzy</div>
    </div>

    @for ($i = 0; $i < 3; $i++)
        <div id="sale" class="mt-16">
            @include('inc.indexList', ["title"=>$ar[$i][0], "color"=>$ar[$i][1], "Products"=> $ar[$i][2], "arrowColor"=> $ar[$i][3]] )
        </div>
    @endfor
    
<br><br>
</div>

@endsection