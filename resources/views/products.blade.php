@extends('layouts.app')

@section('content')
<div class="mx-64 mt-8">
    <div class="float-left sticky top-0 pt-5">
    <div class=" items-start text-gray-900 " style="display:block;"><a href="/" class="hover:text-black"><i class="fa fa-home mr-1" aria-hidden="true" style="font-size:24px"></i></a><a href="#" class="hover:text-black"><i class="fa fa-angle-double-right mx-1" style="font-size:24px"></i> Nowości </a></div>
    
        

        <div class="mt-8 w-48 ">
            <div>
                <div class="text-xl"  style="border-bottom: 2px solid #CD5C5C">Nowości</div>
                    <ul class="ml-2">
                        <li class='hideshow' value='hide/show' t=1><a href="#">Pieczywo</a></li>
                            <ul class="ml-3" id="content1" >
                                <li><a href="#">Chleb</a></li>
                                <li><a href="#">Bułki</a></li>
                                <li><a href="#">Bagietki</a></li>
                            </ul>
                        <li ><a href="#">Owoce</a></li>
                        <li><a href="#">Warzywa</a></li>
                        <li class='hideshow' value='hide/show' t=2><a href="#">Słodycze</a></li>
                            <ul class="ml-3" id="content2" > 
                            <li><a href="#">Batoniki</a></li>
                            <li><a href="#">Chipsy</a></li>
                            </ul>
                    </ul>
                </div>
                <div>
                    <div class="text-xl mt-24"  style="border-bottom: 2px solid #CD5C5C">Cena</div>
                        <div class=" justify-center mt-2">
                        <input  class="w-1/3 mr-1 rounded  text-center" style="border: 1px solid #8c8c89">zł - <input  class="w-1/3 mr-1 ml-2 rounded text-center" style="border: 1px solid #8c8c89">zł
                        </div>
                </div>
                
            </div>
            
        </div>

        <div class="ml-64 ">
        
            <div class="flex justify-between mb-8">
                <div class="text-3xl font-semibold  ml-8">Nowości</div>
                <div class="text-xl mt-3 right">
                    <select>
                        <option value="" disabled="disabled" selected="selected">Sortuj według</option>
                        <option value="1">Ceny rosnąco</option>
                        <option value="2">Ceny malejąco</option>
                        <option value="3">Najnowszych</option>
                        <option value="4">Bestseller</option>
                    </select>
                </div>
            </div>
            
            <div class="flex mb-10">
                <div class="w-1/3 relative border-solid border-2 border-white hover:border-gray-300 pb-8 mx-8" style="max-width:310px;">
                    <a href="#"><img src="{{asset('img/chleb.jpg') }}"><b class="text-xl ml-4">1.49 zł</b> <i class="fa fa-cart-plus mr-8 absolute  right-0  hover:text-green-800" style="font-size:36px"></i><br><div class="ml-4">Chleb pszenny</div></a>
                </div>
                <div class="w-1/3  relative border-solid border-2 border-white hover:border-gray-300 pb-8 mx-8" style="max-width:310px;">
                    <a href="#"><img src="{{asset('img/chleb.jpg') }}"><b class="text-xl ml-4">1.49 zł</b> <i class="fa fa-cart-plus mr-8 absolute  right-0  hover:text-green-800" style="font-size:36px"></i><br><div class="ml-4">Chleb pszenny</div></a>
                </div>
                <div class="w-1/3 relative border-solid border-2 border-white hover:border-gray-300 pb-8 mx-8" style="max-width:310px;">
                    <a href="#"><img src="{{asset('img/chleb.jpg') }}"><b class="text-xl ml-4">1.49 zł</b> <i class="fa fa-cart-plus mr-8 absolute  right-0  hover:text-green-800" style="font-size:36px"></i><br><div class="ml-4">Chleb pszenny</div></a>
                </div>
            </div>
            <div class="flex mb-10">
                <div class="w-1/3 relative border-solid border-2 border-white hover:border-gray-300 pb-8 mx-8 " style="max-width:310px;">
                    <a href="#"><img src="{{asset('img/chleb.jpg') }}"><b class="text-xl ml-4">1.49 zł</b> <i class="fa fa-cart-plus mr-8 absolute  right-0  hover:text-green-800" style="font-size:36px"></i><br><div class="ml-4">Chleb pszenny</div></a>
                </div>
                <div class="w-1/3  relative border-solid border-2 border-white hover:border-gray-300 pb-8 mx-8" style="max-width:310px;">
                    <a href="#"><img src="{{asset('img/chleb.jpg') }}"><b class="text-xl ml-4">1.49 zł</b> <i class="fa fa-cart-plus mr-8 absolute  right-0  hover:text-green-800" style="font-size:36px"></i><br><div class="ml-4">Chleb pszenny</div></a>
                </div>
                <div class="w-1/3 relative border-solid border-2 border-white hover:border-gray-300 pb-8 mx-8" style="max-width:310px;">
                    <a href="#"><img src="{{asset('img/chleb.jpg') }}"><b class="text-xl ml-4">1.49 zł</b> <i class="fa fa-cart-plus mr-8 absolute  right-0  hover:text-green-800" style="font-size:36px"></i><br><div class="ml-4">Chleb pszenny</div></a>
                </div>
            </div>
            <div class="flex mb-10">
                <div class="w-1/3 relative border-solid border-2 border-white hover:border-gray-300 pb-8 mx-8" style="max-width:310px;">
                    <a href="#"><img src="{{asset('img/chleb.jpg') }}"><b class="text-xl ml-4">1.49 zł</b> <i class="fa fa-cart-plus mr-8 absolute  right-0  hover:text-green-800" style="font-size:36px"></i><br><div class="ml-4">Chleb pszenny</div></a>
                </div>
                <div class="w-1/3  relative border-solid border-2 border-white hover:border-gray-300 pb-8 mx-8" style="max-width:310px;">
                    <a href="#"><img src="{{asset('img/chleb.jpg') }}"><b class="text-xl ml-4">1.49 zł</b> <i class="fa fa-cart-plus mr-8 absolute  right-0  hover:text-green-800" style="font-size:36px"></i><br><div class="ml-4">Chleb pszenny</div></a>
                </div>
                <div class="w-1/3 relative border-solid border-2 border-white hover:border-gray-300 pb-8 mx-8" style="max-width:310px;">
                    <a href="#"><img src="{{asset('img/chleb.jpg') }}"><b class="text-xl ml-4">1.49 zł</b> <i class="fa fa-cart-plus mr-8 absolute  right-0  hover:text-green-800" style="font-size:36px"></i><br><div class="ml-4">Chleb pszenny</div></a>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script>

$(document).ready(function () {
    $('ul[id^="content"]').hide();
 $(".hideshow").click(function(){
    $("#content" + $(this).attr('t')).toggle();
 }); 
});

</script>

@endsection