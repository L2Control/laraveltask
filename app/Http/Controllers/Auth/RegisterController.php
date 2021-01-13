<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //Validation
        $this->validate($request, [
            'username' => 'required|max:16|min:3|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        //Store User
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        //Sign the user in
        auth()->attempt($request->only('username', 'password'));

        //Redirect
        return redirect('/');
    }
}
