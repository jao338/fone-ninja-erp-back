<?php

namespace Base\Models\Supplier;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Supplier extends Model {

    protected $table      = 'product';
    protected $primaryKey = 'id';
    protected $keyType = 'int';

    public $incrementing   = true;

    protected $casts  = [];

    protected $fillable = [
        'uuid',
        'name',
        'cnpj',
        'email',
        'telephone',
    ];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    protected static function booted(): void
    {
        static::creating(function (self $user) {
            if (empty($user->uuid)) {
                $user->uuid = (string) Str::uuid();
            }
        });
    }
}
