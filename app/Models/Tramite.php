<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    use HasFactory;

    public $table='tramites';
    protected $guarded =[];

    public function tipo_tramite(){
        return $this->hasOne(TipoTramite::class, 'id','tipoTramite');
    }

    public function estado_tramite(){
        return $this->hasOne(EstadoTramite::class, 'id','estado');
    }

    public function usuario_registro(){
        return $this->hasOne(User::class,'id','usuarioRegistro');
    }

    public function operaciones(){
        return $this->hasMany(OperacionesTramite::class,'tramite','id');
    }

    public function documentos(){
        return $this->hasMany(DocumentoTramite::class,'idTramite','id');
    }
}


