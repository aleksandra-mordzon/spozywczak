@extends('layouts.app')

@section('content')
<div class="mt-24 flex justify-center ">
    
    <div class="text-center">
    <div class="text-3xl">{{ __('Verify Your Email Address') }}</div>

    <div class="text-lg ">
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="mt-2 ml-64 block  px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none">{{ __('click here to request another') }}</button>
        </form>
    </div>
    </div>

</div>
@endsection
