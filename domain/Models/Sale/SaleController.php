<?php

namespace Base\Models\Sale;

use App\Http\Controllers\Controller;
use Base\Models\Sale\Actions\CreateAction;
use Base\Models\Sale\Actions\IndexAction;
use Base\Models\Sale\Actions\ShowAction;
use Base\Models\Sale\Requests\SaleFilterRequest;
use Base\Models\Sale\Resources\SaleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleController extends Controller {

    public function index(SaleFilterRequest $request, IndexAction $action): JsonResource
    {
        return SaleResource::collection($action->handle($request->all()));
    }
    public function show(string $uuid, ShowAction $action): JsonResource
    {
        return new SaleResource($action->handle($uuid));
    }
    public function store(SaleRequest $request, CreateAction $action): JsonResource
    {
        return new SaleResource($action->handle($request->validated()));
    }
}
