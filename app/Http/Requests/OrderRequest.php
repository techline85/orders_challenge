<?php

namespace App\Http\Requests;

use App\Helpers\OrderHelper;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_name' => 'required|string',
            'status' => ['required', Rule::in(OrderHelper::ORDER_STATUSES)],
            'products' => 'required|array',
            'products.*.id' => 'required|integer|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1'
        ];
    }


    public function withValidator($validator)
    {
        $validator->after(function($validator) {
            $this->validateStock($validator);
        });
    }


    protected function validateStock($validator)
    {
        foreach ($this->products as $product) {
            $productModel = Product::find($product['id']);
            
            if (!$productModel) {
                continue;
            }

            if ($productModel->stock < $product['quantity']) {
                $validator->errors()->add(
                    'products.' . $product['id'] . '.quantity',
                    "La quantità richiesta per il prodotto '{$productModel->name}' supera lo stock disponibile ({$productModel->stock})."
                );
            }
        }
    }
}
