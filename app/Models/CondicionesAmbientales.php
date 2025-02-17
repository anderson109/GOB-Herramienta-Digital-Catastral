<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CondicionesAmbientales extends Model
{
    use HasFactory;
    protected $fillable = ['RiesgosNaturales'];

    public function colonias() {
        return $this->belongsTo(Colonia::class, 'id_colonia');
       } 
}
