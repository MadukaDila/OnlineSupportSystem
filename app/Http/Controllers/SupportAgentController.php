<?php

namespace App\Http\Controllers;

use App\Models\SupportAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportAgentController extends Controller
{
    public function index() 
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication successful
            return response()->json(['success' => true, 'message' => 'Login successful']);
        } else {
            // Authentication failed
            return response()->json(['success' => false, 'message' => 'Invalid credentials']);
        }
    }
    

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    // public function showRegistrationForm()
    // {
    //     return view('auth.register');
    // }

    public function register(Request $request)
{
    $validatedData = $request->validate([
        'username' => 'required|unique:support_agents',
        'password' => 'required|min:6',
    ]);

    $user = SupportAgent::create([
        'username' => $validatedData['username'],
        'password' => bcrypt($validatedData['password']),
    ]);

    Auth::login($user);

    return response()->json(['message' => 'User registered successfully', 'user' => $user]);
}
}
