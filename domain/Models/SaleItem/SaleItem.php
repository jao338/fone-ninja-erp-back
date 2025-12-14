<?php

namespace Base\Models\SaleItem;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SaleItem extends Model {

    protected $table      = 'sale';
    protected $primaryKey = 'id';
    protected $keyType = 'int';

    public $incrementing   = true;

    protected $casts  = [];

    protected $fillable = [
        'uuid',
        'sale_id',
        'product_id',
        'amount',
        'unit_price',
        'unit_cost',
        'subtotal',
        'profit',
        'created_at',
        'updated_at',
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
