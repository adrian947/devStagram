<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request){
        // dd($request->get('username'));

        $this->validate($request, [
            'name' => 'required|min:5',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
    }
}
