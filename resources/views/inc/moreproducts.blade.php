<div class="ml-64 text-2xl">Zobacz również:</div>


<div class="glide mt-3 mb-16 absolute bottom-0">
        <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                @foreach($randomproducts as $rproduct)
                <li class="glide__slide "  ><div class="hover:shadow-2xl px-12 relative"><a href="/show/{{$rproduct->slug}}"><img src="{{ asset('img/products/'.$rproduct->slug.'.jpg') }}" style="max-width:300px;  min-height:300px;" class="ml-10">
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