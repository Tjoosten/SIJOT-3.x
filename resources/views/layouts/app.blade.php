<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | {{ $title }}</title>

    <!-- Styles -->
    <link rel="shortcut icon" type="image/svg" href="{{ asset('img/favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/Scouts-en-Gidsen-Vlaanderen.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    @yield('specific-css')

    <script src="https://use.fontawesome.com/4f1ce84feb.js"></script>

    <!-- Scripts -->
    <script> window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!}; </script>
</head>
<body class="background">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="fa fa-leaf" aria-hidden="true"></span> Takken
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('group.show', ['selector' => 'kapoenen']) }}">De kapoenen</a></li>
                                <li><a href="{{ route('group.show', ['selector' => 'welpen']) }}">De welpen</a></li>
                                <li><a href="{{ route('group.show', ['selector' => 'jonggivers']) }}">De Jong-Givers</a></li>
                                <li><a href="{{ route('group.show', ['selector' => 'givers']) }}">De Givers</a></li>
                                <li><a href="{{ route('group.show', ['selector' => 'jins']) }}">De Jins</a></li>
                                <li><a href="{{ route('group.show', ['selector' => 'leiding']) }}">De Leiding</a></li>
                            </ul>
                        </li>

                        <li><a href="{{ route('lease.index') }}"><span class="fa fa-home" aria-hidden="true"></span> Verhuur</a></li>
                        <li><a href=""><span class="fa fa-picture-o" aria-hidden="true"></span> Foto's</a></li>
                        <li><a href=""><span class="fa fa-file-text-o" aria-hidden="true"></span> Planning</a></li>
                        <li><a href=""><span class="fa fa-info-circle" aria-hidden="true"></span> Info</a></li>
                        <li><a href="mailto:contact@st-joris-turnhout.be"><span class="fa fa-envelope" aria-hidden="true"></span> Contact</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-sign-in"></span> Login</a>
                                <ul id="login-dp" class="dropdown-menu">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form class="form" role="form" method="post" action="{{ route('auth.login') }}" accept-charset="UTF-8" id="login-nav">
                                                    {{ csrf_field() }}

                                                    <div class="form-group">
                                                        <label class="sr-only" for="email">Email address</label>
                                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email adres">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="password">Wachtwoord:</label>
                                                        <input type="password" name="password" class="form-control" id="password" placeholder="Wachtwoord">
                                                        <div class="help-block text-right"><a href="">Wachtwoord vergeten?</a></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btn-block">Inloggen</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href=""><span class="fa fa-cogs"></span> Account configuratie</a></li>
                                    <li><a href="{{ route('home.backend') }}"><span class="fa fa-cogs"></span> Controle paneel</a></li>

                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ route('auth.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span class="fa fa-sign-out" aria-hidden="true"></span> Uitloggen
                                        </a>

                                        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>

        <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 footerleft ">
                    <div class="logofooter"> Info:</div>

                    <p>
                        Gemengde scoutgroep. Met elke zondag tussen 2 en 5u een activiteit. De laatste zondag v/d maand is het tussen 10 en 5u.
                    </p>

                    <p><i class="fa fa-map-pin"></i> Adres: Sint-Jorislaan 11, 2300 Turnhout</p>
                    <p><i class="fa fa-phone"></i> GSM: 0000 00 00 00</p>
                    <p><i class="fa fa-envelope"></i> E-mail: <a href="mailto:contact@st-joris-turnhout.be">contact@st-joris-turnhout.com</a></p>

                </div>
                <div class="col-md-2 col-sm-6 paddingtop-bottom">
                    <h6 class="heading7">LINKS</h6>
                    <ul class="footer-ul">
                        <li><a href="#"> Hopper <i>(Winkel)</i></a></li>
                        <li><a href="#"> Hopper <i>(Verblijf)</i></a></li>
                        <li><a href="#"> Federatie</a></li>
                        <li><a href="#"> Groepsadmin</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 paddingtop-bottom">
                    <h6 class="heading7">LATEST POST</h6>
                    <div class="post">
                        <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
                        <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
                        <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 paddingtop-bottom">
                    <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <div class="fb-xfbml-parse-ignore">
                            <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </footer>
        <!--footer start from here-->

        <div class="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p>© {{ date('Y') }} - Scouts en Gidsen Sint-Joris, Turnhout</p>
                </div>
                <div class="col-md-6">
                    <ul class="bottom_ul">
                        <li><a href="#">webenlance.com</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Faq's</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Site Map</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    @yield('specific-js')
</body>
</html>
