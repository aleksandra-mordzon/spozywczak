<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script async src="https://geowidget.easypack24.net/js/sdk-for-javascript.js"></script>
    <link rel="stylesheet" href="https://geowidget.easypack24.net/css/easypack.css"/>

    <script src="https://mapa.ecommerce.poczta-polska.pl/widget/scripts/ppwidget.js "></script>
    
    <script src="https://js.stripe.com/v3/"></script>

    <script src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{asset('/css/glide.core.min.css')}}" rel="stylesheet" >
    <link href="{{asset('/css/glide.theme.min.css')}}" rel="stylesheet" >

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
        .google:focus{
            background: url("/img/fbButtons/btn_google_signin_light_focus_web.png") no-repeat;
        }
</style>
</head>
<body style="height:100%">
    <div id="app">
    @if(!(Request::is('login') || Request::is('register') || Request::is('password/reset/*') || Request::is('password/reset')))
        @include('inc.navbar')
    @endif
    
        
        
        <main style="min-height:757px;" >
        
            @if(session()->has('success_message'))
                <div class="alert alert-success  mt-6 text-center">
                    {{ session()->get('success_message')}}
                </div>
            @endif
            @if(isset($errors))
                @if(count($errors)>0 and (!(Request::is('login') || Request::is('register') || Request::is('password/reset'))))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li >{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            @endif
            <div id="scroll-btn" class=" hidden cursor-pointer fixed bottom-0 right-0 mb-16 mr-6 bg-white z-10 p-3 rounded-md " onclick="scrollToTop()" ><i class="fa fa-toggle-up" style="font-size:48px"></i></div>
                @yield('content')
                
        </main>
        @include('inc.footer')
    </div>

    <script>
    window.addEventListener('scroll', scroll);
    
        function scroll(){
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50){
        document.getElementById("scroll-btn").style.display = "block"; }
        else{
        document.getElementById("scroll-btn").style.display = "none"; }
        };

        function scrollToTop(){
            window.scrollTo({top: 0, behavior: 'smooth'});
        }
        
    </script>

    <script>
        
        var sliders = document.querySelectorAll('.glide');

        for (var i = 0; i < sliders.length; i++) {
        var glide = new Glide(sliders[i], {
            gap: 15,
            type: 'carousel',
            perView: 4,
            breakpoints: {
            1500: {
                perView: 3
            },
            1250: {
                perView: 2
            },
            800: {
                perView: 1
            }
        }
        });
        
        glide.mount();
        }
        </script>
</body>
</html>
