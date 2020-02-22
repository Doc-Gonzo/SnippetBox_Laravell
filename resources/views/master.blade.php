@include('layouts/head')
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/welcome') }}">Welcome</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div id="app">
       <menu_main></menu_main>
    </div>

    <div class="content">
        <div class="title m-b-md">@yield('headline')</div>
        <div class="content_wrapper">@yield('content')</div>
    </div>
</div>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>
