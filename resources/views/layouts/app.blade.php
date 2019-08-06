<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                    @auth
                        <li class="nav-item">
                            <a href="{{route('notifications')}}" class="nav-link">
                                <span class="badge text-white badge-info">{{auth()->user()->unreadNotifications->count()}} unread notifications</span>
                            </a>
                        </li>
                    @endauth

                    <li class="nav-item"><a class="nav-link"
                                            href="{{route('discussions.index')}}">Discussions</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('channels.index')}}">Channels</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @if(!in_array(request()->path(),['login','register','password/email','password/reset']))
        <main class="container py-4">
            @include('partials.sessions')
            <div class="row">
                <div class="col-md-3">

                    <div>
                        @auth
                            <div class=" mb-2">
                                <a style="width: 100%" href="{{route('discussions.create')}}" class="btn btn-primary">Add
                                    Discussion</a>
                            </div>
                        @else
                            <div class=" mb-2">
                                <a style="width: 100%" href="{{route('login')}}" class="btn btn-primary">Sign in To Add
                                    Discussions</a>
                            </div>
                        @endauth
                        <div class="card">
                            <div class="card-header">Channels</div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach($channels as $channel)
                                        <li class="list-group-item"><a href="">{{$channel->name}}</a></li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>
        </main>
    @else
        <main class="py-4">
            @yield('content')
        </main>
    @endif

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
