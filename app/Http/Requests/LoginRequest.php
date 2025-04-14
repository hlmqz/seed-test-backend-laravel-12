<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends AppRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'email' => ['required','string', 'email'],
			'password' => ['required','string'],
		];
	}

	/**
	* Get custom attributes for validator errors.
	*
	* @return array
	*/
	public function attributes()
	{
		return [
			'email' => 'Correo electrónico',
			'password' => 'Contraseña',
		];
	}

}
