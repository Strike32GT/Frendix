<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    protected $table="episodios";
    protected $primaryKey="id_episodio";
    public $timestamps=false;
    protected $fillable=["id_series","nombre_episodio","url_video","nro_episodio","temporada"];

    public function serie(){
        return $this->belongsto(Serie::class,'id_series','id_series');
    }

}
