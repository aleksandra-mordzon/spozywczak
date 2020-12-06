@extends('layouts.app')

@section('content')
<div class="mx-64 px-64 mt-10">
    <div class="text-3xl font-semibold mb-6">Podsumowanie zamówienia</div>
        <div>
        <div class="text-2xl font-semibold mt-6 mb-2">Zawartość koszyka</div>
            <table class="table-auto ">
                        
                        <tbody>
                            <tr>
                            <td class="border  px-8 "><img src="{{ asset('img/chleb.jpg') }}" class="w-32"></td>
                            <td class="border px-48 py-2 text-xl"><a href="#">Chleb pszenny</a></td>
                            <td class="border px-8 py-2 text-xl">  <input type="number" value="1" style="width:40px;" > x 12 zł</td>
                            
                            </tr>
                            <tr>
                            <td class="border  px-8 "><img src="{{ asset('img/chleb.jpg') }}" class="w-32"></td>
                            <td class="border px-48 py-2 text-xl"><a href="#">Chleb pszenny</a></td>
                            <td class="border px-8 py-2 text-xl">  <input type="number" value="1" style="width:40px;" > x 12 zł</td>
                            
                            </tr>
                            
                            
                        </tbody>

                    </table>
        </div>

        <div class="mt-8 mb-4">
            <div class="text-2xl font-semibold">Dane odbiorcy</div>
            <div>Imie</div>
            <div>Nazwisko</div>
            <div>Miasto</div>
            <div>Dabrowskiego 3c</div>
            <div>81-135</div>
            <div>Polska</div>
            <div>123-456-789</div>
            
        </div>

        <div class="mt-8 text-xl">
        <div class="text-2xl font-semibold mb-6">Sposób dostawy</div>
        <div class="relative mb-4"><input type="checkbox" checked disabled class="mr-6 " id="inpostpaczkomat"><label for="inpostpaczkomat" > InPost Paczkomat 24/7 Odbiór w punkcie</label> <span class="absolute right-0">8,99 zł</span> <div class="ml-10 text-lg text-gray-700">1-2 dni robocze</div></div>
        
    
    </div>


    <div class="pt-4">
        <div class="text-2xl font-semibold mb-6">Metoda płatności</div>
        <div class="px-2 py-2 w-1/2 flex border cursor-pointer border-green-600 card" >
        <img src="{{ asset('img/chleb.jpg') }}" class="w-16 ml-4">
        <div class="text-xl mt-3 ml-10">BLIK</div>
        </div>


        

    </div>


        <div class="relative text-xl mt-16 ">
            <div class="flex">Wartość przedmiotów <div class="absolute right-0">12,00 zł</div></div>
            <div class="flex border-b-2 border-gray-400">Koszt dostawy <div class="absolute right-0">8,99 zł</div></div>
            <div class="flex  "><b>Do zapłaty</b> <div class="absolute right-0 font-bold">20,99 zł</div></div>

        </div>
        <div class="relative pb-24">
        <button class="text-white font-semibold py-2 px-6 mt-8 text-xl rounded  absolute right-0" style="background-color:#4091a3"><a href="{{ route('paysuccess') }}">Zapłać</a></button>
        <button class="text-white font-semibold py-2 px-6 mt-8 text-xl rounded  absolute left-0" style="background-color:#4091a3"><a href="{{ route('info') }}">Wstecz</a></button>

        </div>
        
</div>

@endsection