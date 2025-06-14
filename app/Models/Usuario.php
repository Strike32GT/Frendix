<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table="usuarios";
    protected $primaryKey="id_movies";
    public $timestamps=false;
    protected $fillable=["Nombre","Admin_id_admin","Trailer","Fecha_Subida","Descripcion",
    "URL","Miniatura"];
}
