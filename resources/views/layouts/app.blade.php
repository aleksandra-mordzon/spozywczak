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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{asset('/css/glide.core.min.css')}}" rel="stylesheet" >
    <link href="{{asset('/css/glide.theme.min.css')}}" rel="stylesheet" >

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app">
    @if(!(Request::is('login') || Request::is('register') || Request::is('password/reset')))
        @include('inc.navbar')
    @endif
    
        
        
        <main class="">
            @yield('content')
        </main>
        
    </div>

    <script>
        
        var sliders = document.querySelectorAll('.glide');

        for (var i = 0; i < sliders.length; i++) {
        var glide = new Glide(sliders[i], {
            gap: 15,
            type: 'carousel',
            perView: 4,
            breakpoints: {
            1400: {
                perView: 3
            },
            900: {
                perView: 2
            },
            700: {
                perView: 1
            }
        }
        });
        
        glide.mount();
        }
        </script>
</body>
</html>
