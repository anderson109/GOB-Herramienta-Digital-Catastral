<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocioCultural extends Model
{
    use HasFactory;

    protected $fillable = [
        'Adescos',
        'Escolaridad',
        'Salud',
        'RiesgoSocial',
];
public function colonias() {
    return $this->belongsTo(Colonia::class, 'id_colonia');
   } 

}
