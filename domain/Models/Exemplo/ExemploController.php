<?php

namespace Base\Models\Exemplo;

use App\Http\Controllers\Controller;
use Base\Models\Exemplo\Actions\CreateAction;
use Base\Models\Exemplo\Actions\DestroyAction;
use Base\Models\Exemplo\Actions\IndexAction;
use Base\Models\Exemplo\Actions\ShowAction;
use Base\Models\Exemplo\Actions\UpdateAction;
use Base\Models\Exemplo\Requests\ExemploFilterRequest;
use Base\Models\Exemplo\Requests\ExemploRequest;
use Base\Models\Exemplo\Resources\ExemploResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class ExemploController extends Controller {

    public function index(ExemploFilterRequest $request, IndexAction $action): JsonResource
    {
        return ExemploResource::collection($action->handle($request->all()));
    }
    public function show(string $uuid, ShowAction $action): JsonResource
    {
        return new ExemploResource($action->handle($uuid));
    }
    public function store(ExemploRequest $request, CreateAction $action): JsonResource
    {
        return new ExemploResource($action->handle($request->validated()));
    }
    public function update(string $uuid, ExemploRequest $request, UpdateAction $action): JsonResource
    {
        return new ExemploResource($action->handle($uuid, $request->validated()));
    }

    public function destroy(string $uuid, DestroyAction $action): Response
    {
        $action->handle($uuid);

        return response()->noContent();
    }
}
