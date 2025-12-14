<?php

namespace Base\Models\ShoppingItem;

use Base\Models\Product\Product;
use Base\Models\Shopping\Shopping;
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

    public function shopping(): BelongsTo
    {
        return $this->belongsTo(Shopping::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
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
