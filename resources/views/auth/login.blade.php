@extends('layouts.app')

@section('content')

<div style="background-image: url('img/tlo.jpg'); height:966px!important;" >
<div class="pt-5 pl-5" ><a href="/"><i class="fa fa-arrow-left bg-gray-300 hover:bg-white rounded-full py-3 px-4 cursor-pointer" style="font-size:36px"></i></a></div>
    <div class="flex justify-center pt-16 " >
        
            <div class="border border-gray-900  sm:w-11/12 md:w-2/3 lg:1/2 xl:w-5/12 bg-white" style="height:600px;">
                <div class="text-center mt-20">
                    <div class="font-bold text-3xl">{{ __('Logowanie') }}</div>

                    <div class="mt-16">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="">
                                

                                <div class="">
                                    <input id="email" type="email" placeholder="Adres E-Mail" class="form-control @error('email') is-invalid @enderror w-2/4 pl-2" style="border-bottom: 2px solid #3088b6" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    
                                </div>
                            </div>

                            <div class=" mt-8">
                                

                                <div class="">
                                    <input id="password" type="password" placeholder="Hasło" class="form-control @error('password') is-invalid @enderror w-2/4 pl-2" style="border-bottom: 2px solid #3088b6" name="password" required autocomplete="current-password">

                                    <br>
                                    @error('email')
                                        <div class="invalid-feedback" role="alert">
                                            <h4 class="text-red-700">{{ $message }}</h4>
                                        </div>
                                    @enderror
                                    @error('password')
                                        <div class="invalid-feedback" role="alert">
                                            <h4 class="text-red-700">{{ $message }}</h4>
                                        </div>
                                    @enderror
                                    <div class="flex justify-end mr-40 mt-1">
                                    @if (Route::has('password.request'))
                                        <a class="ml-4 text-gray-700 hover:text-black text-sm"  href="{{ route('password.request') }}">
                                            {{ __('Zapomniałem hasła') }}
                                        </a>
                                    @endif
                                    <a class="ml-4 text-gray-700 hover:text-black text-sm"  href="{{ route('register') }}">
                                            {{ __('Rejestracja') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2 flex justify-start ml-40">
                                <div class="">
                                    <div class="">
                                        <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="ml-1" for="remember">
                                            {{ __('Zapamiętaj mnie') }}
                                        </label>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="mt-10 ">
                                <div class=" flex justify-center ">
                                
                                    <a href="/redirect" class="pr-4"><img tabindex="0" class="google" src="/img/fbButtons/btn_google_signin_light_normal_web.png"></a>
                                    <button type="submit" class=" bg-blue-500 hover:bg-blue-700 left-0 px-5 py-3 text-white font-semibold rounded-full">
                                        {{ __('Zaloguj się') }}
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
