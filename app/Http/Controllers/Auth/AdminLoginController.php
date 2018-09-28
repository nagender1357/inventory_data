<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class AdminLoginController extends Controller
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin,admin/home')->except('logout');
    }

    public function redirectTo()
    {
        return 'admin/home';
    }

    protected function guard()
    {
        return \Auth::guard('admin');
    }

    public function showLoginForm()
    {
        return view('auth.adminlogin');
    }

    public function login( Request $request )
    {
        die();
        // Validate form data
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required|min:6'
        ]);
        // Attempt to authenticate user
        // If successful, redirect to their intended location
        if ( Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember) ) {
            return redirect()->intended( route('admin.home') );
        }
        // Authentication failed, redirect back to the login form
        return redirect()->back()->withInput( $request->only('email', 'remember') );
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->guest(route( 'admin.login' ));
    }

}
