<?php

namespace Base\Models\Client\Actions;

use Base\Models\Client\Client;
use Illuminate\Support\Collection;

final readonly class LookupAction {

    public function __construct(protected Client $model) {}

    public function handle(): Collection
    {
        return $this->model->select('uuid as value', 'name as label')->get();
    }
}
