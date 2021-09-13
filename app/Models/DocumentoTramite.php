<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoTramite extends Model
{
    use HasFactory;

    public $table='documento_tramites';
    protected $guarded =[];

    public function tramite(){
        return $this->hasOne(Tramite::class,'id','idTramite');
    }
}
