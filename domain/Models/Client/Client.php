<?php

namespace Base\Models\Client;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Client extends Model {

    protected $table      = 'client';
    protected $primaryKey = 'id';
    protected $keyType = 'int';

    public $incrementing   = true;

    protected $casts  = [];

    protected $fillable = [
        'uuid',
        'name',
        'cpf',
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
