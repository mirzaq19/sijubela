<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>

    {{-- CSS if needed in certain page --}}
    @yield('beforecss')

    {{-- Head component like meta tag and css file --}}
    @include('partials._head')

    {{-- CSS if needed in certain page --}}
    @yield('aftercss')
</head>

<body>
    @include('partials._navbar')
    @yield('content')
    @yield('beforescript')
    @include('partials._script')
    @yield('afterscript')
</body>

</html>
