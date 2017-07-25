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
                    Internship
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if(Auth::check())
                    @if(Auth::user()->getRole() == 'admin')
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/verification') }}">Verification</a></li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="">School <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/school') }}">Show</a></li>
                                    <li><a href="{{ url('/school/create') }}">Create</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="">Internship <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/internship/create') }}">Create</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="">Status <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/status') }}">Show</a></li>
                                    <li><a href="{{ url('/status/create') }}">Create</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="">Tools <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/tool') }}">Show</a></li>
                                    <li><a href="{{ url('/tool/create') }}">Create</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="">Company <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/company') }}">Show</a></li>
                                    <li><a href="{{ url('/company/create') }}">Create</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="">Contact <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/contact') }}">Show</a></li>
                                    <li><a href="{{ url('/contact/create') }}">Create</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="">Verification <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/verification') }}">Show</a></li>
                                </ul>
                            </li>
                        </ul>
                    @elseif(Auth::user()->getRole() == 'student')
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="">Company <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/company') }}">Show</a></li>
                                </ul>
                            </li>
                        </ul>
                    @elseif(Auth::user()->getRole() == 'teacher')
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/') }}">Home</a></li>
{{--                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="">Company <b class="caret"></b></a>
                                <ul class=" dropdown-menu">
                                    <li><a href="{{ url('/company') }}">Show</a></li>
                                </ul>
                            </li>--}}
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="">School <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/school') }}">Show</a></li>
                                    <li><a href="{{ url('/school/create') }}">Create</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="">Tools <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/tool') }}">Show</a></li>
                                    <li><a href="{{ url('/tool/create') }}">Create</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="">Education offers <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/crebo') }}">Show</a></li>
                                    <li><a href="{{ url('/crebo/create') }}">Create</a></li>
                                </ul>
                            </li>
                        </ul>

                    @elseif(Auth::user()->getRole() == 'practical trainer')

                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="">Tools <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/tool') }}">Show</a></li>
                                    <li><a href="{{ url('/tool/create') }}">Create</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="">Internship <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/internship/create') }}">Create</a></li>
                                </ul>
                            </li>
                        </ul>
                @endif

                @endif


                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->getName() }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-sign-out"></i>Profiel</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                            @endif
                </ul>
            </div>
        </div>
    </nav>