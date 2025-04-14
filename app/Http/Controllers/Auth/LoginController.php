<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
//===================================================================================

	public function read(Request $request)
	{
		$user = Auth::user();
		return response()->json(['user' => Auth::user()]);
	}

//===================================================================================

	public function create(LoginRequest $request)
	{
		$credentials = $request->only(['email', 'password']);

		if(!Auth::attempt($credentials))
			return response()->json(["error" => "Datos de acceso no válidos"], 401);

		$request->session()->regenerate();

		return response()->json(['success' => true ]);
	}

//===================================================================================

	public function delete(Request $request)
	{
		Auth::logout();
		return response()->json(['message' => 'Sesión cerrada correctamente.']);
	}

//===================================================================================

}
