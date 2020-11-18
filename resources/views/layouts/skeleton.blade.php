<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("includes.client_head")
<body>
    <main class="skeleton">
        @yield("skeleton-content")
    </main>
</body>
</html>