<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTramite extends Model
{
    use HasFactory;

    public $table = "tipo_tramites";
    protected $guarded = [];

    function tramites(){
        return $this->hasMany(Tramite::class,'tipoTramite','id');
    }
}
