<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    <h1><center>EDITAR LIBRO : {{ $libro->Nombre }}</center></h1>
    <hr>
    <form action="{{ route('libros.update', $libro) }}" method = "POST">
        <!--USO OBLIGATORIO PARA LA ACTUALIZACIÓN-->
        @csrf <!--: Para proteger el formulario contra ataques CSRF (Cross-Site Request Forgery) -->
        <!--SIN ESTE TOKEN, EL FORMULARIO NO FUNCIONARÁ CORRECTAMENTE Y PODRÍA SER VULNERABLE A ATAQUES DE SEGURIDAD.-->

        @method('PUT') <!--: Para indicar que el formulario se enviará como una solicitud PUT, que es el método HTTP utilizado para actualizar recursos existentes. -->
        <input required type="text" name = "Nombre" placeholder = "Nombre del libro" value = "{{ $libro->Nombre }}" class = "form-control">
        <br>
        <input required type="text" name = "Autor" placeholder = "Autor del libro" value = "{{ $libro->Autor }}" class = "form-control">
        <br>
        <input required type="text" name = "Editorial" placeholder = "Editorial del libro" value = "{{ $libro->Editorial }}" class = "form-control">
        <br>
        <input required type="number" name = "Precio" placeholder = "Precio del libro" value = "{{ $libro->Precio }}" class = "form-control">

        <br>
        <center>
            <button type="submit" class="btn btn-success"> <i class="fa-regular fa-floppy-disk"></i> Guardar Cambios </button>
        </center>
        
    </form>
    <div class = "d-flex justify-content-end mb-2">
        <a href="{{ route('libros.index') }}" class="btn btn-danger">
            <i class="fa-solid fa-arrow-right-to-bracket"></i>Volver a la lista de libros

        </a>
    </div>


@endsection
</body>
</html>