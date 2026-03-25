<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; //2026-03-24

use App\Models\Libro;

class LibroController extends Controller
{
    /**
     * CONSULTA DE INFORMACIÓN EN LA BASE DE DATOS (BD)
     */
    public function index()
    {
        //Obtener todos los datos de la BD 
        $libros = Libro::all();

        //Regresar vista y enviar los datos
        return view('libros.index', compact('libros')); //Para que muestre la vista de consulta de libros, se crea una carpeta dentro de views llamada libros y dentro de esta un archivo index.blade.php
    }

    /**
     * MOSTRAR VISTA PARA EL REGISTRO
     */
    public function create()
    {
        return view('libros.create'); //Para que muestre la vista de registro de libros, se crea una carpeta dentro de views llamada libros y dentro de esta un archivo create.blade.php
        //Para retornar, blade reconoce la carpeta mediante un punto
    }

    /**
     * GUARDRAR INFORMACIÓN EN LA BASE DE DATOS (BD)
     */
    public function store(Request $request)
    {
        Libro::create([
            // => Operador de asignación
            'Nombre' => $request->Nombre,
            'Autor' => $request->Autor,
            'Editorial' => $request->Editorial,
            'Precio' => $request->Precio
        ]);

        //Enviar al usuario al formulario de registro después de guardar la información
        return redirect()->route('libros.create');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * CONSULTA POR ID
     */
    public function edit(Libro $libro)
    {
        //Retornar vista con la información del libro
        return view('libros.edit', compact('libro')); //Para que muestre la vista de edición de libros, se crea una carpeta dentro de views llamada libros y dentro de esta un archivo edit.blade.php
    }

    /**
     * ACTUALIZAR LIBRO
     */
    public function update(Request $request, Libro $libro)
    {
        //
        $request->validate([
            'Nombre' => 'required',
            'Autor' => 'required',
            'Editorial' => 'required',
            'Precio' => 'required'
        ]);

        // INDICAR LA ACTUALZIACIÓN
        $libro->update($request->all());
        // REDIRECCIONAR AL USUARIO A LA VISTA DE CONSULTA DE LIBROS


        // ! REGRESAR AL USUARIO A LA CONSULTA CON UN MENSAJE
        //CON with() SE REGRESA ALGO
        return redirect()->route('libros.index')
        ->with('success', 'Libro actualizado correctamente');
    }

    /**
     * ELIMINAR LIBRO
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();

        return redirect()->route('libros.index')
        ->with('success', 'Libro eliminado correctamente');
    }

    //MÉTODO PARA HOME
    public function home(){
        //LIBROS DE HISTORIA
        //Manejar respuesta de la API
        $history = Http::get('https://www.googleapis.com/books/v1/volumes', [ 
            //INCLUIR LOS PARAMETROS DEL MANEJO DE API
            'q' => 'subject: history',
            'maxResults' => 12,
            'key' => config('services.google_books.key'),
        ])->json()['items'] ?? [];

        //! LIBROS DE FANTASÍA

        $fantasy = Http::get('https://www.googleapis.com/books/v1/volumes', [ 
            //INCLUIR LOS PARAMETROS DEL MANEJO DE API
            'q' => 'subject: fantasy',
            'maxResults' => 12,
            'key' => config('services.google_books.key'),
        ])->json()['items'] ?? [];



        //Guardar los libros y enviarlos a la vista
        // $libros = $response -> json()['items'] ?? []; //Operados ternario - Si tiene objetos lo envia, y si no es vacio

        return view('libros.home', compact('history', 'fantasy'));
    }
}
