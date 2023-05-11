<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index() {
        if (auth()->check()) {
            return view('user.index');
        } else {
            return redirect('/login-page')->with('failure', 'You must be logged in.');
        }        
    }

    public function registerPage() {
        return view('user.register-page');
    }

    public function register(Request $request) {
        $userFields = $request->validate([
            'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $userFields['password'] = bcrypt($userFields['password']);

        $user = User::create($userFields);
        return redirect('/')->with('success', 'Thank you for creating an account.');
    }

    public function loginPage() {
        return view('user.login-page');
    }

    public function login(Request $request) {
        $userFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(['email' => $userFields['email'], 'password' => $userFields['password']])) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'You have successfully logged in.');
        } else {
            return redirect('/login-page')->with('failure', 'Invalid login.');
        }
    }

    public function logout() {
        auth()->logout();
        return redirect('/login-page')->with('success', 'You are now logged out.');
    }

    public function profile(User $user) {
        return view('user.profile', ['username'=> $user->username,'posts' => $user->posts()->latest()->get()]);
    }
}
