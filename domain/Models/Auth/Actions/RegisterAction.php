<?php

namespace Base\Models\Auth\Actions;

use Base\Models\User\User;
use Illuminate\Support\Facades\Auth;

final readonly class RegisterAction {

    public function __construct(protected User $model) {}

    public function handle(array $data): User
    {
        $user = $this->model->create($data);

        Auth::login($user);

        $this->setToken($user);

        return $user;
    }

    private function setToken(User $user): void
    {
        if ( ! requestFromFrontend()) {
            $token = $user->createToken('token-api')->plainTextToken;

            $user->setActiveToken($token);
        }
    }
}
