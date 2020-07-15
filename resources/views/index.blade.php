@extends('layouts.app')

@section('content')
<div id="container">
    <img src="{{ asset('img/owoce.png') }}" style="padding-top:0px!important; width:100%">
    <div class="flex justify-between mx-48 my-12 font-semibold">
        <div class="flex items-center border-solid border-2 border-gray-400 p-10"><i class="fa fa-truck mr-3" style="font-size:42px;"></i> Darmowa dostawa</div>
        <div class="flex items-center border-solid border-2 border-gray-400 p-10"><i class="fa fa-comments mr-3" style="font-size:42px"></i> Obsługa klienta 24/7</div>
        <div class="flex items-center border-solid border-2 border-gray-400 p-10"><i class="fa fa-repeat mr-3" style="font-size:42px"></i> Szybki zwrot pieniędzy</div>
    </div>
    <div id="sale" class="mt-16">
    <div class="flex justify-between " style="border-bottom: 2px solid #CD5C5C">
        <h1 class="text-3xl flex justify-start ml-12  font-semibold" >Wyprzedaż</h1>
        <h1 style="color: #CD5C5C;" class="text-xl flex justify-end mr-12  font-semibold items-center text-gray-800 hover:text-black"><a href="#">Zobacz więcej</a></h1>
    </div>
    <div class="glide mt-3">
        <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                @foreach($productsSale as $product)
                <li class="glide__slide "  ><div class="hover:shadow-2xl px-12 relative"><a href="/show/{{$product->slug}}"><img src="{{ asset('img/chleb.jpg') }}" style="max-width:300px;" class="ml-10"><b class="text-red-800">{{$product->newprice}} zł</b> <s>{{$product->price}} zł</s> <i class="fa fa-cart-plus absolute right-0 mr-20 hover:text-green-800" style="font-size:36px"></i><br><div>{{$product->title}}</div></a></div></li>
                  @endforeach
                </ul>
        </div>
        <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fa fa-arrow-left" style="font-size:36px"></i></button>
            <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fa fa-arrow-right" style="font-size:36px"></i></button>
        </div>
    </div>

    </div>


    <div id="new" class="mt-24">
    <div class="flex justify-between " style="border-bottom: 2px solid #30ab51">
        <h1 class="text-3xl flex justify-start ml-12  font-semibold" >Nowe produkty</h1>
        <h1 style="color: #30ab51;" class="text-xl flex justify-end mr-12  font-semibold items-center text-gray-800 hover:text-black"><a href="#">Zobacz więcej</a></h1>
    </div>
    <div class="glide mt-3">
        <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                @foreach($productsNew as $product)
                
                <li class="glide__slide "  ><div class="hover:shadow-2xl px-12 relative"><a href="/show/{{$product->slug}}"><img src="{{ asset('img/chleb.jpg') }}" style="max-width:300px;" class="ml-10">
                @if($product->newprice != NULL)
                <b class="text-red-800">{{$product->newprice}} zł</b> <s>{{$product->price}} zł</s>

                @else
                <b>{{$product->price}} zł</b> 
                @endif
                <i class="fa fa-cart-plus absolute right-0 mr-20 hover:text-green-800" style="font-size:36px"></i><br><div>{{$product->title}}</div></a></div></li>
                
                
                @endforeach
                   
                </ul>
        </div>
        <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left glide__green" data-glide-dir="<"><i class="fa fa-arrow-left" style="font-size:36px"></i></button>
            <button class="glide__arrow glide__arrow--right glide__green" data-glide-dir=">"><i class="fa fa-arrow-right" style="font-size:36px"></i></button>
        </div>
    </div>


    <div id="top" class="mt-24">
    <div class="flex justify-between " style="border-bottom: 2px solid #4091a3">
        <h1 class="text-3xl flex justify-start ml-12  font-semibold" >Najpopularniejsze produkty</h1>
        </div>
    <div class="glide mt-3">
        <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                @foreach($productsPopular as $product)
                <li class="glide__slide "  ><div class="hover:shadow-2xl px-12 relative"><a href="/show/{{$product->slug}}"><img src="{{ asset('img/chleb.jpg') }}" style="max-width:300px;" class="ml-10">
                @if($product->newprice != NULL)
                <b class="text-red-800">{{$product->newprice}} zł</b> <s>{{$product->price}} zł</s>

                @else
                <b>{{$product->price}} zł</b> 
                @endif
                <i class="fa fa-cart-plus absolute right-0 mr-20 hover:text-green-800" style="font-size:36px"></i><br><div>{{$product->title}}</div></a></div></li>
                
                @endforeach
                </ul>
        </div>
        <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left glide__blue" data-glide-dir="<"><i class="fa fa-arrow-left" style="font-size:36px"></i></button>
            <button class="glide__arrow glide__arrow--right glide__blue" data-glide-dir=">"><i class="fa fa-arrow-right" style="font-size:36px"></i></button>
        </div>
    </div>

    </div>

<br><br>

    
</div>

@endsection