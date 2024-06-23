<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Esta configuracion es la que permite  crear o modificar 
    //nuevas modelos de forma masiva
    protected $fillable = [
        'title',
        'slug',
        'body',
    ];
    
    //Esta funcion se egrega despues para hacer valido el campo user en
    //la relalcion de las tablas: una publicacion pertenece a un usuario

    public function user(){
        return $this->belongsTo(User::class);
    }
}
