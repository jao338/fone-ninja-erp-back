<?php

namespace Base\Models\ShoppingItem;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class ShoppingItem extends Model {

    protected $table      = 'shopping_item';
    protected $primaryKey = 'id';
    protected $keyType = 'int';

    public $incrementing   = true;

    protected $casts  = [];

    protected $fillable = [
        'uuid',
        'shopping_id',
        'product_id',
        'unit_price',
        'subtotal',
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
