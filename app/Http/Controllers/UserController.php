<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user', [
            'title' => 'User Profile'
        ]);
    }

    public function update_profile()
    {
        return view('update-profile', [
            'title' => 'Update Profile'
        ]);
    }
}
