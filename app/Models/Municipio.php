<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function departamentos(){
        return $this->belongsTo(Departamento::class, 'id_departamento');
    }

    public function colonias(){
        return $this->hasMany(Colonia::class, 'id_municipio');
    }
}
