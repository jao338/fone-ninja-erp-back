<?php

namespace Base\Models\Exemplo\Actions;

use Base\Models\Exemplo\Exemplo;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class IndexAction {

    public function __construct(protected Exemplo $model) {}

    public function handle(array $data): LengthAwarePaginator
    {
        $tipo_ordenacao  = $data['tipo_ordenacao'] ?? null;
        $campo_ordenacao = $data['campo_ordenacao'] ?? null;
        $per_page        = $data['per_page'] ?? 20;

        return $this->model
            ->when(
                !isset($campo_ordenacao) && !isset($tipo_ordenacao),
                fn($query) => $query->orderBy('dsc_exemplo', 'ASC'),
                fn($query) => $query->orderBy($campo_ordenacao, $tipo_ordenacao)
            )
            ->paginate($per_page);
    }
}
