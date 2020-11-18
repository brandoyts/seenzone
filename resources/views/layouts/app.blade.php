<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("includes.client_head")
<body>
    <div id="app">
       @include('includes.header')
        <main>
            @yield('content')
        </main>
    </div>
    @include('includes.footer')
</body>
</html>






