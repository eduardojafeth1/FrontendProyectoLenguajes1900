<!DOCTYPE html>
<html lang="en">
<head style="background-color: hsl(194, 26%, 84%);">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: hsl(189, 75%, 79%);">
    <!-- Incluye el menú de navegación -->
    @include('partials.navbar')

    <div class="container mt-4">
        <!-- Aquí se insertará el contenido específico de cada vista -->
        @yield('content')
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

