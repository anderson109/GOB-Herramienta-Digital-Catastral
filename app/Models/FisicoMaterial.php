<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class FisicoMaterial extends Model
{
    use HasFactory;
    protected $fillable = [
        'extensionTerritorial',
        'poblacionEstimada',
        'numeroDeViviendas',
        'promedioHabitantes',
        'numeroHabitantes',
        'clasificacionMetropolitana',
        'materialesVivienda',
        'transportePublico',
        'estadoAccesoPrincipal',
        'aguaPotable',
        'energia',
        'alumbradoPublico',
        'aguasNegras',
        'aguasLluvias',
        'trenAseo',
        'servicioTrenAseo',
    ];
    public function colonias() {
        return $this->belongsTo(Colonia::class, 'id_colonia');
    }
}
