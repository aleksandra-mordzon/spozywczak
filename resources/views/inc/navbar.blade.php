<navbar>
<style>
      #menu-toggle:checked + #menu {
        display: block;
      }
  </style>
<div class="bg-white flex items-center ">

                <div class="flex lg:items-center flex-shrink-0  mr-6 text-lg font-bold   sm:ml-10 sm:py-4 lg:ml-40 lg:py-3 ">
                <a href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" class="h-8 w-8 mr-2 ml-8">
                Spożywczak
                </a>
                </div>

                
                
                <div style="margin: auto; " class=" absolute  inset-x-0 w-1/2 lg:hidden md:block pl-3 h-8 rounded-full border border-solid border-4 border-gray-600 hover:border-gray-800 ">
                        <form action="/products/search" method="get">
                            <input type="text" placeholder="Szukaj..." style="" class="w-64 " name="q">
                            <button type="submit" class="absolute right-0"><i class="fa fa-search  pr-3 text-gray-800 cursor-pointer hover:text-gray-500 " style="font-size:24px;"></i></button>
                        </form>
                        
                    </div>
                        
                <div class="w-full lg:block flex-grow hidden lg:flex lg:items-center lg:w-auto absolute  right-0 font-medium mr-32">
                    
                    <div style="margin: auto; " class="  relative pl-3 h-8 rounded-full border border-solid border-4 border-gray-600 hover:border-gray-800 ">
                        <form action="/products/search" method="get">
                            <input type="text" placeholder="Szukaj..." style="" class="w-64 " name="q">
                            <button type="submit"><i class="fa fa-search  pr-2 text-gray-800 cursor-pointer hover:text-gray-500 " style="font-size:24px;"></i></button>
                        </form>
                    </div>
                
                    <div class="text-sm lg:flex-grow ">
                    
                    @guest
                        <a href="{{ route('login') }}" class="block mt-4 lg:inline-block lg:mt-0 text-base hover:text-gray-700 mr-5 ml-8">
                        {{ __('Zaloguj') }}
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block mt-4 lg:inline-block lg:mt-0 text-base hover:text-gray-700 mr-4">
                            {{ __('Zarejestruj') }}
                            </a>
                        @endif
                    @else
                        
                        <a title="Koszyk" href="{{ route('cart') }}" class=" block mt-4 lg:inline-block lg:mt-0 text-base hover:text-gray-700 mr-5 ml-16">
                        <div class="ml-5 mt-4 bg-yellow-400 rounded-full text-xs px-1 absolute">{{Cart::instance('default')->count()}}</div>
                        <i class="fa fa-shopping-cart " style="font-size:30px;"></i>
                        </a>
                        <a title="Moje konto" href="{{ route('home') }}" class="block mt-4 lg:inline-block lg:mt-0 text-base hover:text-gray-700 mr-3 ml-3">
                        <i class="fa fa-user-circle" style="font-size:30px;"></i>
                        </a>
                        
                        <a title="Wyloguj się" href="{{ route('logout') }}" class="block mt-4 lg:inline-block lg:mt-0 text-base hover:text-gray-700 mr-3 ml-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out" style="font-size:30px"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                    </div>
                
                    <!-- Right Side Of Navbar -->
                    
                </div>
                
        </div>
        <label for="menu-toggle" class="pointer-cursor lg:hidden block absolute top-0 mt-10 right-0 pr-16"><svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><title>menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path></svg></label>
  <input class="hidden" type="checkbox" id="menu-toggle" />
  
  <div class="bg-yellow-500   justify-center text-lg py-2 hidden lg:flex lg:items-center lg:w-auto w-full"  id="menu">
    <ul class="lg:flex sm:text-center lg:text-justify">
    <li class=" lg:ml-24   hover:text-gray-700 cursor-pointer"><a href="/">Strona główna</a></li>
    <li class="sm:mt-1 lg:mt-0 lg:mr-24 lg:ml-24 hover:text-gray-700 cursor-pointer"><a href="/products/new">Nowości</a></li>
    <li class="sm:mt-1 lg:mt-0 lg:mr-24 hover:text-gray-700 cursor-pointer"><a href="/products/sale">Wyprzedaż</a></li>
    <li class="sm:mt-1 lg:mt-0 lg:mr-24 hover:text-gray-700 cursor-pointer"><a href="/products/groceries">Produkty spożywcze</a></li>
    
    @guest
                    <li class="flex lg:hidden sm:block sm:mt-3 lg:mt-0 font-semibold">
                    <hr>
                        <a href="{{ route('login') }}" class=" mr-3   hover:text-gray-700 cursor-pointer">
                        {{ __('Zaloguj') }}
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class=" ml-3  hover:text-gray-700 cursor-pointer">
                            {{ __('Zarejestruj') }}
                            </a>
                        @endif
                        </li>
                    @else
                    <li class="flex lg:hidden sm:block sm:mt-3 lg:mt-0 font-semibold mb-6">
                        <a title="Koszyk" href="{{ route('cart') }}" class=" block mt-4 inline-block lg:mt-0 text-base hover:text-gray-700 mr-5 ">
                        <div class="ml-5 mt-4 bg-yellow-400 rounded-full text-xs px-1 absolute">{{Cart::instance('default')->count()}}</div>
                        <i class="fa fa-shopping-cart " style="font-size:30px;"></i>
                        </a>
                        <a title="Moje konto" href="{{ route('home') }}" class="block mt-4 inline-block lg:mt-0 text-base hover:text-gray-700 mr-3 ml-3">
                        <i class="fa fa-user-circle" style="font-size:30px;"></i>
                        </a>
                        
                        <a title="Wyloguj się" href="{{ route('logout') }}" class="block mt-4 inline-block lg:mt-0 text-base hover:text-gray-700 mr-3 ml-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out" style="font-size:30px"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endguest
    </ul>
    </div>
    
</navbar>
       