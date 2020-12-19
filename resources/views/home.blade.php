@extends('layouts.app')

@section('content')
<style>
.visible {
    
    visibility: visible!important;
    font-size: 16px;
    
}

.notvisible {
    visibility: hidden;
    font-size: 0;
    margin: 0;


}

</style>
<div class=" md:relative lg:flex justify-center pt-8">
    <div>
        <div class="text-4xl pb-8 sm:text-center lg:text-left">Mój profil</div>
            <div class="sm:flex sm:justify-center lg:relative">
                
                    <img class="h-64" src="{{asset('img/profilepic.jpg') }}">
            </div> 
        </div>
        <div class="ml-16">
            <div title="Edytuj" class=" text-3xl mt-20 mb-4"> {{$user->email}} </div>
           
                <div><a href="" data-id="{{$user->id}}" class="bg-red-600 button  hover:bg-red-700 p-2  font-semibold rounded-lg text-white">Delete this account</a></div>
            
            <div class="relative" style="width:700px;">
                <div class="text-3xl mt-16 " style="border-bottom: 2px solid #CD5C5C; "> Moje dane </div>
                    <div class="static  " >
                
                        <form action="{{ route('editData') }}" method="POST">
                            @csrf
                            <div class="mt-10 absolute  ml-32">
                                <div class="pb-2 text-gray-700 ">Imię</div>
                                <div title="Edytuj " class="cursor-pointer " onclick="addClass(1)" id="d-1">{{$user->name}}</div>
                                <input type="text" value="<?php echo $user->name ?>" class="border border-gray-400 rounded pl-2  invisible" id="i-1" name="name">
                            </div>
                            <div class="mt-10  absolute mr-32 right-0">
                                <div class="pb-2 text-gray-700">Nazwisko</div>
                                <div title="Edytuj" id="d-2" class="cursor-pointer " onclick="addClass(2)">{{$user->surname}}</div>
                                <input type="text" value="<?php echo $user->surname ?>" class="border border-gray-400 rounded pl-2  invisible" id="i-2" name="surname" >

                            </div>
                    
                    
                    
                            <div class="mt-32  absolute ml-32">
                                <div class="pb-2 text-gray-700">Hasło</div>
                                <div title="Edytuj" id="d-3" class="cursor-pointer " onclick="addClass(3)">Zmień</div>
                                <input type="password" placeholder="Nowe hasło" class="border border-gray-400 rounded pl-2  invisible" id="i-3" name="password" >
                                <input type="password" placeholder="Powtórz hasło" class="border border-gray-400 rounded pl-2 ml-4 invisible" id="i-4" name="password2" >


                            </div>
                            <button class="absolute  right-0 text-white font-semibold sm:mr-32 md:mr-1  py-2 px-4 mt-56 rounded" style="background-color:#CD5C5C">Zapisz</button>
                        </form>
                    </div>

                
                <div class="text-3xl mt-64 pt-10 " style="border-bottom: 2px solid #4091a3 "> Moje zamówienia </div>
                <div class="static  mt-5 " >
                    
                        @if(count($productcart)>0 )
                        <table class="table-auto">
                            <thead>
                                <tr>
                                <th class="px-4 py-2">Lista zakupów</th>
                                <th class="px-4 py-2">Data</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Cena</th>
                                </tr>
                            </thead>
                        <tbody>
                        @foreach($productcart as $product)
                            <tr>
                                <td class="border px-4 py-2">{{$product->products}}</td>
                                <td class="border px-4 py-2">{{$product->created_at}}</td>
                                <td class="border px-4 py-2">{{$product->status}}</td>
                                <td class="border px-4 py-2">{{$product->total_price}} zł</td>
                            </tr>
                        @endforeach
                        </tbody>

                        </table>
                            @else
                            <h3>Nie masz jeszcze żadnych zamówień!</h3>
                            @endif
                        
                    <div class="pt-16">
                            <button class="absolute orders bottom-0 right-0 text-white font-semibold py-2 px-4 sm:mr-32 md:mr-1 rounded" style="background-color:#4091a3">Pokaż więcej</button>
                    </div>
                </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function () {
$('tr').hide();
$('tr:lt(4)').show();


$('.orders').click(function() {
    if($(this).text() == 'Pokaż więcej')
    {
        
        $('tr').show();
        
    }
    else
    {
        $('tr').hide();
        $('tr:lt(4)').show();
    }
    $(this).text($(this).text() == 'Pokaż więcej' ? 'Pokaż mniej' : 'Pokaż więcej');


    return false;
});
});

</script>

<script>
function addClass(num) {
   
    
    var divv=new String("d-"+num);
    var input=new String("i-"+num);

    var ElD=document.getElementById(divv);
    var ElI=document.getElementById(input);

    ElD.classList.add("notvisible");
    ElI.classList.add("visible");
    if(num==3)
    {
        document.getElementById("i-4").classList.add("visible");
    }
}

</script>

<script>
$(document).on('click', '.button', function (e) {
    
    
    e.preventDefault();
    var id = $(this).data('id');
    Swal.fire({
        title: 'Czy na pewno chcesz usunąć swoje konto?',
        text: "Nie będziesz mógł tego cofnąć!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tak, usuń!'
    }).then((result) =>  {
            if (result.isConfirmed) {
                $.ajax({
                type: "DELETE",
                url: "{{url('/home/destroy')}}",
                data: {id:id, "_token": "{{ csrf_token() }}"},
                success: function () {
                    Swal.fire("Zrobione!", "Udało ci się usunąć konto!", "success");
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    Swal.fire("Błąd!", "Proszę spróbuj ponownie", "error");
                }       
                });
                
            } else if (result.isDenied) {
                Swal.fire('Zmiany nie zostały zapisane', '', 'info');
            }  
            
        });
});
</script>


@endsection
