<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm(){
        return view('auth.register');
    }

    //Método para guardar informaci+ón del usuario en la BASE DE DATOS  
    public function register(Request $request){

        //Recabar la información desde el formulario
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|confirmed|min:8'    
        ]);

        // Guardar la información dentro de la Base de datos
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin'), // ! Verificar si se ha marcado la casilla de administrador
            //Uso de has() para el manejo del checkbox
        
        ]);

        //INICIAR SESIÓN DE FORMA AUTOMATICA
        Auth::login($user); //CON ESTO YA ESTA INICIANDO SESIÓN DE FORMA AUTOMATICA

        return redirect()->route('libros.index');
    }

    //Método para regresar la vista de inicio de seisón
    public function loginForm(){
        return view('auth.login');
    }

    //Método patra iniciar sesión
    public function  login(Request $request){
        //Validar los valores ddel formuario
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Realizar intento de inicio de sesión
        //atemp permite consultar la información a la base de datos y el sistema verá si puede iniciar sesión
        if(Auth::attempt($data)){
            //Obtener información de la sesión y generar sus credenciales
            $request -> session()->regenerate(); // ! REGENERAR LA SESIÓN PARA EVITAR ATAQUES DE FIJACIÓN DE SESIÓN
            // redireccionar al usuario con su sesión iniciada
            return redirect()->route('libros.index');
        
        }
        //Si los datos son incorrectos mandar un error
        return back()->withErrors([
            'email' => 'Datos incorrectos',
        ]);
    }
    //2026-03-03
    //Método para cerrar sesión y validar las credenciales
    public function logout(Request $request){

        //Cerrar sesión
        Auth::logout();

        //Cierre de credenciales en las sesiones
        $request -> session() -> invalidate(); // ! INVALIDAR LA SESIÓN PARA EVITAR ATAQUES DE FIJACIÓN DE SESIÓN
        $request -> session() -> regenerateToken(); // ! REGENERAR EL TOKEN DE LA
        //Redireccionar al usuario a la página de inicio
        return redirect('/acceso');
    }

    // Panel principal de administrador
    public function adminDashboard(){
        return view ('admin.dashboard');
    }
}