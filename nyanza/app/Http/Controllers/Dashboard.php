<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Dashboard extends Controller
{
    public function dashboard()
    {
        // Check if the user is logged in
        if (!session()->has('user_id')) {
            return redirect('/login')->withErrors(['login' => 'Please login first.']);
        }

        // Fetch the logged-in user
        $user = User::find(session('user_id'));

        // Return the view with user data
        return view('auth.dashboard', ['user' => $user]);
    }

    
}
