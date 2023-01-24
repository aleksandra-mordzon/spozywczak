@extends('layouts.app')

@section('content')


<div style="height:100%!important;" class="mt-12 lg:ml-32 xl:ml-64 sm:ml-1" >


<div class=" items-start text-gray-900 " style="display:block; "><a href="/" class="hover:text-black"><i class="fa fa-home mr-1" aria-hidden="true" style="font-size:24px"></i></a>@foreach($category as $c)<a href="/products/<?php if ($c->isgrocery) echo 'groceries'; else echo 'hygiene_products' ?>" class="hover:text-black"><i class="fa fa-angle-double-right mx-1" style="font-size:24px"></i>  @if($c->isgrocery) Produkty spożywcze @else Produkty higieniczne @endif @endforeach </a><i class="fa fa-angle-double-right mx-1" style="font-size:24px"></i>@foreach($category as $c) <a href="/products/<?php if ($c->isgrocery) echo 'groceries'; else echo 'hygiene_products' ?>/<?php echo $c->name ?>" class="hover:text-black">  {{$c->name}}</a>@endforeach<i class="fa fa-angle-double-right mx-1" style="font-size:24px"></i> <a href="#" class="hover:text-black"> {{$product->title}}</a></div>

        <div class=" md:relative lg:flex" style=" min-height:950px!important; ">
        
        <div class="relative " style="height:auto; width: 100%; max-width:500px;">
        

        <div class="lg:absolute sm:relative sm:mt-16 md:mt-5 sm:m-20 md:ml-48 lg:ml-0" id="images" style=" width: 100%; max-width:500px; padding-top:15px;">

            <img src="{{ asset('img/products/'.$product->slug.'.jpg') }}" class=" cursor-pointer border-solid border-2 border-gray-300 hover:border-gray-400">
            <div class="flex justify-center mt-5">
                <img src="{{ asset('img/products/'.$product->slug.'.jpg') }}" class="w-1/4 cursor-pointer border-solid border-2 border-gray-500 ">
            </div>
        </div>
        </div>

        <div class="lg:float-right md:float-none sm:w-full  lg:w-4/6 sm:pl-1 lg:pl-24 mt-10 sm:text-center lg:text-left" style=" display: block; ">
            <div class="font-semibold text-4xl ">{{$product->title}}</div>
            <div class="text-xl">
            @if($product->newprice != NULL)
                <b class="text-red-800">{{$product->newprice}} zł</b> <s>{{$product->price}} zł</s>

                @else
                <b>{{$product->price}} zł</b> 
            @endif
            
            </div>
            <div class="flex sm:ml-64 md:pl-32 lg:pl-0 lg:ml-0">
                
            <img src='/img/stars/{{$img}}-star.png' class='mt-4'>
            
            <b class=" mt-4 font-semibold">({{count($opinions)}})</b></div>
            <form action="{{ route('store') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="name" value="{{ $product->title }}">
            <input type="hidden" name="price" value="{{ $product->price }}">
            <button type="submit" class=" bg-green-500 hover:bg-green-600 left-0 px-5 py-3 text-white font-semibold rounded-lg mt-10">
                                    Dodaj do koszyka  <i class="fa fa-cart-plus ml-2 " style="font-size:24px"></i>
            </button>
            </form>
            @guest
            @else
            <button type="" onclick="clickbutton()" class=" bg-blue-500 hover:bg-blue-600 left-0 px-5 py-3 text-white font-semibold rounded-lg mt-6">
                                    Dodaj opinię  <i class="fa fa-comment ml-2 " style="font-size:24px"></i>
            </button><br>

            @include('inc.opinion')
            
            @endguest
            
            <div class="mt-8 ">
                <div>
                    <div class="font-semibold text-2xl xl:mr-40 lg:mr-18 md:mr-2" style="border-bottom: 1px solid lightgray">Opis produktu <i class="fa fa-plus-square pt-2 cursor-pointer"  onclick="Toggle('1')" style="font-size:24px; float: right;"></i></div>
                    <div style="visibility: hidden; font-size: 0;margin: 0;" class=" text-justify " id="t-1">{{$product->summary}}</div>
                </div>
                <div>
                    <div class="font-semibold text-2xl  xl:mr-40 lg:mr-18 md:mr-2" style="border-bottom: 1px solid lightgray">Dane szczegółowe <i class="fa fa-plus-square pt-2 cursor-pointer" onclick="Toggle('2')" style="font-size:24px; float: right;"></i></div>
                    <div style="visibility: hidden; font-size: 0;margin: 0;" class=" text-justify" id="t-2">{{$product->details}}</div>
                </div>
                <div>
                    <div class="font-semibold text-2xl  xl:mr-40 lg:mr-18 md:mr-2"  style="border-bottom: 1px solid lightgray; ">Opinie <i class="fa fa-plus-square pt-2 cursor-pointer" onclick="Toggle('3')" style="font-size:24px; float: right;"></i></div>
                    <div style="visibility: hidden; font-size: 0;margin: 0;" class="  xl:pr-64 text-justify" id="t-3" >
                        <ul id="comments">
                        
                        @foreach($opinions as $op)
                        <li class=" mb-3 comm relative" style="border-bottom: 1px solid lightgray">
                            <div class="flex text-xl" style="padding-bottom:0px!important;"><img src="{{asset('img/avatar.svg')}}" style="max-width:35px;" class="mr-2"> <div>{{$op->user->name}} </div><div class="text-gray-800 text-sm mt-2 ml-2"> {{$op->created_at}}</div>  </div>
                            <img src='/img/stars/<?php echo $op->rating ?>-star.png' style="width:85px; " >
                            <div class="ml-1 mb-2">{{$op->opinion}}</div>
                            @if($op->user_id==Auth::id())
                                <form action="{{route('deleteopinion', $op->opinion_id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><h1 class="absolute right-0 top-0 cursor-pointer mr-2">x</h1></button>
                                </form>
                            @endif
                        </li>
                        @endforeach
                        @if(count($opinions)==0)
                        <h3>Ten produkt nie ma jeszcze żadnych opinii!</h3>
                        @endif
                        </ul>
                        @if(count($opinions)>3)
                        <div  class="text-gray-800 hover:text-black pb-8 pt-2"><a href="#" class="commentsBtn">Zobacz więcej</a></div>
                        @endif
                    </div>
                    </div>
            </div>
        </div>
        
    </div>
    
    </div>
    
    </div>

    @include('inc.moreproducts')

  </div>
   
