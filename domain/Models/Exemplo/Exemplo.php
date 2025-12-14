<?php

namespace Base\Models\Exemplo;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Exemplo extends Model {

    protected $table      = 'cad_exemplo'; // Não existe
    protected $primaryKey = 'id_exemplo';  // Não existe

    protected $fillable = [
        'dsc_exemplo',
    ];

    protected $keyType    = 'int';

    public $casts = [
        'id_exemplo'             => 'int',
        'dsc_exemplo'            => 'string',
    ];

    public    $timestamps = false; // Sempre usar "false"

    public function scopeAtivo($query): Builder
    {
        return $query->where('cad_ativo', 1);
    }
}
