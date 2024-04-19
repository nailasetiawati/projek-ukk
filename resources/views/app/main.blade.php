<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Kasir |  {{ $title }}</title>
</head>
<body>
    {{-- Navbar --}}
    @include('components.navbar')
    {{-- End Navbar --}}

    {{-- Contents --}}
    @yield('contents')
    {{-- End Contents --}}

    {{-- Footer --}}
    {{-- @include('components.footer') --}}
    {{-- End Footer --}}

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.bundle.js"></script>
</body>
</html>