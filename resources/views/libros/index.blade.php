<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTA </title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <h1><center>VER LIBROS</center></h1>
    
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('libros.create') }}">
            <button class="btn btn-outline-success me-3 mb-3"><i class="fa-solid fa-plus"></i> NUEVO LIBRO</button>
        </a>

        <form action=" {{ route('cerrar') }}" method="POST">
            @csrf
            <button class="btn btn-outline-danger me-3 mb-3"><i class="fa-solid fa-right-from-bracket"></i> CERRAR SESIÓN</button>
        </form>

        <!-- Verificart si la sesión esta activa -->
        @if(auth()->user()->is_admin)
            <a href="{{ route('admin-dashboard') }}" class="btn btn-outline-secondary me-3 mb-3">
                <i class="fa-solid fa-user-gear"></i> Panel admin
            </a>
        @endif
    </div>

    
    <hr>
    <br>
    @include('partials.alerts')
    
    <table class="table table-striped table-hover">
        <thead>
            <tr> 
                <th>ID</th>
                <th>Nombre</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!--!: CICLO PARA RECORRER LOS DATOS DEL MODELO -->
            @foreach ($libros as $libro)

                <tr>
                    <td> {{ $libro->id}}</td>
                    <td> {{ $libro->Nombre}}</td>
                    <td> {{ $libro->Autor}}</td>
                    <td> {{ $libro->Editorial}}</td>
                    <td> {{ $libro->Precio}}</td>
                    <td> 
                        <a href="{{ route('libros.edit', $libro) }}">
                            <button class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                        </a>

                        <form action=" {{ route('libros.destroy', $libro) }}" method="POST" class="d-inline">
                            @csrf 
                            @method('DELETE')

                            <button 
                            class="btn btn-danger"
                            onclick = "return confirm('¿ESTÁS SEGURO DE ELIMINAR ESTE LIBRO?')">
                            <i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection  
</body>
</html>