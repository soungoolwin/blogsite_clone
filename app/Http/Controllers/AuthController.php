<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        $formData = request()->validate([
            'name'=>['required','max:255','min:3'],
            'username'=> ['required','max:255','min:3',Rule::unique('users', 'username')],
            'email'=>['required','email',Rule::unique('users', 'email')],
            'password'=>['required','max:30','min:5']
        ]);
        $user=User::create($formData);
        auth()->login($user);
        session()->flash('success', 'Welcome Dear, '. $user->name);
        return redirect('/')->with('success', 'Welcome Dear, '. $user->name);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Good Bye!!');
    }

    public function login()
    {
        return view('auth.login');
    }
    public function post_login()
    {
        $formData=request()->validate(
            [
            'email'=>['required', 'email', 'max:255', Rule::exists('users', 'email')],
            'password'=>['required', 'min:8', 'max:255']
        ],
            [
            'email.required'=>"We need your email address",
            'password.min'=>"Password must be more than 8 characters"
    ]
        );

        if (Auth::attempt($formData)) {
            $loginUser=User::where('email', $formData['email'])->first();
            return redirect('/')->with('success', 'Welcome Back ' . $loginUser['name']);
        } else {
            return back()->withErrors([
                'email'=>'User Credentials Wrong'
            ]);
        }
    }
}
