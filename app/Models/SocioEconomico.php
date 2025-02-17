<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocioEconomico extends Model
{
    use HasFactory;
    protected $fillable = [
        'ActividadEconomica',
        'ValorEvaluado',
        'CamarasComercio',
        'Cooperativas',
        'PropietarioLegal',
        'Financiamiento',
];

    public function colonias() {
     return $this->belongsTo(Colonia::class, 'id_colonia');
    } 
}
