<?php

namespace Base\Models\Supplier;

use App\Http\Controllers\Controller;
use Base\Models\Supplier\Actions\IndexAction;
use Base\Models\Supplier\Actions\ShowAction;
use Base\Models\Supplier\Actions\LookupAction;
use Base\Models\Supplier\Requests\SupplierFilterRequest;
use Base\Models\Supplier\Resources\SupplierResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class SupplierController extends Controller {

    public function index(SupplierFilterRequest $request, IndexAction $action): JsonResource
    {
        return SupplierResource::collection($action->handle($request->all()));
    }

    public function show(string $uuid, ShowAction $action): JsonResource
    {
        return new SupplierResource($action->handle($uuid));
    }

    public function lookup(LookupAction $action): JsonResponse
    {
        return response()->json(['data' => ($action->handle())]);
    }
}
