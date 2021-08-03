<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/admin/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:adminAuth')->except('logout');
    }


    public function guard()
    {
        return Auth::guard('adminAuth');
    }

    public function showLoginForm()
    {
        // return view('admin.auth.login');
    }

    /* login form */
    public function getLogin()
    {
        return view('dashboard.AdminAuth.loginForm');
    }

    public function postLogin(Request $request)
    {
        $request->validate(
            [
                'email'=>'required|string|max:255|email',
                'password' => 'required|string|min:8'
            ],
            [
                'email.required'=>'Do not input email blank',
                'email.email'=>'Input is not email',
                'password.min'=>'Password min 8 character'
            ]
        );
        if(
            Auth::guard('adminAuth')->attempt(['email' => request()->email, 'password' => request()->password], request()->has('remember'))
        ){
            return redirect()->route('admin.index');
        }
        return redirect()->back()->with('error','Login fall !');
    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        if(Auth::guard('adminAuth')->logout()){
            return redirect()->route('admin.login');
        }
        return redirect()->back()->with('error','Logout fall .');
        // auth()->guard('adminAuth')->logout();
        // Session::flush();
        // Sessioin::put('success','You are logout successfully');        
        // return redirect(route('adminLogin'));
    }
}
