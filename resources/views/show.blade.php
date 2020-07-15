@extends('layouts.app')

@section('content')
<style>
.isntvisible {
    margin-top: 0.75rem!important;
    margin-right: 16rem!important;
    visibility: visible!important;
    font-size: 1rem!important;
}

.sticky {
 position:fixed!important;
 top: 0;
}

.notsticky {
    bottom: 30px!important; 
}
</style>

<div style="height:100%!important;" >
        <div class="mt-12 ml-64 relative " style="display: flex; min-height:950px!important; ">
        <div class=" items-start text-gray-900 absolute" style="display:block; "><a href="/" class="hover:text-black"><i class="fa fa-home mr-1" aria-hidden="true" style="font-size:24px"></i></a><a href="#" class="hover:text-black"><i class="fa fa-angle-double-right mx-1" style="font-size:24px"></i> Produkty spożywcze </a><i class="fa fa-angle-double-right mx-1" style="font-size:24px"></i><a href="#" class="hover:text-black"> Pieczywo </a><i class="fa fa-angle-double-right mx-1" style="font-size:24px"></i><a href="#" class="hover:text-black"> </a> <a href="#" class="hover:text-black"> Chleb pszenny</a></div>
        
        <div class="relative w-1/3" style="height:auto">
        <div class="absolute  mt-5  " id="images" style="max-width:546px; padding-top:15px;">
            <img src="{{ asset('img/chleb.jpg') }}" class=" cursor-pointer border-solid border-2 border-gray-300 hover:border-gray-400">
            <div class="flex justify-center mt-5">
                <img src="{{ asset('img/chleb.jpg') }}" class="w-1/4 cursor-pointer border-solid border-2 border-gray-500 ">
            </div>
        </div>
        </div>

        <div class="float-right  w-4/6 pl-24 mt-10" style=" display: block; ">
            <div class="font-semibold text-4xl">{{$product->title}}</div>
            <div class="text-xl">
            @if($product->newprice != NULL)
                <b class="text-red-800">{{$product->price}} zł</b> <s>{{$product->newprice}} zł</s>

                @else
                <b>{{$product->price}} zł</b> 
            @endif
            </div>
            <div class="flex">
            <?php
            $n = (strpos(strval($product->rating),'.')) ?  floor($product->rating) + 0.5 : $product->rating ;
            $img='/img/'.$n.'-star.png';
            echo "<img src='$img' class='mt-4'>";
            //echo strpos(strval($product->rating),'.')
            
            ?>
            
            
            
            <b class=" mt-4 font-semibold">(20)</b></div>
            <button type="submit" class=" bg-green-500 hover:bg-green-600 left-0 px-5 py-3 text-white font-semibold rounded-lg mt-10">
                                    Dodaj do koszyka  <i class="fa fa-cart-plus ml-2 " style="font-size:24px"></i>
            </button>
            <div class="mt-8 ">
                <div>
                    <div class="font-semibold text-2xl mr-64" style="border-bottom: 1px solid lightgray">Opis produktu <i class="fa fa-plus-square pt-2 cursor-pointer"  onclick="Toggle('1')" style="font-size:24px; float: right;"></i></div>
                    <div style="visibility: hidden; font-size: 0;margin: 0;" class=" text-justify" id="t-1">{{$product->summary}}</div>
                </div>
                <div>
                    <div class="font-semibold text-2xl mr-64 " style="border-bottom: 1px solid lightgray">Dane szczegółowe <i class="fa fa-plus-square pt-2 cursor-pointer" onclick="Toggle('2')" style="font-size:24px; float: right;"></i></div>
                    <div style="visibility: hidden; font-size: 0;margin: 0;" class=" text-justify" id="t-2">{{$product->details}}</div>
                </div>
                <div>
                    <div class="font-semibold text-2xl mr-64 "  style="border-bottom: 1px solid lightgray; ">Opinie <i class="fa fa-plus-square pt-2 cursor-pointer" onclick="Toggle('3')" style="font-size:24px; float: right;"></i></div>
                    <div style="visibility: hidden; font-size: 0;margin: 0;" class="pr-64 text-justify" id="t-3" >
                        <ul id="comments">
                        <li class=" mb-3 comm" style="border-bottom: 1px solid lightgray">
                            <div class="flex text-xl" style="padding-bottom:0px!important;"><img src="{{asset('img/avatar.svg')}}" style="max-width:35px;" class="mr-2"> <div>Anna </div><div class="text-gray-800 text-sm mt-2 ml-2"> 05.05.2020</div>  </div>
                            <img src="{{asset('img/5-star.png')}}" style="width:85px; " >
                            <div class="ml-1">Bardzo smaczny chlebek, polecam każdemu ;))</div>
                        </li>
                        <li class=" mt-3 mb-3 comm" style="border-bottom: 1px solid lightgray">
                            <div class="flex text-xl" style="padding-bottom:0px!important;"><img src="{{asset('img/avatar.svg')}}" style="max-width:35px;" class="mr-2"> <div>Wojciech </div><div class="text-gray-800 text-sm mt-2 ml-2"> 05.05.2020</div>  </div>
                            <img src="{{asset('img/5-star.png')}}" style="width:85px; " >
                            <div class="ml-1">Niebo w gębie!</div>
                        </li>
                        <li class=" mt-3 mb-3 comm" style="border-bottom: 1px solid lightgray">
                            <div class="flex text-xl" style="padding-bottom:0px!important;"><img src="{{asset('img/avatar.svg')}}" style="max-width:35px;" class="mr-2"> <div>Julia </div><div class="text-gray-800 text-sm mt-2 ml-2"> 05.05.2020</div>  </div>
                            <img src="{{asset('img/5-star.png')}}" style="width:85px; " >
                            <div class="ml-1">Naprawde świetnej jakości Chelb</div>
                        </li>
                        <li class=" mt-3 mb-3 comm" style="border-bottom: 1px solid lightgray">
                            <div class="flex text-xl" style="padding-bottom:0px!important;"><img src="{{asset('img/avatar.svg')}}" style="max-width:35px;" class="mr-2"> <div>Julia </div><div class="text-gray-800 text-sm mt-2 ml-2"> 05.05.2020</div>  </div>
                            <img src="{{asset('img/5-star.png')}}" style="width:85px; " >
                            <div class="ml-1">Kozak</div>
                        </li>
                        <li class=" mt-3 mb-3 comm" style="border-bottom: 1px solid lightgray">
                            <div class="flex text-xl" style="padding-bottom:0px!important;"><img src="{{asset('img/avatar.svg')}}" style="max-width:35px;" class="mr-2"> <div>Julia </div><div class="text-gray-800 text-sm mt-2 ml-2"> 05.05.2020</div>  </div>
                            <img src="{{asset('img/5-star.png')}}" style="width:85px; " >
                            <div class="ml-1">Super </div>
                        </li>
                        <li class=" mt-3 mb-3 comm" style="border-bottom: 1px solid lightgray">
                            <div class="flex text-xl" style="padding-bottom:0px!important;"><img src="{{asset('img/avatar.svg')}}" style="max-width:35px;" class="mr-2"> <div>Julia </div><div class="text-gray-800 text-sm mt-2 ml-2"> 05.05.2020</div>  </div>
                            <img src="{{asset('img/5-star.png')}}" style="width:85px; " >
                            <div class="ml-1">Dobry dobry</div>
                        </li>
                        <li class=" mt-3 mb-3 comm" style="border-bottom: 1px solid lightgray">
                            <div class="flex text-xl" style="padding-bottom:0px!important;"><img src="{{asset('img/avatar.svg')}}" style="max-width:35px;" class="mr-2"> <div>Julia </div><div class="text-gray-800 text-sm mt-2 ml-2"> 05.05.2020</div>  </div>
                            <img src="{{asset('img/5-star.png')}}" style="width:85px; " >
                            <div class="ml-1">Moja mama go uwielbia</div>
                        </li>
                        <li class=" mt-3 mb-3 comm" style="border-bottom: 1px solid lightgray">
                            <div class="flex text-xl" style="padding-bottom:0px!important;"><img src="{{asset('img/avatar.svg')}}" style="max-width:35px;" class="mr-2"> <div>Julia </div><div class="text-gray-800 text-sm mt-2 ml-2"> 05.05.2020</div>  </div>
                            <img src="{{asset('img/5-star.png')}}" style="width:85px; " >
                            <div class="ml-1">Polecam</div>
                        </li>
                        </ul>
                        <div  class="text-gray-800 hover:text-black pb-8 pt-2"><a href="#" class="commentsBtn">Zobacz więcej</a></div>
                        
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
                <li class="glide__slide "  ><div class="hover:shadow-2xl px-12 relative"><a href="/show/{{$product->slug}}"><img src="{{ asset('img/chleb.jpg') }}" style="max-width:300px;" class="ml-10">
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