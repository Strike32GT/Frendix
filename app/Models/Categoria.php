<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table="categories";
    protected $primaryKey="_id_categories";
    public $timestamps=false;
    protected $fillable=["Nombre"];
}
