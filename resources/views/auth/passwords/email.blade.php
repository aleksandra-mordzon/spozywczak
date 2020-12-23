@extends('layouts.app')

@section('content')
<div style="background-image: url('../img/tlo.jpg'); height:966px!important;" >
<div class="pt-5 pl-5" ><a href="/"><i class="fa fa-arrow-left bg-gray-300 hover:bg-white rounded-full py-3 px-4 cursor-pointer" style="font-size:36px"></i></a></div>
 
    <div class="flex justify-center pt-40">
        <div class="border border-gray-900 w-1/3 bg-white" style="height:300px;">
            <div class="text-center mt-10">
                <div class="font-bold text-3xl">{{ __('Zresetuj hasło') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!--  -->
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mt-16  ml-8 relative">
                            
                            <div class=" left-0">
                                <input id="email" placeholder="Adres E-Mail" type="email" style="border-bottom: 2px solid #3088b6" class="form-control @error('email') is-invalid @enderror w-64 pl-2" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <strong class="text-red-600">{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                                
                                <div class=" absolute mt-8  right-0 mr-12">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 left-0 px-3 py-1 text-white font-semibold rounded-full">
                                        {{ __('Wyślij link resetujący hasło ') }}
                                    </button>
                                </div>

                            </div>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
