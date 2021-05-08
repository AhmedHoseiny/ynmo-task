<?php

namespace Tests\Feature;

use Illuminate\Support\Collection;
use Tests\TestCase;

class InventoryTest extends TestCase
{
    public function testItReturnsAllInventoryDataWithoutFilter()
    {
        $response = $this->json('get','api/inventory/search');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'data' => [[
                    'id',
                    'Hotel Name',
                    'Destination',
                    'Price'
                ]]
            ]);
    }
}
