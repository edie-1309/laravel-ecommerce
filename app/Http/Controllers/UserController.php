<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('user', [
            'title' => 'User Profile',
            'user' => $user
        ]);
    }

    public function edit_profile(User $user)
    {
        return view('update-profile', [
            'title' => 'Edit Profile',
            'user' => $user
        ]);
    }

    public function update_profile(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone_number' => 'required|numeric',
            'address' => 'required',
            'user_image' => 'image'
        ]);

        if($request->file('user_image'))
        {
            if($request->oldImage !== 'user_profile/default.png')
            {
                Storage::delete($request->oldImage);
            }
            
            $validatedData['user_image'] = $request->file('user_image')->store('user_profile');
        }

        User::where('id', $user->id)->update($validatedData);

        return redirect('user-profile/' . $request->username)->with('success', 'User profile has been updated!');
    }

    public function change_password()
    {
        return view('change-password', [
            'title' => 'Change Password'
        ]);
    }

    public function update_password(Request $request, User $user)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required'
        ]);

        if (Hash::check($request->current_password , $user->password)) {
            
            $new_password = Hash::make($request->new_password);

            User::where('id', $user->id)->update([
                'password' => $new_password
            ]);

            return redirect('user-profile/' . $user->username)->with('success', 'Password has been changed!');
        }else{
            return back()->with('fail', "Password doesn't match!");
        }
    }
}
