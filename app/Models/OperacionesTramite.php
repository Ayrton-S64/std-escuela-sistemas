<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperacionesTramite extends Model
{
    use HasFactory;

    public $table='operaciones_tramites';
    protected $guarded =[];

    public function tramite(){
        return $this->hasOne(Tramite::class,'id','tramite');
    }

    public function usuarioOrigen(){
        return $this->hasOne(User::class,'id','usuarioOrigen');
    }

    public function usuarioDestino(){
        return $this->hasOne(User::class,'id','usuarioDestino');
    }
}
