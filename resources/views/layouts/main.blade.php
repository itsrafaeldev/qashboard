<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Import JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <!-- JSZip (usado para exportação no DevExtreme) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <!-- DevExtreme JS -->
    <script src="https://cdn3.devexpress.com/jslib/23.2.5/js/dx.all.js"></script>

    <!-- CSS do DevExtreme -->
    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/23.2.5/css/dx.light.css">

    <link rel="shortcut icon" href="{{ asset('coin.png') }}" type="image/x-icon">

    @stack('stlye')



    <title>Qashboard - @yield('title')</title>
</head>

<body>

    <div class="container-sidebar">
        <ul>
            <a href="{{ route('dashboards.list') }}">
                <li>Dashboard</li>
            </a>
            <a href="{{ route('registries.list') }}">
                <li>Registros</li>
            </a>
            <a href="{{ route('categories.list') }}">
                <li>Categorias</li>
            </a>
            <a href="#">
                <li>Sair</li>
            </a>
        </ul>
    </div>

    <div class="container-content">
        @yield('content')
    </div>


    @stack('script')

</body>

</html>
