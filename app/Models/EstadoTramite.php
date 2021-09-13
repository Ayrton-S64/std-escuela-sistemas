<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoTramite extends Model
{
    use HasFactory;

    public function tramites(){
        return $this->hasMany(Tramite::class,'estado','id');
    }

}
