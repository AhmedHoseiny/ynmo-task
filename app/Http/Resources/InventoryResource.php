<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InventoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);

        return [
            'id' => $data['id'],
            'Hotel Name' => $data['name'],
            'Destination' => $data['city'],
            'Price' => $data['price'],
        ];
    }
}
