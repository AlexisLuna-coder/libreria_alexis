<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    <!-- FONT AWESOME --> 
    <script src="https://kit.fontawesome.com/b41a278b92.js" crossorigin="anonymous"></script>

</head>
<body>
    <!-- Contenedor de todas las páginas -->
    <!-- PARA PONER COMENTARIOS: CNTRL + K + C  -->

    <div class="container p-5 my-5 border">
        @yield('content')
    </div>
    
</body>
</html>