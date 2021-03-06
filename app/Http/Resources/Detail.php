<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class Detail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'details' => $this->details,
            'subtotal'=> $this->subtotal,
            'iva' => $this->iva,
            'total' => $this->total,
            'quantity' => $this->quantity,
            'created_at' => $this->created_at,
            'updated_at' => $this-> updated_at,
            'order_buy_id' => $this->order_buy_id,
            'address' => $this->orderBuy->address,
            'product' => $this->products,
            'received' => $this->received

        ];
    }
}
