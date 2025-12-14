<?php

namespace Base\Models\Shopping;

use Base\Models\SaleItem\SaleItem;
use Base\Models\Supplier\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Shopping extends Model {

    protected $table        = 'shopping';
    protected $primaryKey   = 'id';
    protected $keyType      = 'int';
    public $incrementing    = true;
    public $timestamps      = true;

    protected $casts  = [];

    protected $fillable = [
        'uuid',
        'supplier_id',
        'total',
    ];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function shoppingItems(): HasMany
    {
        return $this->hasMany(SaleItem::class);
    }

    protected static function booted(): void
    {
        static::creating(function (self $shopping) {
            if (empty($shopping->uuid)) {
                $shopping->uuid = (string) Str::uuid();
            }
        });
    }
}
