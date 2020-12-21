@extends('layouts.app')

@section('content')
<div class="mt-24 flex justify-center ">
    
    <div class="text-center">
    <div class="text-3xl">{{ __('Zweryfikuj swój adres email') }}</div>

    <div class="text-lg ">
        @if (session('resent'))
            <script>
            Swal.fire({
            icon: 'success',
            title: 'Nowy link weryfikacyjny został właśnie wysłany.',
            showConfirmButton: false,
            timer: 1500
            })
            </script>
        @endif

        {{ __('Proszę, sprawdź swóją pocztę w celu zweryfikowaniu konta') }}
        {{ __('Jeżeli nie otrzymałeś emaila') }},
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="mt-2 ml-48 block  px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none">{{ __('klinkij tutaj w celu ponownego wysłania') }}</button>
        </form>
    </div>
    </div>

</div>
@endsection
