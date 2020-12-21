@extends('layouts.app')

@section('content')
<style>
.isntvisible {
    margin-top: 0.75rem!important;
    margin-right: 16rem!important;
    visibility: visible!important;
    font-size: 1rem!important;
}

@media (min-width: 640px){
    .isntvisible {
    margin-right: 1rem!important;
}
}

@media (min-width: 1024px){
    .isntvisible
    {
        margin-right: 12rem!important;

    }
}
.sticky {
 position:fixed!important;
 top: 0;
}

.notsticky {
    bottom: 30px!important; 
}


div#opinion.hidden {
    display:none;
}

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700; cursor:pointer;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 




</style>

<div style="height:100%!important;" class="mt-12 lg:ml-32 xl:ml-64 sm:ml-1" >


<div class=" items-start text-gray-900 " style="display:block; "><a href="/" class="hover:text-black"><i class="fa fa-home mr-1" aria-hidden="true" style="font-size:24px"></i></a>@foreach($category as $c)<a href="/products/<?php if ($c->isgrocery) echo 'groceries'; else echo 'hygiene_products' ?>" class="hover:text-black"><i class="fa fa-angle-double-right mx-1" style="font-size:24px"></i>  @if($c->isgrocery) Produkty spożywcze @else Produkty higieniczne @endif @endforeach </a><i class="fa fa-angle-double-right mx-1" style="font-size:24px"></i>@foreach($category as $c) <a href="/products/<?php if ($c->isgrocery) echo 'groceries'; else echo 'hygiene_products' ?>/<?php echo $c->name ?>" class="hover:text-black">  {{$c->name}}</a>@endforeach<i class="fa fa-angle-double-right mx-1" style="font-size:24px"></i> <a href="#" class="hover:text-black"> {{$product->title}}</a></div>

        <div class=" md:relative lg:flex" style=" min-height:950px!important; ">
        
        <div class="relative " style="height:auto; width: 100%; max-width:500px;">
        

        <div class="lg:absolute sm:relative sm:mt-16 md:mt-5 sm:m-20 md:ml-48 lg:ml-0" id="images" style=" width: 100%; max-width:500px; padding-top:15px;">

            <img src="{{ asset('img/'.$product->slug.'.jpg') }}" class=" cursor-pointer border-solid border-2 border-gray-300 hover:border-gray-400">
            <div class="flex justify-center mt-5">
                <img src="{{ asset('img/'.$product->slug.'.jpg') }}" class="w-1/4 cursor-pointer border-solid border-2 border-gray-500 ">
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
            <?php
            $n = (strpos(strval($rating),'.')) ?  floor($rating) + 0.5 : $rating;
            if($n<=0)
            {
                $n=0;
            }
            $img='/img/'.$n.'-star.png';
            echo "<img src='$img' class='mt-4'>";
            //echo strpos(strval($product->rating),'.')
            
            ?>
            
            
            
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

            
            <form action="{{ route('writeopinion') }}" method="post">
            @csrf
            <div id="opinion" class="hidden">
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <textarea name="textopinion" class="mt-6 border border-gray-400 p-3" cols="40" rows="5" placeholder="Dodaj swoją opinię"></textarea><br>
            <div class="relative pb-16" style="max-width:500px;">
            <fieldset class="rating absolute  sm:ml-64 ml-2  lg:w-auto">
                <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="5 stars"></label>
                <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="4.5 stars"></label>
                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="4 stars"></label>
                <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="3.5 stars"></label>
                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="3 stars"></label>
                <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="2.5 stars"></label>
                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="2 stars"></label>
                <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="1.5 stars"></label>
                <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="1 star"></label>
                <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="0.5 stars"></label>
            </fieldset>
            <button type="submit" class="absolute  mt-2 right-0 bg-blue-500 hover:bg-blue-600 px-4 py-2 text-white  rounded-lg ">
                                    Dodaj  
            </button>
            </div>
            </div>
            </form>
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
                        <li class=" mb-3 comm" style="border-bottom: 1px solid lightgray">
                            <div class="flex text-xl" style="padding-bottom:0px!important;"><img src="{{asset('img/avatar.svg')}}" style="max-width:35px;" class="mr-2"> <div>{{$op->user->name}} </div><div class="text-gray-800 text-sm mt-2 ml-2"> {{$op->created_at}}</div>  </div>
                            <img src='/img/<?php echo $op->rating ?>-star.png' style="width:85px; " >
                            <div class="ml-1">{{$op->opinion}}</div>
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

<div class="ml-64 text-2xl">Zobacz również:</div>


<div class="glide mt-3 mb-16 absolute bottom-0">
        <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                @foreach($randomproducts as $rproduct)
                <li class="glide__slide "  ><div class="hover:shadow-2xl px-12 relative"><a href="/show/{{$rproduct->slug}}"><img src="{{ asset('img/'.$rproduct->slug.'.jpg') }}" style="max-width:300px;  min-height:300px;" class="ml-10">
                @if($rproduct->newprice != NULL)
                <b class="text-red-800">{{$rproduct->newprice}} zł</b> <s>{{$rproduct->price}} zł</s>

                @else
                <b>{{$rproduct->price}} zł</b> 
                @endif
                <i class="fa fa-cart-plus absolute right-0 mr-20 hover:text-green-800" style="font-size:36px"></i><br><div>{{$rproduct->title}}</div></a></div></li>
                 @endforeach
                </ul>
        </div>
        <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left glide__green" data-glide-dir="<"><i class="fa fa-arrow-left" style="font-size:36px"></i></button>
            <button class="glide__arrow glide__arrow--right glide__green" data-glide-dir=">"><i class="fa fa-arrow-right" style="font-size:36px"></i></button>
        </div>
    </div>

</div>

  </div>
   
<script>
function Toggle(num){
var con=new String("t-"+num);


var El=document.getElementById(con);
El.classList.toggle("isntvisible");
}
</script>

<script>

window.onscroll = function() {addStickyClass()};


    var images=document.getElementById("images");
var prod=document.getElementById("prod");
var sticky = images.offsetTop;
var sticky2 = prod.offsetTop;

    
function addStickyClass(){
    if($(window).width() > 1024)
{
    if (window.pageYOffset > sticky) {
        images.classList.add("sticky");
        
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