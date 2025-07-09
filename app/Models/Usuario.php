<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table="usuarios";
    protected $primaryKey="id_usuarios";
    public $timestamps=false;
    protected $fillable=["Nombre","Host","Password","Ultima_conexion","Fecha_Creacion",
    "Estado"];
}
