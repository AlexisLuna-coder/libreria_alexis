<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <center><h1 class="fst-italic">Registro de usuario</h1></center>

    <form action=" {{route('registro.store')}} " method="POST">
        @csrf 
        <input type="text" name = "name" placeholder = "Nombre" class="form-control" required>
        <br>
        <input type="email" name = "email" placeholder = "Correo" class="form-control" required>
        <br>
        <input type="text" name = "phone" placeholder = "Télefono" class="form-control" required>
        <br>
        <input type="password" name = "password" placeholder = "Contraseña" class="form-control" required>
        <br>
        <input type="password" name = "password_confirmation" placeholder = "Confirmar contraseña" class="form-control" required>
        <br>

        <div class="form-check">
            <input type="checkbox" name="is_admin" value="1" class="form-check-input">
            <label>Es administrador</label>
        </div>
        <br>
        <button type="submit" class = "btn btn-outline-primary">Guardar</button>
    
    
    </form>

    @endsection
</body>
</html>