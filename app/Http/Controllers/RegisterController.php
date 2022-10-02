<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function viewRegisterForm()
    {
        return view('registerForm');
    }

    public function registerNewUser()
    {
        $attributes = request()->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required'
            ],
            [
                'email.unique' => 'Το email υπάρχει ήδη',
                'email.required' => 'Το email είναι υποχρεωτικό',
            ]
        );

        $attributes['password'] = bcrypt($attributes['password']);

        if ( User::create($attributes) ) {
            return back()->with('success', 'Ο λογαριασμός σας δημιουργήθηκε!');
        }
    }
}
