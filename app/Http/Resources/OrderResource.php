<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'customer_name' => $this->customer_name,
            'products' => OrderProductResource::collection($this->whenLoaded('products')),
            'total' => $this->products->sum(function ($product) {
                return $product->pivot->quantity * $product->price;
            }),
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
