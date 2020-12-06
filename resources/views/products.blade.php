@extends('layouts.app')

@section('content')

<div class="sm:mx-2 lg:mx-8 xl:mx-48 mt-8 pb-12">
    <div class="sm:float-none sm:mb-16 md:mb-0 md:float-left md:sticky top-0 pt-5">
        <div class=" items-start text-gray-900 " style="display:block;"><a href="/" class="hover:text-black"><i class="fa fa-home mr-1" aria-hidden="true" style="font-size:24px"></i></a><a href="#" class="hover:text-black"><i class="fa fa-angle-double-right mx-1" style="font-size:24px"></i> {{$name}} </a></div>

        <div class="mt-8 sm:w-full md:w-48">
            <div>
                <div class="text-xl"  style="border-bottom: 2px solid #CD5C5C">Kategorie</div>
                <ul class="ml-2">
                @foreach($categories as $category)
                    <li ><a href="{{ url('products/'.$list.'/'.$category->slug) }}" class="category">{{$category->name}}</a></li>
                @endforeach
                </ul>
            </div>


            <div>
                <div class="text-xl mt-24"  style="border-bottom: 2px solid #CD5C5C">Cena</div>
                    <div class=" justify-center mt-2">
                
                <form method="get" class="joinQuery">
                    <input id="price" value={{$minPrice}} onclick="this.value=''" class="w-1/3 mr-1 rounded  text-center" name="minPrice"  style="border: 1px solid #8c8c89">zł - <input class="w-1/3 mr-1 ml-2 rounded text-center" name="maxPrice" value={{$maxPrice}}   onclick="this.value=''" style="border: 1px solid #8c8c89">zł
                    </div>
                    <button class="bg-red-200 px-4 mt-2 text-sm rounded-lg absolute right-0 mr-1 "><i class="fa fa-search  text-gray-800 cursor-pointer hover:text-gray-500 " style="font-size:12px;"></i></button>
                </form>
                
            </div>
        </div>
            
    </div>


    <div class="md:ml-8 lg:ml-64 ">
    
        <div class="flex justify-between mb-8">
            <div class="text-3xl font-semibold  ml-8">{{$name}}</div>
            @if($name!='Nowości')
            <div class="text-xl mt-3 right">
            <form method="get"  class="joinQuery">
                <select name="filters" >
                    <option value="" disabled="disabled" selected="selected">Sortuj według</option>
                    <option value="1">Ceny rosnąco</option>
                    <option value="2">Ceny malejąco</option>
                    <option value="3">Najnowszych</option>
                    <option value="4">Bestseller</option>
                </select>
                <input type="submit" value="Submit"/>
                </form>
            </div>
            @endif
        </div>
            
            
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @foreach($products as $product)
                
                <form action="{{ route('store') }}" method="POST">
                    <div class="  relative border-solid border-2 border-white hover:border-gray-300 pb-8 mx-8" style="min-width:258px!important"><a href="/show/{{$product->slug}}"><img src="{{asset('img/'.$product->slug.'.jpg') }}" style="min-width:228px!important;  ">
                        @if($product->newprice != NULL)
                            <b class="text-red-800 ml-4">{{$product->price}} zł</b> <s>{{$product->newprice}} zł</s>

                        @else
                            <b class="ml-4">{{$product->price}} zł</b> 
                        @endif
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->title }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <button type="submit" class=" ">
                            <i class="fa fa-cart-plus mr-8 absolute  right-0  hover:text-green-800" style="font-size:36px"></i>
                        </button>
                        <br><div class="ml-4 mt-1">{{$product->title}}</div></a>
                    </div>
                </form>
            @endforeach 
        </div>

            @if($list!='new' and $list!='sale' )
            <div class="flex justify-center pt-10 ">
               {{ $products->links() }}
            </div>
            @endif

    </div>
       
</div>
    

<script>
    $('.joinQuery').on('submit',function(e){
        
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
    });


    $('.category').on('click',function(e){
        
            this.href+=window.location.search;
        
    });

</script>

@endsection