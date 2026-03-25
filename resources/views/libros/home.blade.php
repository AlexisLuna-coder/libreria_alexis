<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FORMA DE LLAMAR RECURSOS DESDE LARAVEL -->
    <link rel="stylesheet" href=" {{ asset('css/home.css') }}">
    <title>Libros</title>
</head>
<body>
    <h1>LIBROS DISPONIBLES</h1>
    
    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
        @foreach($history as $libro)
            <div style="width: 200px;">
                <!-- Título del libro -->
                <h3>
                    {{$libro['volumeInfo']['title'] ?? 'Sin título' }}
                </h3>
                <!-- Autor del libro -->
                <p>
                    {{ $libro['volumeInfo']['authors'][0] ?? 'Autor desconocido' }}
                </p>
                <!-- Imagen del libro -->
                @if(isset($libro['volumeInfo']['imageLinks']['thumbnail']))
                    <img src="{{ $libro['volumeInfo']['imageLinks']['thumbnail'] }}" alt="">
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>