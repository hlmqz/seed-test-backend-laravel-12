<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends AppRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{

		$rules = [
			'name' => ['required', 'max:120'],
			'price' => ['required', 'integer', 'min:1'],
			'description' => ['required', 'string', 'max:500'],
			'active' => ['required', 'boolean'],
		];

		switch($this->method())
		{
			case 'POST':
				$rules['name'][] = $this->closureUniqueCaseInsensitive(
					table: 'products',
					field:'name',
				);
				break;

			case 'PATCH':
			case 'PUT':
				$rules['name'][] = $this->closureUniqueCaseInsensitive(
					table: 'products',
					field:'name',
					omittedField:'id',
				);
				break;
		}

		return $rules;
	}

	/**
	* Get custom attributes for validator errors.
	*
	* @return array
	*/
	public function attributes()
	{
		return [
			'name' => 'Nombre',
			'price' => 'Precio',
			'description' => 'Descripción',
			'active' => 'Activo',
		];
	}

}
