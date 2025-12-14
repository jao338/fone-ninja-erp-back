<?php

namespace Base\Models\Product;

use Base\Models\SaleItem\SaleItem;
use Base\Models\ShoppingItem\ShoppingItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model {

    protected $table       = 'product';
    protected $primaryKey  = 'id';
    protected $keyType     = 'int';

    public $incrementing   = true;
    public $timestamps     = true;

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

    public function shoppingItems(): HasMany
    {
        return $this->hasMany(ShoppingItem::class);
    }

    public function saleItems(): HasMany
    {
        return $this->hasMany(SaleItem::class);
    }

    protected static function booted(): void
    {
        static::creating(function (self $product) {
            if (empty($product->uuid)) {
                $product->uuid = (string) Str::uuid();
            }
        });
    }
}
