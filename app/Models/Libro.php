<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    // CAMPOS QUE EL SISTEMA RECONOCE COMO MODIFICABLES
    protected $fillable = ['Nombre',
                            'Autor',
                            'Editorial',
                            'Precio'];
}
