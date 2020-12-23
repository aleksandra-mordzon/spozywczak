@extends('layouts.app')

@section('content')
<div style="background-image: url('../../img/tlo.jpg'); height:966px!important;" >
    <div class="pt-5 pl-5" ><a href="/"><i class="fa fa-arrow-left bg-gray-300 hover:bg-white rounded-full py-3 px-4 cursor-pointer" style="font-size:36px"></i></a></div>
    
        <div class="flex justify-center pt-40">
            <div class="border border-gray-900 w-1/3 bg-white" style="height:400px;">
            <div class="text-center mt-10">
        
                <div class="text-3xl font-semibold">{{ __('Zresetuj hasło') }}</div>

                <div class="mt-5 text-lg">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-2">
                            <label for="email" class="font-semibold">{{ __('Adres E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" style="border-bottom: 2px solid #3088b6" type="email" class="form-control @error('email') is-invalid @enderror px-2" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <strong class="text-red-600">{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="password" class="font-semibold">{{ __('Hasło') }}</label>

                            <div class="col-md-6">
                                <input id="password" style="border-bottom: 2px solid #3088b6" type="password" class="form-control @error('password') is-invalid @enderror px-2" name="password" required autocomplete="new-password">

                                @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong class="text-red-600">{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="password-confirm" class="font-semibold">{{ __('Powtórz hasło') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" style="border-bottom: 2px solid #3088b6" type="password" class="px-2" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mt-6">
                            <div class="">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 left-0 px-3 py-1 text-white font-semibold rounded-full">
                                    {{ __('Zresetuj') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
