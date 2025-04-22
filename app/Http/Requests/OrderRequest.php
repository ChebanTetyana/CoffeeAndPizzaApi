<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'cartItems' => 'required|array|min:1',
            'cartItems.*.count' => 'required|integer|min:1',
            'cartItems.*.price' => 'required|numeric|min:0.01',
            'cartItems.*.name' => 'required|string|max:255',
            'cartItems.*.product_type' => 'required|integer',
            'totalPrice' => 'required|numeric|min:0'
        ];
    }
}
