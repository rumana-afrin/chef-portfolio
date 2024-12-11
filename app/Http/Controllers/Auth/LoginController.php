<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
   public function login(){
      return view('auth.login');
   }
    public function index(Request $request)
    {
 
       $credential = $request->validate([
          'email' => 'required|email',
          'password' => ['required',Password::min(3)->numbers()],
 
       ]);
 
       if(!Auth::attempt(['email' => $credential['email'], 'password' => $credential['password']])){
          // event(new Attempting($credential, false, true));
          // return back()->withErrors(['success' => trans('auth.failed')]);
          return back()->with('success', SOMETHING_WENT_WRONG);
       }else{
          return view('dashboard');
       }
    }

    public function logout(){
      Auth::logout(); // Logs out the currently authenticated user by clearing their session.
      session()->invalidate(); // Invalidates the current session, ensuring that no session data is accessible after logout.
      session()->regenerateToken(); // Regenerates the CSRF token to prevent CSRF attacks after the user logs out.
      return redirect()->route('login')->with('status', 'Logged out successfully!'); // Redirects the user to the login route.
   }
   
}
