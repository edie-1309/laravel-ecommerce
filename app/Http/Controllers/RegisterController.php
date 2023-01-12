<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Eazy Play! | Register'
        ];

        return view('register', $data);
    }

    public function store(Request $request)
    {   
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // Hash password
        $validateData['password'] = Hash::make($validateData['password']);

        // Role
        $validateData['role_id'] = 1;

        User::create($validateData);

        return redirect('/login')->with('success', 'Registration successfull! Please Login!');
    }
}
