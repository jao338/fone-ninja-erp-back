<?php

namespace Base\Models\Supplier;

use Base\Models\Shopping\Shopping;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Supplier extends Model {

    protected $table        = 'product';
    protected $primaryKey   = 'id';
    protected $keyType      = 'int';
    public $incrementing    = true;
    public $timestamps      = true;

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

    public function shopping(): HasMany
    {
        return $this->hasMany(Shopping::class);
    }

    protected static function booted(): void
    {
        static::creating(function (self $supplier) {
            if (empty($supplier->uuid)) {
                $supplier->uuid = (string) Str::uuid();
            }
        });
    }
}
