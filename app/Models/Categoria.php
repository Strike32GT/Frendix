<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table="categories";
    protected $primaryKey="_id_categories";
    public $timestamps=false;
    protected $fillable=["Nombre"];

    //Una categoria tiene muchas películas
    public function peliculas()
    {
    return $this->hasMany(Pelicula::class, 'Categoria_Pelicula', '_id_categories');
    }
}
