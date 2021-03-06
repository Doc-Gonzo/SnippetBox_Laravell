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
       <main_auto_singlepage></main_auto_singlepage>
    </div>
    <div id="menu_login">
        @include('layouts/navbar')
    </div>
    <div class="content">
        <div class="title m-b-md">@yield('headline')</div>
        <div class="content_wrapper">@yield('content') <!-- <snippet_detail_smart></snippet_detail_smart>-->  {{ csrf_field() }}</div>
        <div id="sidebar">
            <div class="snippetlist"> <snippet_list_smart></snippet_list_smart></div>
        </div>
    </div>
    <div class="widgets">
        <add-language></add-language>
        <add-sammlung></add-sammlung>
        <add-context></add-context>
    </div>
</div>
</body>
</html>

