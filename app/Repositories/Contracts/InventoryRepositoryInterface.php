<?php

namespace App\Repositories\Contracts;

/**
 * Interface InventoryRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface InventoryRepositoryInterface
{
    /**
     * @param array $filters
     * @param array $data
     * @return mixed
     */
    public function search( array $filters, $data = []);
}
