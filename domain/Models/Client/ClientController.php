<?php

namespace Base\Models\Client;

use App\Http\Controllers\Controller;
use Base\Models\Client\Actions\IndexAction;
use Base\Models\Client\Actions\ShowAction;
use Base\Models\Client\Requests\ShoppingFilterRequest;
use Base\Models\Client\Resources\ShoppingResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientController extends Controller {

    public function index(ShoppingFilterRequest $request, IndexAction $action): JsonResource
    {
        return ShoppingResource::collection($action->handle($request->all()));
    }
    public function show(string $uuid, ShowAction $action): JsonResource
    {
        return new ShoppingResource($action->handle($uuid));
    }
}
