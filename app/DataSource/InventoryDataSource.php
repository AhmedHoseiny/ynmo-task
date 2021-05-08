<?php

namespace App\DataSource;

use Illuminate\Support\Str;

/**
 * Class InventoryDataSource
 * @package App\DataSource
 */
class InventoryDataSource
{
    /**
     * @param $name
     * @param $collection
     * @return mixed
     */
    public function filterByHotelName($name, $collection)
    {
        return $collection->where('name', $name);
    }

    /**
     * @param $destination
     * @param $collection
     * @return mixed
     */
    public function filterByDestination($destination, $collection)
    {
        return $collection->where('city', $destination);
    }

    /**
     * @param $priceRange
     * @param $collection
     * @return mixed
     */
    public function filterByPriceRange($priceRange, $collection)
    {
        if (Str::contains($priceRange, ":")) {
            $priceRange = explode(":", $priceRange);
        }

        return $collection->whereIn('price', $priceRange);
    }

    /**
     * @param $item
     * @param $collection
     * @return mixed
     */
    public function sort($item, $collection)
    {
        return $collection->sortBy($item);
    }
}
