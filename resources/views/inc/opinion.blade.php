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