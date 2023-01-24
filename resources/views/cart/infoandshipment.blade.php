@extends('layouts.app')

@section('content')
<style>
.StripeElement {
  box-sizing: border-box;


  padding: 10px 12px;
  margin-top:5px;
  width:70%!important;
  border: 1px solid lightgray;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}

.visible {
    
    visibility: visible!important;
    font-size: 16px;
    
}

.notvisible {
    visibility: hidden!important;
    font-size: 0;
    margin: 0;


}

</style>

<div class="sm:mx-8 md:mx-16 lg:mx-64 xl:mx-40 xl:px-64 mt-10">
<form  action="{{route('storeinfo')}}" method="post"  id="payment-form">
  @csrf
  
    <div class="">
        <div class="text-2xl font-semibold">Dane odbiorcy</div>
        <div class="">
        <input placeholder="Imię" required name="name" class=" mt-6 shadow appearance-none border border-gray-500 rounded w-1/3 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
        <input placeholder="Nazwisko" required name="surname" class=" mt-6 shadow appearance-none border border-gray-500 rounded w-1/3 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
        <input placeholder="Miasto" required name="city" class=" mt-6 shadow appearance-none border border-gray-500 rounded w-1/3 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
        <input placeholder="Ulica i numer domu" required name="street" class=" mt-6 shadow appearance-none border border-gray-500 rounded w-1/3 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
        <input placeholder="Kod pocztowy" required name="postal_address" pattern="[0-9]{5}" class=" mt-6 shadow appearance-none border border-gray-500 rounded w-1/3 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
        <input placeholder="Numer telefonu" required name="phone_number" class=" mt-6 shadow appearance-none border border-gray-500 rounded w-1/3 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
        </div>
    </div>
    
    <div class="mt-8 text-xl">
        <div class="text-2xl font-semibold mb-6">Sposób dostawy</div>
        <div class="relative mb-4 bg-gray-200 px-5 py-1"><input type="checkbox" value="8.99" class="mr-6 cursor-pointer check" id="inpostpaczkomat" name="shipment[]"><label  class="cursor-pointer"> InPost Paczkomat 24/7 Odbiór w punkcie</label> <span class="absolute right-0 pr-5">8,99 zł</span> <div class="ml-10 text-lg text-gray-700">1-2 dni robocze</div><div class="ml-10 text-lg font-semibold" id="paczkomat"></div><input type="hidden" name="paczkomat_name" id="paczkomat_name" value=""/><input type="hidden" id="paczkomat_address"  name="paczkomat_address" value=""/><input type="hidden" id="paczkomat_address2" name="paczkomat_address2" value=""/></div>
        <div class="relative mb-4 bg-gray-200 px-5 py-1"><input type="checkbox" value="9.99" class="mr-6 cursor-pointer check" id="punkt" name="shipment[]"><label  class="cursor-pointer"> Odbiór w punkcie</label> <span class="absolute right-0 pr-5">9,99 zł</span> <div class="ml-10 text-lg text-gray-700">1-3 dni robocze</div><div class="ml-10 text-lg font-semibold" id="punktodbioru"></div><input type="hidden" name="punkt_name" id="punkt_name" value=""/><input type="hidden" id="punkt_street"  name="punkt_street" value=""/><input type="hidden" id="punkt_city" name="punkt_city" value=""/></div>
        <div class="relative mb-4 bg-gray-200 px-5 py-1"><input type="checkbox" value="10.99" class="mr-6 cursor-pointer check" id="inpostkurier" name="shipment[]"><label  class="cursor-pointer"> Kurier Inpost </label> <span class="absolute right-0 pr-5">10,99 zł</span> <div class="ml-10 text-lg text-gray-700">1-2 dni robocze</div></div>
        <div class="relative mb-4 bg-gray-200 px-5 py-1"><input type="checkbox" value="12.99" class="mr-6 cursor-pointer check" id="dpd" name="shipment[]"><label  class="cursor-pointer"> Kurier DPD</label> <span class="absolute right-0 pr-5">12,99 zł</span> <div class="ml-10 text-lg text-gray-700">1-2 dni robocze</div></div>
        
    
    </div>




    <div class="pt-4">
        <div class="text-2xl font-semibold mb-6"> Płatność</div>
        

        
        <div style="" id="creditcardinfo" >
                <label for="card-element" style="font-size:18px!important">
                Karta kredytowa lub debetowa
                </label>
                <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
        
        </div>

        

    </div>

    
                    
                    <input type="hidden" id="products" name="products" value="<?php foreach(Cart::content() as $item){echo $item->model->title.' x '.$item->qty.', '; }   ?>">
                   
                    
    

    <div class="pt-16  relative text-xl flex pb-6">
    <!--
    <div class="flex">Wartość przedmiotów <div class="absolute right-0">12 zł</div></div>
    <div class="flex border-b-2 border-gray-400">Koszt dostawy <div class="absolute right-0">8,99 zł</div></div> -->
    <div class="w-full relative">

    <div class="relative text-xl  ">
            <div class="flex">Wartość przedmiotów <div class="absolute right-0" id="subtotal" data-id="{{Cart::subtotal()}}">{{Cart::subtotal()}} zł</div></div>
            <div class="flex border-b-2 border-gray-400">Koszt dostawy <div class="absolute right-0" id="ship"> zł</div></div>
            <div class="flex  "><b>Do zapłaty</b> <div class="absolute right-0 font-bold" id="total"> zł</div></div>

        </div>
    </div>
    
    </div>

    <div id="error_status" class="alert alert-danger " style="visibility: hidden;"></div>

    <div class="relative pb-10">

    <button id="pay" type="submit" class="text-white font-semibold py-2 px-6 text-xl rounded   absolute right-0" style="background-color:#4091a3">ok</button> 
    <button class="text-white font-semibold py-2 px-6 text-xl rounded  absolute left-0" style="background-color:#4091a3"><a href="{{ route('cart') }}">Wstecz</a></button>


    </div>
    </form>

