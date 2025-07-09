<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $table="movies";
    protected $primaryKey="id_movies";
    public $timestamps=false;
    protected $fillable=["Nombre","Admin_id_admin","Trailer","Fecha_Subida","Descripcion","URL","Miniatura","Categoria_Pelicula"];

    public function categoria()
    {
    return $this->belongsTo(Categoria::class, 'Categoria_Pelicula', '_id_categories');
    }
}
