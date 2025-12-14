<?php

namespace Base\Models\User;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {

    use HasUuids, HasApiTokens;

    protected $table      = '';
    protected $primaryKey = '';

    public function setActiveToken(string $token): void
    {
        $this->activeToken = $token;
    }

    public function getActiveToken(): string|null
    {
        return $this->activeToken ?? null;
    }

    public function getRouteKeyName(): string
    {
        return ''; // Chave primária OU uuid
    }
}