<script>
function Toggle(num){
var con=new String("t-"+num);


var El=document.getElementById(con);
El.classList.toggle("isntvisible");
}
</script>

<script>
var images=document.getElementById("images");
var sticky = images.offsetTop;
window.onscroll = addStickyClass;
    
function addStickyClass(){
    if($(window).width() > 1024)
{
    if (window.pageYOffset > sticky) {
        images.classList.add("sticky");
        console.log(1);
        
  } 
    if  (window.pageYOffset<204 )
  {
        images.classList.remove("sticky");
  }

  if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight-236) {
        images.classList.add("notsticky");
        images.classList.remove("sticky");
        
        }
        else
        {
            images.classList.remove("notsticky");
        }
}}
    



</script>

<script>
function clickbutton()
{
        $("div#opinion").removeClass("hidden");
}
        
    
</script>

<script>
$(document).ready(function () {
$('#comments li').hide();
$('#comments li:lt(3)').show();


$('.commentsBtn').click(function() {
    if($(this).text() == 'Zobacz więcej')
    {
        
        $('#comments li').show();
        
    }
    else
    {
        $('#comments li').hide();
        $('#comments li:lt(3)').show();
    }
    $(this).text($(this).text() == 'Zobacz więcej' ? 'Zobacz mniej' : 'Zobacz więcej');


    return false;
});
});

</script>
@endsection