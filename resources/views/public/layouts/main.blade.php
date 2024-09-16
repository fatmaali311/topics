<!DOCTYPE html>
<html lang="en">
@include('public.includes.head')

<body id="top">
    <main>
        @include('public.includes.nav')
        @include('public.includes.header')
        @yield('content')
    </main>
    @include('public.includes.footer')
    @include('public.includes.javaScript')
</body>

</html>
