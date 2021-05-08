<?php

namespace App\Repositories;

use App\DataSource\InventoryDataSource;
use App\Repositories\Contracts\InventoryRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Class JsonInventoryRepository
 * @package App\Repositories
 */
class JsonInventoryRepository implements InventoryRepositoryInterface
{
    /**
     * @var \App\DataSource\InventoryDataSource
     */
    private $inventoryDataSource;

    /**
     * JsonInventoryRepository constructor.
     * @param \App\DataSource\InventoryDataSource $inventoryDataSource
     */
    public function __construct(InventoryDataSource $inventoryDataSource)
    {
        $this->inventoryDataSource = $inventoryDataSource;
    }

    /**
     * Search
     * @param array $filters
     * @param array $data
     * @return array|mixed
     */
    public function search( array $filters, $data = [])
    {
        $collection = new Collection($data);

        $inventory = $collection->all();

        if (array_key_exists('hotel_name', $filters)) {
            $inventory = $this->inventoryDataSource->filterByHotelName($filters['hotel_name'], $collection);
        }
        if (array_key_exists('destination', $filters)) {
            $inventory =  $this->inventoryDataSource->filterByDestination($filters['destination'], $collection);
        }
        if (array_key_exists('price_range', $filters)) {
            $inventory =  $this->inventoryDataSource->filterByPriceRange($filters['price_range'], $collection);
        }
        if (array_key_exists('sort_by', $filters)) {
            return $this->inventoryDataSource->sort($filters['sort_by'], $inventory);
        }

        return $inventory;
    }
}
