<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'picture' => 'image|mimes:png,jpg,jpeg|max:2048',
            'phone' => 'required|unique:users,phone',
            'city' => 'required|string',
            'secondary_services' => 'required|array',
            'secondary_services.*' => 'exists:secondary_services,id',
            'location_latitude' => 'required',
            'location_longitude' => 'required',
            'bank_name' => 'required|string',
            'iban' =>'required|string',
            'residence_picture' => 'image|mimes:png,jpg,jpeg|max:2048',
        ];
    }
}
