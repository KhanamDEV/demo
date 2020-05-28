<!doctype html>
<html lang="en">
<head>
    @include('admins::elements.meta')
    @include('admins::elements.style')
</head>
<body>
    @include('admins::elements.header')
    @yield('content')
    @include('admins::elements.footer')
    @include('admins::elements.script')
    @yield('scripts')
</body>
</html>
