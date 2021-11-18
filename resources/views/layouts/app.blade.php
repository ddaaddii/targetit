<!doctype html>

<html lang="pt-br">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Prova TargetIT</title>


    <!-- Scripts -->

    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body>

    <div id="app" style="background-image: url({{ asset('img/fundo2.jpg') }}); background-size: cover; height: 100%;">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

            <div class="container-fluid">

                <a class="navbar-brand" href="{{ url('/') }}">

                    <img src="/img/logo-pq.png" alt="">

                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">

                    <span class="navbar-toggler-icon"></span>

                </button>



                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav mr-auto">



                    </ul>



                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->

                        @guest

                            <li class="nav-item">

                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

                            </li>

                            @if (Route::has('register'))

                               <!-- <li class="nav-item">

                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>

                                </li>-->

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

                </div>

            </div>

        </nav>
  
   
   {{-- @if (auth()->user())
   <div class="shadow bg-light rounded-top col-md-1 col-xs-1 col-sm-12 px-0 d-block d-sm-none"  id="collapseExample2" style="font-size: 11px;">

       <a  href="#" onclick="exibir_menu()">
         <div class="pl-2 mt-2 ml-md-2 pt-2 pb-2 bg-secondary text-white " style="text-align: center">
             Menu →
           </div>
         </a>
   </div>

   <script>
    function exibir_menu(){
  
    var collapseExample2 = document.getElementById("collapseExample2");
    var collapseExample1 = document.getElementById("collapseExample");
    var principal = document.getElementById("principal");
  
    principal.className="col-md-10 col-xs-10 col-sm-12 pl-2";
    collapseExample1.className = "shadow bg-light rounded-top col-md-2 col-xs-2 col-sm-12 px-0 ";
    collapseExample2.className = "shadow bg-light rounded-top col-md-1 col-xs-1 col-sm-12 px-0 d-none";
    };
  
  </script>
  @endif --}}
        <main class="py-2" style="height: 100vh;">
          
            
            @yield('content')

        </main>

    </div>

</body>

</html>

