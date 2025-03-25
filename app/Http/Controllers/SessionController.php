<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Auth\User;

use function Laravel\Prompts\password;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store(){
        // validate
        $Attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(6), 'confirmed'],

        ]);
        dd($Attributes);
        // create the user
        $user = User::create($Attributes);
        // log in
        Auth::login($user);
        // redirect to somewhere
        return redirect('/jobs');
    }
}
