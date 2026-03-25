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
    <div class = "main-container">
        <!-- SIDEBAR -->
        <aside class = "sidebar">
            <h2 class="logo">Librería</h2>

            <nav class = "">
                <a href="#">Inicio</a>
                <a href="#">Favoritos</a>
                <a href="#">Mis libros</a>
                <a href="#">Explorar</a>
                <a href="#">Configuración</a>
            </nav>
            <a href="" class="logout">Cerrar sesión</a>
        </aside>

        <!-- CONTENIDO -->
        <main class = "content">
            <!-- MENU SUPERIOR -->
            <header class="topbar">
                <div class="menu-links">
                    <a href="#">Ver libros</a>
                    <a href="#">Descuentos</a>
                    <a href="#">Promociones</a>
                    <a href="#">Destacados</a>
                </div>
            </header>

            <section class="hero">
                <div class = "hero-text">
                    <h1>EXPLORA LA <br> HISTORIA</h1>
                    <p>
                        Explorar libros que permitan
                        vivir relatos históricos.
                    </p>
                    <button class="more-btn">
                        Ver más
                    </button>
                </div>

                <!-- sección de libros -->
                <div class="books">
                    @foreach($history as $libro)
                        <div class="book">
                            <img src="{{ $libro['volumeInfo']['imageLinks']['thumbnail'] ?? '' }}">
                            <h4> {{ $libro['volumeInfo']['title'] ?? 'Sin título' }}</h4>
                            <p> {{ $libro['volumeInfo']['authors'][0] ?? 'Autor desconocido'}} </p>
                        </div>

                    @endforeach
                </div>
            </section>

            <!-- FANTASY -->
            <section class="hero">
                <div class = "hero-text">
                    <h1>EXPLORA LA <br> HISTORIA DE MAGIA</h1>
                    <p>
                        Explorar libros que permitan
                        vivir relatos de fantasía e historias fantasticas.
                    </p>
                    <button class="more-btn">
                        Ver más
                    </button>
                </div>

                <!-- sección de libros -->
                <div class="books">
                    @foreach($fantasy as $libro)
                        <div class="book">
                            <img src="{{ $libro['volumeInfo']['imageLinks']['thumbnail'] ?? '' }}">
                            <h4> {{ $libro['volumeInfo']['title'] ?? 'Sin título' }}</h4>
                            <p> {{ $libro['volumeInfo']['authors'][0] ?? 'Autor desconocido'}} </p>
                        </div>

                    @endforeach
                </div>
            </section>

        </main>
    </div>
</body>
</html>