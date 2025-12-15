<?php

namespace Base\Models\Product;

use App\Http\Controllers\Controller;
use Base\Models\Product\Actions\CreateAction;
use Base\Models\Product\Actions\DestroyAction;
use Base\Models\Product\Actions\IndexAction;
use Base\Models\Product\Actions\ShowAction;
use Base\Models\Product\Actions\UpdateAction;
use Base\Models\Product\Requests\ProductFilterRequest;
use Base\Models\Product\Requests\ProductRequest;
use Base\Models\Product\Resources\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class ProductController extends Controller {

    public function index(ProductFilterRequest $request, IndexAction $action): JsonResource
    {
        return ProductResource::collection($action->handle($request->all()));
    }
    public function show(string $uuid, ShowAction $action): JsonResource
    {
        return new ProductResource($action->handle($uuid));
    }
    public function store(ProductRequest $request, CreateAction $action): JsonResource
    {
        return new ProductResource($action->handle($request->validated()));
    }
    public function update(string $uuid, ProductRequest $request, UpdateAction $action): Response
    {
        $action->handle($uuid, $request->validated());

        return response()->noContent();
    }

    public function destroy(string $uuid, DestroyAction $action): Response
    {
        $action->handle($uuid);

        return response()->noContent();
    }
}
