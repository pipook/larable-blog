<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class sessionsController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email'=> ['required', 'email', 'max:255', Rule::exists('users', 'email')],
            'password'=> ['required', 'min:7', 'max:18']
        ]);
        if(auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome Back!');
        }
        throw ValidationException::withMessages([
            'email'=> 'Your provided credentials could not be verified.'
        ]);
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
}
