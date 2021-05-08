<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventorySearchRequest;
use App\Http\Resources\InventoryResource;
use App\Services\InventoryService;

/**
 * Class InventoryController
 * @package App\Http\Controllers
 */
class InventoryController extends Controller
{
    /**
     * @var \App\Services\InventoryService
     */
    private $service;

    /**
     * InventoryController constructor.
     * @param \App\Services\InventoryService $service
     */
    public function __Construct(InventoryService $service)
    {
        $this->service = $service;
    }

    /**
     * @param \App\Http\Requests\InventorySearchRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function search(InventorySearchRequest $request)
    {
        $filters = $request->only([
            'hotel_name',
            'destination',
            'price_range',
            'sort_by'
        ]);

        $data = $this->service->search($filters);

        return response([
            'message' => 'Success',
            'data' => InventoryResource::collection($data)
        ], '200');
    }
}
