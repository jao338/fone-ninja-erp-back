<?php

namespace Base\Models\Sale;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sale extends Model {

    protected $table      = 'sale';
    protected $primaryKey = 'id';
    protected $keyType = 'int';

    public $incrementing   = true;

    protected $casts  = [];

    protected $fillable = [
        'uuid',
        'client_id',
        'total',
        'total',
        'profit',
        'active',
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
