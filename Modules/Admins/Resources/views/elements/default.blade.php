<!doctype html>
<html lang="en">
<head>
    @yield('title')
    @include('admins::elements.meta')
    @include('admins::elements.style')
</head>
<body>
    @include('admins::elements.header')
    @yield('content')
    @include('admins::elements.footer')
    @include('admins::elements.script')
</body>
</html>
