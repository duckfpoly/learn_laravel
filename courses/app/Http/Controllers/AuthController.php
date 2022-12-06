<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('accounts.signin');
    }
    public function processLogin(Request $request){
        try {
            $user = Users::query()
                ->where('username',$request->get('username'))
                ->where('password',$request->get('password'))
                ->firstOrFail();
            session()->put('id',$user->id);
            session()->put('image',$user->image);
            session()->put('role',$user->role);

            return redirect()->route('categories.index');
        }catch (\Throwable $exception) {
            return redirect()->route('login')->with('error',$exception);
        }
    }

}
