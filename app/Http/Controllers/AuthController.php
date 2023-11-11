<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator; 

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        //dd('saswawa');
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        //dd($credentials);
        // Retrieve the user based on the email provided
        $user = User::where('email', $credentials['email'])->first();
       // dd($user);

//dd($user->password,($credentials['password']));

        // If a user was found and the provided password matches
        if ($user && password_verify($credentials['password'], $user->password)) {
            Auth::login($user);
              
            return redirect()->intended('home'); // Change this to your desired redirect path
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|confirmed',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return redirect('home')->with('success', 'Registration successful! Please log in.');
    }


    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();

        // Clear the session data
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect the user to the desired location after logout
        return redirect('/login');
    }
}