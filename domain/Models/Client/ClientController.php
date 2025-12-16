<?php

namespace Base\Models\Client;

use App\Http\Controllers\Controller;
use Base\Models\Client\Actions\IndexAction;
use Base\Models\Client\Actions\ShowAction;
use Base\Models\Client\Requests\ClientFilterRequest;
use Base\Models\Client\Resources\ClientResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientController extends Controller {

    public function index(ClientFilterRequest $request, IndexAction $action): JsonResource
    {
        return ClientResource::collection($action->handle($request->all()));
    }
    public function show(string $uuid, ShowAction $action): JsonResource
    {
        return new ClientResource($action->handle($uuid));
    }
}
