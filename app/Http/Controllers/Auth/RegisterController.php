<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        // Pasos a seguir para este función

        // Validación

        $this->validate($request, [
            "name" => "required|max:255",
            "username" => "required|max:255",
            "email" => "required|email|max:255",
            "password" => "required|confirmed|max:255",
        ]);

        // Almacenamiento del usuario

        User::create(
            [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]
        );

        // Redireccionamiento

        Auth::attempt($request->only('email', 'password'));

        return redirect()->route('dashboard');
    }
}
