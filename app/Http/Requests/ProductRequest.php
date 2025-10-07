<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products,name|max:255',
            'category_id' => 'required|exists:categories,id',
            'market_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'current_stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'description' => 'nullable|string',
        ];
    }

    /**
     * Custom error messages (optional).
     */
    public function messages(): array
    {
        return [
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'Selected category does not exist.',
            'name.required' => 'Product name is required.',
            'market_price.required' => 'Market price is required.',
            'sale_price.gte' => 'Sale price must be greater than or equal to market price.',
            'image.image' => 'The file must be an image.',
            'current_stock.required' => 'Current Stock name is required.',
        ];
    }
}
