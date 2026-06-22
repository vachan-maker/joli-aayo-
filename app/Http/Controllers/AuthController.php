<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
        return view('registration');
    }
    public function register(Request $request) {
        $validated = $request -> validate(
            [
                'name'=>'min:2|max:250|string|nullable',
                'password'=>'min:8|max:256|string|required',
                'email' => 'required|email'
            ]
        );
        User::create($validated);



    }
    public function loginPage() {
        return view('login');
    }
    public function login(Request $request) {
        $validated = $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);

        if(Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->route('applications.index');
        }
            return back()->withErrors([
        'email' => 'Invalid credentials',
    ]);
    }
    public function logout(Request $request) {
        Auth::logout();
        //invaldate the session
        $request->session()->invalidate();
    //regenerate csrf token
        $request->session()->regenerateToken();

        return redirect()->route('applications.index');
    }

    public function forgotPasswordPage() {
        return view('reset');
    }

    public function forgotPassword(Request $request) {
        $request -> validate([
            'email' => 'required|email'
        ]);
        //check if user exists..halle
        $user = User::where('email', $request->email)->first();
        if(!$user) {
            return back()->withErrors(['email'=>'User Not Found']);
        }

        return view('resetPassword',compact('user'));
    }
}
