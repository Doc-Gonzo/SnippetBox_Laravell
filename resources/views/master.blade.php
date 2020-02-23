@include('layouts/head')

<body>
<div class="flex-center position-ref full-height" id="app">
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
    <div id="main_menu_wrapper">
       <main_auto></main_auto>
        <snippet_list :allSnippets="'{{ \App\Sammlung::all() }}'"></snippet_list>
    </div>
    <div id="menu_login">
        @include('layouts/navbar')
    </div>
    <div class="content">
        <div class="title m-b-md">@yield('headline')</div>
        <div class="content_wrapper">@yield('content')</div>
    </div>
</div>
</body>
</html>
