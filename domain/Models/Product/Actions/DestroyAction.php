<?php

namespace Base\Models\Product\Actions;

use Base\Models\Product\Product;

final readonly class DestroyAction {

    public function __construct(protected Product $model) {}

    public function handle(string $uuid): bool
    {
        $product = $this->model->where('uuid', $uuid)->firstOrFail();

        return $product->delete();
    }
}
