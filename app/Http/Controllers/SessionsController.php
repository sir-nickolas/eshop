<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function viewLoginForm()
    {
        return view('sessions.loginForm');
    }

    public function userLogin(Request $request)
    {
        $attributes = request()->validate([

            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {

            $request->session()->regenerate();

            if (auth()->user()->email == 'admin@admin.com') {
                return redirect()->route('adminIndex');
            }
            return redirect('/')->with('success', 'Welcome back!');
        } else {
            return back()->withErrors([
                'email' => 'Τα στοιχεία που δώσατε είναι λάθος'
            ]);
        }
    }

    public function userLogOut(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
