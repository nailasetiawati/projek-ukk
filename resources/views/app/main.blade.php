<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/bootstrap.bundle.js"></script>
    <script>
        function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
  
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
  </script>
</body>
</html>