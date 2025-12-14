<?php

namespace Base\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model {

    protected $table      = 'product';
    protected $primaryKey = 'id';
    protected $keyType = 'int';

    public $incrementing   = true;

    protected $casts  = [];

    protected $fillable = [
        'uuid',
        'name',
        'average_cost',
        'sale_price',
        'amount',
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
