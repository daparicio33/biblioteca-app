<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--
Template 2092 Shelf
http://www.tooplate.com/view/2092-shelf-->
    <title>Biblioteca Virtual - IEST Perú Japón</title>
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}"> <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> <!-- Bootstrap style -->
    <link rel="stylesheet" href="{{ asset('css/tooplate-style.css') }}"> <!-- Templatemo style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pdfjs-dist@3.8.162/web/pdf_viewer.min.css">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>
<body>
    <div class="container">

        @include('layouts.portal.preheader')
        @include('layouts.portal.header')
        @yield('cuerpo')
        <footer>
            Copyright &copy; <span class="tm-current-year">2018</span> Shelf Company - Designed by Tooplate
            <br>
            Plantilla personalizada por la Oficina de Soporte Tecnológico IES Perú Japón
        </footer>
    </div>

    <!-- load JS files -->
    <script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script> <!-- jQuery (https://jquery.com/download/) -->
    <script src="{{ asset('js/popper.min.js') }}"></script> <!-- Popper (https://popper.js.org/) -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script> <!-- Bootstrap (https://getbootstrap.com/) -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@3.8.162/build/pdf.min.js" integrity="sha256-L8xojfqyTWSbeGhnNGNJjwcTkvi2rl4iYS4rvEsh4W0=" crossorigin="anonymous"></script> --}}
    <script>
        $(document).ready(function() {

            // Update the current year in copyright
            $('.tm-current-year').text(new Date().getFullYear());

        });
    </script>
    @yield('js')
</body>

</html>
