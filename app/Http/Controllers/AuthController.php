<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        $formData=request()->validate([
            'name'=>['required','min:3','max:100'],
            'username'=>['required', 'min:3', 'max:100' ,Rule::unique('users', 'username')],
            'email'=>['required','email',Rule::unique('users', 'email')],
            'password'=>['required','min:8', 'max:100']
        ]);

        User::create($formData);
        return redirect('/');
    }
}
