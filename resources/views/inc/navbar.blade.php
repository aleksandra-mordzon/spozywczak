<navbar>
<div class="bg-white flex items-center ">
                <div class="flex items-center flex-shrink-0  mr-6 text-lg font-bold ml-40 my-3">
                <a href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" class="h-8 w-8 mr-2 ml-8">
                Spożywczak
                </a>
                </div>
                <!-- 
                    przycisk do togglera
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                -->
                


                <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto absolute  right-0 font-medium mr-32">
                
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
                    @endguest
                    </div>
                
                    <!-- Right Side Of Navbar -->
                    
                </div>
                
        </div>

    <div class="bg-yellow-500  flex items-center justify-center text-lg py-2">
    <ul class="flex">
    <li class=" ml-24 hover:text-gray-700 cursor-pointer"><a href="/">Strona główna</a></li>
    <li class="mr-24 ml-24 hover:text-gray-700 cursor-pointer"><a href="/products/new">Nowości</a></li>
    <li class="mr-24 hover:text-gray-700 cursor-pointer"><a href="/products/sale">Wyprzedaż</a></li>
    <li class="mr-24 hover:text-gray-700 cursor-pointer"><a href="/products/groceries">Produkty spożywcze</a></li>
    <li class="mr-24 hover:text-gray-700 cursor-pointer"><a href="/products/hygiene_products">Produkty higieniczne</a></li>
    </ul>
    </div>
</navbar>
        <!--
            <ul class="navbar-nav ml-auto">
                         Authentication Links
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Zaloguj') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Zarejestruj') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    -->