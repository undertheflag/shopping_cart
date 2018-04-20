<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{
    public function getSignup() {
        return view('user.signup');
    }

    public function postSignup(Request $request) {
        $this->validate($request, [
            'email' => 'email | required | unique:users',
            'password' => 'required | min:4',
        ]);

        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        $user->save();

        Auth::login($user); //login right after sign up

        if (Session::has('oldUrl')) { //redirect to old url, for better experience
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        }

        return redirect()->route('user.profile');
    }

    public function getSignin() {
        return view('user.signin');
    }

    public function postSignin(Request $request) {
        $this->validate($request, [
            'email' => 'email | required', //removed 'unique:users'
            'password' => 'required | min:4',
        ]);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ])){
            if (Session::has('oldUrl')) {
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect()->route('user.profile'); //normal sign in redirect
        }
        return redirect()->back();
    }

    public function getProfile(){
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        }); //unserialize order cart;
        return view('user.profile', ['orders' => $orders]);
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('user.signin'); //don't use redirect back func.
    }
}
