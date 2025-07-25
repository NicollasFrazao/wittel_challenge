<?php

namespace App\Filament\Resources\CustomerResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
			'name' => 'required|string',
			'cpf' => 'required|string',
			'birth_date' => 'required|date',
			'income' => 'required|numeric',
			'deleted_at' => 'required'
		];
    }
}