</div>

<script>
$(document).on('click', 'input[type="checkbox"]', function(e) { 
$('input[type="checkbox"]').not(this).prop('checked', false);
if(this.id=='inpostpaczkomat')
{
  
  openModal();
  
  $('#punktodbioru').text('');
  $('#punkt_name').val('');
  $('#punkt_street').val('');
  $('#punkt_city').val('');
}
else if(this.id=='punkt')
{
  
  $('#paczkomat').text('');
  $('#paczkomat_name').val('');
  $('#paczkomat_address').val('');
  $('#paczkomat_address2').val('');
  PPWidgetApp.toggleMap({callback: callbackFunc});
  function callbackFunc(object){
    $('#punktodbioru').text(object.name+", "+object.street+", "+object.city);
    $('#punkt_name').val(object.name);
    $('#punkt_street').val(object.street);
    $('#punkt_city').val(object.city);
  };
}
else{
  $('#paczkomat').text('');
  $('#paczkomat_name').val('');
  $('#paczkomat_address').val('');
  $('#paczkomat_address2').val('');
  $('#punktodbioru').text('');
  $('#punkt_name').val('');
  $('#punkt_street').val('');
  $('#punkt_city').val('');
  
}
var shipprice=$(this).val();
$('#ship').text(shipprice+' zł');
$('#total').text(parseFloat($('#subtotal').attr("data-id"))+parseFloat(shipprice)+' zł');
});


$('#pay').on('click', function(e){
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  var checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);
if(!checkedOne)
{
  e.preventDefault();
  $('#error_status').text('Wybierz sposób dostawy!');
  document.getElementById("error_status").classList.add("visible");
}
else
{ 
  document.getElementById("error_status").classList.add("notvisible");
}
});
</script>


<script>
// Create a Stripe client.
var stripe = Stripe('pk_test_51HK5OLIkU0US2C8KKSzYQTrEyO0kinktwI5TfXlL5QgLs50dns8YCZhnOJyNN3NLkxpEnlROqtQBW57BUUwYw2le00y7vpCZKK');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

document.getElementById('pay').disabled=true;
/*
var options = {
                name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                address_state: document.getElementById('province').value,
                address_zip: document.getElementById('postalcode').value
              }
              stripe.createToken(card, options).
              */


  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;

      document.getElementById('pay').disabled=false;

    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>


<script type="text/javascript">
     window.easyPackAsyncInit = function () {
            easyPack.init({
                defaultLocale: 'pl',
                mapType: 'osm',
                searchType: 'osm',
                points: {
                types: ['parcel_locker_only']
                },
                map: {
                    initialTypes: ['parcel_locker']
                }
            });
          };
          function openModal() {
            easyPack.modalMap(function(point, modal) {
              modal.closeModal();
              $('#paczkomat').text('Paczkomat '+ point.name+', '+point.address.line1+', '+point.address.line2);
              $('#paczkomat_name').val(point.name);
              $('#paczkomat_address').val(point.address.line1);
              $('#paczkomat_address2').val(point.address.line2);
              console.log(point);
            }, { width: 1200, height: 700 });
          }
</script>
 
@endsection