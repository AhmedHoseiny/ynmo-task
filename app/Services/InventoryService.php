<?php

namespace App\Services;

use App\Repositories\Contracts\InventoryRepositoryInterface;
use Illuminate\Support\Facades\Http;

/**
 * Class InventoryService
 * @package App\Services
 */
class InventoryService
{
    /**
     * @var \App\Repositories\Contracts\InventoryRepositoryInterface
     */
    private $inventoryRepo;

    /**
     * InventoryService constructor.
     * @param \App\Repositories\Contracts\InventoryRepositoryInterface $inventoryRepo
     */
    public function __construct(InventoryRepositoryInterface $inventoryRepo)
    {
        $this->inventoryRepo = $inventoryRepo;
    }

    /**
     * Search
     * @param $filters
     * @return mixed
     */
    public function search($filters)
    {
        $data = $this->getData();

        return $this->inventoryRepo->search($filters, $data);
    }

    /**
     * GetDate from external api
     * @return mixed
     */
    public function getData()
    {
        try {
            $response = Http::get(config('thirdParty.inventory_url'));
            $body = $response->json();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $body['data'];
    }
}
