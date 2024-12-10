<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
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
          return view('dashboard')->with("success", WELCOME_MESSAGE);
       }
    }
}
