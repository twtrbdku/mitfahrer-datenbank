<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = Auth::user();

        if($request->isMethod('post')){
            $validatedData = $request->validate([
                'name'      => 'required|string|max:255',
                'phone'     => 'required|string|max:255',
                'gender'    => 'required|boolean',
                #'password'  => 'string|min:6|confirmed',
            ]);

            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->gender = $request->gender;
            if($request->password){
                $user->password = $request->password;
            }

            $user->save();
        }

        return view('user.edit', [
            'user' => $user,
        ]);
    }
}
