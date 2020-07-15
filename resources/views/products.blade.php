@extends('layouts.app')

@section('content')

<div class="mx-64 mt-8 pb-12">
    <div class="float-left sticky top-0 pt-5">
    <div class=" items-start text-gray-900 " style="display:block;"><a href="/" class="hover:text-black"><i class="fa fa-home mr-1" aria-hidden="true" style="font-size:24px"></i></a><a href="#" class="hover:text-black"><i class="fa fa-angle-double-right mx-1" style="font-size:24px"></i> {{$name}} </a></div>
    
        
        
        <div class="mt-8 w-48 ">
            <div>
                <div class="text-xl"  style="border-bottom: 2px solid #CD5C5C">Kategorie</div>
                    <ul class="ml-2">
                    @foreach($categories as $category)
                        <li ><a href="#">{{$category->category}}</a></li>
                    @endforeach
                    </ul>
                </div>
                <div>
                
                    <div class="text-xl mt-24"  style="border-bottom: 2px solid #CD5C5C">Cena</div>
                        <div class=" justify-center mt-2">
                        
                        <form method="get" class="PriceForm">
                            <input id="price" value={{$minPrice}} onclick="this.value=''" class="w-1/3 mr-1 rounded  text-center" name="minPrice"  style="border: 1px solid #8c8c89">zł - <input class="w-1/3 mr-1 ml-2 rounded text-center" name="maxPrice" value={{$maxPrice}}   onclick="this.value=''" style="border: 1px solid #8c8c89">zł
                            </div>
                            <button class="bg-red-200 px-4 mt-2 text-sm rounded-lg absolute right-0 mr-1 "><i class="fa fa-search  text-gray-800 cursor-pointer hover:text-gray-500 " style="font-size:12px;"></i></button>
                        </form>
                       
                </div>
            </div>
            
        </div>
        <div class="ml-64 ">
        
            <div class="flex justify-between mb-8">
                <div class="text-3xl font-semibold  ml-8">{{$name}}</div>
                @if($name!='Nowości')
                <div class="text-xl mt-3 right">
                <form method="get"  class="PriceForm">
                    <select name="filters" >
                        <option value="" disabled="disabled" selected="selected">Sortuj według</option>
                        <option value="1">Ceny rosnąco</option>
                        <option value="2">Ceny malejąco</option>
                        <option value="3">Najnowszych</option>
                        <option value="4">Bestseller</option>
                    </select>
                    <input type="submit" value="Submit the form"/>
                    </form>
                </div>
                @endif
            </div>
            
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
                
                @foreach($products as $product)
                    <div class="  relative border-solid border-2 border-white hover:border-gray-300 pb-8 mx-8"><a href="#"><img src="{{asset('img/chleb.jpg') }}">
                    @if($product->newprice != NULL)
                        <b class="text-red-800 ml-4">{{$product->price}} zł</b> <s>{{$product->newprice}} zł</s>

                    @else
                        <b class="ml-4">{{$product->price}} zł</b> 
                    @endif
                     <i class="fa fa-cart-plus mr-8 absolute  right-0  hover:text-green-800" style="font-size:36px"></i><br><div class="ml-4">{{$product->title}}</div></a></div>
                @endforeach
               
               
                
            </div>
            @if($name=='Produkty spożywcze' or $name=='Produkty higieniczne' or $name=='Wyniki wyszukiwania')
            <div class="flex justify-center pt-10 " style="">
               {{ $products->links() }}
               </div>
            @endif
        </div>
       
    </div>
    
</div>

<script>

$('.PriceForm').on('submit',function(e){
    var queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    if(window.location.href.indexOf('?')!== -1)
    {
        e.preventDefault();
            var formData=$(this).serialize();
            var tempArray = formData.split("&");
            for (var i=0; i<tempArray.length; i++){
                if(urlParams.has(tempArray[i].split('=')[0])){
                    urlParams.delete(tempArray[i].split('=')[0]);
                }
        }
            var fullUrl = window.location.href;
            //alert(fullUrl);
            var finalUrl = window.location.href.split('?')[0]+"?"+urlParams+'&'+formData;
            window.location.href = finalUrl;

    }
    
        })

</script>

@endsection