<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    @extends('layouts.app') <!--//EXTIENDO EL LAYOUT DE LA CARPETA LAYOUTS, EN ESTE CASO EL APP.BLADE.PHP -->
    <!-- USAR TODOS LOS ELEMENTOS DEL LAYOUT -->
    
    @section('content')
    <h1>Registrar un nuevo libro</h1>

    <form action="{{ route('libros.store') }}" method="POST">
        
        @csrf <!-- //FORMA QUE SE LE DICE A LARAVEL EL USO DE UN FORMULARIO QUE ENVIARA INFORMACIIÓN -->
        
        <div class="input-group mb-3">
            <span class = "input-group-text" id="basic-addon1">
                <i class="fa-solid fa-book"></i>
            </span>
            <input type="text" name = "Nombre" placeholder = "Nombre del libro" class="form-control">
        </div>

        <br>
        <div class="input-group mb-3">
            <span class = "input-group-text" id="basic-addon1">
                <i class="fa-solid fa-person"></i>
            </span>
            <input type="text" name = "Autor" placeholder = "Autor del libro" class="form-control">
        </div>

        <br>
        <div class="input-group mb-3">
            <span class = "input-group-text" id="basic-addon1">
                <i class="fa-solid fa-building"></i>
            </span>
        <input type="text" name = "Editorial" placeholder = "Editorial" class="form-control">
        </div>

        
        <br>
        <div class="input-group mb-3">
            <span class = "input-group-text" id="basic-addon1">
                <i class="fa-solid fa-dollar-sign"></i>
            </span>
            <input type="number" name = "Precio" placeholder = "Precio" class="form-control">
        </div>
        <br>

        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
    </form>
    @endsection
</body>
</html>