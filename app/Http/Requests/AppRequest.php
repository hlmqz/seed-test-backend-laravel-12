<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppRequest extends FormRequest
{
	/**
	* Get the validation messages.
	*
	* @return array
	*/
	public function messages()
	{
		return [
			'*.required' => 'El campo [:attribute] es requerido.',
			'*.exists' => 'El campo [:attribute] como dependencia no existe previamente.',
			'*.numeric'  => 'El campo [:attribute] debe ser un número válido',
			'*.email'    => 'El campo [:attribute] debe ser de formato de correo electrónico válido',
			'*.date_format' => 'El campo [:attribute] debe ser un formato de fecha válido',
			'*.min' => 'El campo [:attribute] debe ser un mínimo de :value',
			'*.max' => 'El campo [:attribute] no puede ser mayor a :value',
			'*.between' => 'El campo [:attribute] no está entre valores de tamaño',
			'*.array' => 'El campo [:attribute] debe ser un array de elementos',
			'*.required_if' => 'El campo [:attribute] es requerido si :other es :value',
			'*.digits_between' => 'El campo [:attribute] debe estar entre :min y :max',
			'*.unique' => 'El campo [:attribute] ya existe, intente otro',
			'*.regex' => 'El campo [:attribute] no cumple con un formato de validación específico.',
			'*.url' => 'El campo [:attribute] debe ser un formato url válido.',
			'*.in' => 'El campo [:attribute] debe ser un valor válido en un listado.',
			'*.not_in' => 'El campo :attribute, el valor ( :input ) no debe estar en los valores: ( :values )',
			'*.boolean' => 'El campo [:attribute] debe ser un valor de verdadero o falso.',
		];
	}

}
