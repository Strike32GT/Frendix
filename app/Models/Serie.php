<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table="series";
    protected $primaryKey="id_series";
    public $timestamps=false;
    protected $fillable=["Nombre","Trailer","Admin_id_admin","Fecha_Subida","Descripcion","Miniatura"];

    public function episodios(){
            return $this->hasMany(Episodio::class, 'id_series', 'id_series');  
    }

}
