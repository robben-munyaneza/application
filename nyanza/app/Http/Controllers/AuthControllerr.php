<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class AuthControllerr extends Controller
{
 public function showSignupForm(){

    return view('auth.signup');

 }

 public function signup(Request $request){

    //validate form data

    $request->validate([

        'username' => 'required|string|max:255',
        'password' => 'required|min:2',
    ]);

    // create user

    $user = new User();
     $user->username = $request->username;
     $user->password = $request->password;
     $user->save();

     
        // Redirect or return response
        return redirect('/login')->with('success', 'Signup successful!');

 }

 //login
public function loginForm(){

   return view('auth.login');

}

public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string|max:255',
        'password' => 'required|min:2',
    ]);

    $user = User::where('UserName', $request->username)->first();

    if ($user && $request->password === $user->Password) {
        session(['user_id' => $user->id]);
        return redirect('/dashboard');
    }

    return back()->withErrors(['login' => 'Invalid username or password']);

    
}
// 👇 Dashboard method


// 👇 Logout method
public function logout()
{
    session()->forget('user_id');

    return redirect('/login')->with('success', 'Logged out successfully.');
}


 }




