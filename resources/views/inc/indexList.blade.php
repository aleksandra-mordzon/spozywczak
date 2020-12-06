<div class="flex justify-between " style="border-bottom: 2px solid {{$color}}">
        <h1 class="text-3xl flex justify-start ml-12  font-semibold" >{{$title}}</h1>
        <h1 style="color: {{$color}};" class="text-xl flex justify-end mr-12  font-semibold items-center text-gray-800 hover:text-black"><a href="#">Zobacz więcej</a></h1>
    </div>
    <div class="glide mt-3">
        <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                @foreach($Products as $product)
                    <li class="glide__slide "  >  
                        <form action="{{ route('store') }}" method="POST">
                                <div class="  relative border-solid border-2 border-white hover:border-gray-300 pb-8 mx-8"><a href="/show/{{$product->slug}}"><img src="{{ asset('img/'.$product->slug.'.jpg') }}" style="max-width:300px; min-height:300px;" class="sm:ml-40 md:ml-8">
                                    @if($product->newprice != NULL)
                                        <b class="text-red-800 sm:ml-32 md:ml-4">{{$product->price}} zł</b> <s>{{$product->newprice}} zł</s>

                                    @else
                                        <b class="sm:ml-32 md:ml-4">{{$product->price}} zł</b> 
                                    @endif
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $product->title }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <button type="submit" class=" ">
                                    <i class="fa fa-cart-plus sm:mr-32 md:mr-8 absolute  right-0  hover:text-green-800" style="font-size:36px"></i>
                                </button>
                                <br><div class="sm:ml-32 md:ml-4 mt-1">{{$product->title}}</div></a></div>
                                
                        </form>
                        
                    </li>
                    @endforeach
                </ul>
        </div>
        <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left {{$arrowColor}}" data-glide-dir="<"><i class="fa fa-arrow-left" style="font-size:36px"></i></button>
            <button class="glide__arrow glide__arrow--right {{$arrowColor}}" data-glide-dir=">"><i class="fa fa-arrow-right" style="font-size:36px"></i></button>
        </div>
</div>