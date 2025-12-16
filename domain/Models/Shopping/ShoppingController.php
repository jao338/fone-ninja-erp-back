<?php

namespace Base\Models\Shopping;

use App\Http\Controllers\Controller;
use Base\Models\Shopping\Actions\CancelAction;
use Base\Models\Shopping\Actions\CreateAction;
use Base\Models\Shopping\Actions\IndexAction;
use Base\Models\Shopping\Actions\ShowAction;
use Base\Models\Shopping\Requests\SaleFilterRequest;
use Base\Models\Shopping\Requests\ShoppingRequest;
use Base\Models\Shopping\Resources\SaleResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class ShoppingController extends Controller {

    public function index(SaleFilterRequest $request, IndexAction $action): JsonResource
    {
        return SaleResource::collection($action->handle($request->all()));
    }
    public function show(string $uuid, ShowAction $action): JsonResource
    {
        return new SaleResource($action->handle($uuid));
    }
    public function store(ShoppingRequest $request, CreateAction $action): JsonResource
    {
        return new SaleResource($action->handle($request->validated()));
    }
    public function destroy(string $uuid, CancelAction $action): Response
    {
        $action->handle($uuid);

        return response()->noContent();
    }
}
