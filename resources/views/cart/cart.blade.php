@extends('layouts.app')

@section('content')

<div class="sm:mx-4 lg:mx-32   xl:px-48 mt-10">


    <div class="font-semibold text-4xl">Koszyk </div>
    <div class="mb-16">
                    
                @if(Cart::count()>0)

                <h3><!--{{Cart::count()}}--> 
                    <span id="result">{{Cart::count()}}</span> produkt(y) w koszyku</h3>
                <table class="table-auto mt-16">
                    
                        
                    <tbody>
                    @foreach(Cart::content() as $item)
                    
                        <tr>
                        <td class="border  px-8 " style="min-width:190px!important"><img src="{{ asset('img/'.$item->model->slug.'.jpg') }}" class="w-32"></td>
                        <td class="border  py-2 text-xl text-center" style="width:390px!important"><a href="{{route('show', $item->model->slug)}}">{{$item->model->title}} </a></td>
                        <td class="border px-8 py-2 text-xl" style="width:190px!important">  <span class="form-group"><input type="number" rowId="{{ $item->rowId }}" class="form-control prc" value="{{$item->qty}}" style="width:40px;" ></span> x {{$item->model->price}} zł</td>
                        
                        <form action="{{route('destroy', $item->rowId)}}" method="POST">
                        @csrf
                        @method('delete')
                        
                        <td class="border px-8 py-2 text-xl"> <button type="submit" title="Usuń"><i class="fa fa-trash-o" style="font-size:36px"></i></button>  </td>
                        </form>
                        </tr>
                    @endforeach
                        
                                            
                            </tbody>
                         </table>
                    </div>
                    <div class="flex justify-between">
                    <div class=" text-2xl">
                    Koszt produktów w koszyku: <b>{{Cart::subtotal()}} zł</b>
                    </div>
                    <button class="text-white font-semibold py-2 px-6 text-xl rounded" style="background-color:#4091a3"><a href="{{ route('info') }}">Dalej</a></button>

                    </div>
                
                
                @else
                Brak produktów w koszyku!

                @endif
                

</div>

<script>
$('.form-group').on('input', '.prc', function(){
    var totalSum = 0;
    $('.form-group .prc').each(function()
    {
        var inputVal = $(this).val();
        if ($.isNumeric(inputVal))
        {
            totalSum += parseFloat(inputVal);
        }
    });
    $('#result').text(totalSum);
    var rowId = $(this).attr('rowId');
    var quantity = $(this).val();
    var prevQuantity = $(this).attr('value');
    if ($.isNumeric(quantity) && (quantity != prevQuantity) && (quantity != 0))
    {
        //alert(rowId);
        
        $.ajax({
            type: 'get',
            url: '/cart/'+rowId+'/'+quantity,
            success: function(data){
                if (data == 'success') {                
                    window.location.href = '{{ route('cart') }}'
                }
                else{
                    alert('failure');
                }

            },
            error:function(data){

            }
        });
        
        //window.location.href = "{{ url('cart') }}"+'/'+rowId+'/'+quantity; 
    }
});
</script>

@endsection