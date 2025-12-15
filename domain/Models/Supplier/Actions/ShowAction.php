<?php

namespace Base\Models\Supplier\Actions;

use Base\Models\Supplier\Supplier;

final readonly class ShowAction {

    public function __construct(protected Supplier $model) {}

    public function handle(string $uuid): ?Supplier
    {
        return $this->model
            ->where('uuid', $uuid)
            ->firstOrFail();
    }
}
