@extends('layouts.app')

@section('content')
<div class="" style="background-image: url('img/tlo.jpg'); height:966px!important;">
<div class="pt-5 pl-5" ><a href="/"><i class="fa fa-arrow-left bg-gray-300 hover:bg-white rounded-full py-3 px-4 cursor-pointer" style="font-size:36px"></i></a></div>
 
    <div class="flex justify-center pt-16">
        <div class="border border-gray-900 w-1/3 bg-white" style="height:600px;">
            <div class="text-center mt-10">
                <div class="font-bold text-3xl">{{ __('Rejestracja') }}</div>

                <div class="mt-12">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="">
                            
                            <div class="">
                                <input id="name" placeholder="Imię" type="text" class="form-control @error('name') is-invalid @enderror w-2/4 pl-2" style="border-bottom: 2px solid #3088b6" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            
                            <div class="mt-8">
                                <input id="email" placeholder="Adres E-Mail" type="email" class="form-control @error('email') is-invalid @enderror w-2/4 pl-2" style="border-bottom: 2px solid #3088b6" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            
                            <div class="mt-8">
                                <input id="password" placeholder="Hasło" type="password" class="form-control @error('password') is-invalid @enderror w-2/4 pl-2" style="border-bottom: 2px solid #3088b6" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            
                            <div class="mt-8">
                                <input id="password-confirm" placeholder="Potwierdź hasło" type="password" class="form-control w-2/4 pl-2" style="border-bottom: 2px solid #3088b6" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mt-10">
                            <div class=" justify-center">
                                <button type="submit" class=" bg-blue-500 hover:bg-blue-700 left-0 px-5 py-3 text-white font-semibold rounded-full">
                                    {{ __('Zarejestruj') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
