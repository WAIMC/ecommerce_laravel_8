<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
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
        return Auth::guard('admin');
    }

    public function showLoginForm()
    {
        // return view('admin.auth.login');
    }

    /* register form */
    public function getRegister()
    {
        return view('dashboard.AdminAuth.RegisterForm');
    }

    public function postRegister(Request $request)
    {
        $request->validate(
            [
                'name'=>'required|string|max:255',
                'email'=>'required|string|max:255|email|unique:admin',
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ],
            [
                'name.required'=>'Do not input full name blank',
                'name.string'=>'Full name is string',
                'name.max'=>'Full name max 255 character',
                'email.required'=>'Do not input email blank',
                'email.email'=>'Input is not email',
                'email.unique'=>'This email has exits',
                'password.min'=>'Password min 8 character',
                'password.confirmed'=>'Confirm password wrong',
            ],
        );
        if(Admin::create([
            'name'=>request()->name,
            'email'=>request()->email,
            'password'=>Hash::make(request()->password)
        ])){
            return redirect()->route('admin.login')->with('success','Register new Admin successfully.');
        }else{
            return redirect()->back()->with('error','Register new Admin Fall.');
        }
    }

}
