<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colonia extends Model
{
    use HasFactory;

    protected $fillable = ['name','codigo','asentamiento_humano'];
   

    public function municipios(){
        return $this->belongsTo(Municipio::class, 'id_municipio');
    }

    public function fisico_materials (){
        return $this->hasMany(FisicoMaterial::class, 'id_colonia');
    }

    public function socio_economicos (){
        return $this->hasMany(SocioEconomico::class, 'id_colonia');
    }

    public function socio_culturals (){
        return $this->hasMany(SocioCultural::class, 'id_colonia');
    }

    public function condiciones_ambientales (){
        return $this->hasMany(CondicionesAmbientales::class, 'id_colonia');
    }





}
