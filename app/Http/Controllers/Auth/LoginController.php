<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\User;
use Auth;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view ('login.index', ['page' => 'login-form']);
    }

    public function auth(){
        $data = (object) $_POST;

        $user = User::whereNested(function($query) use ($data){
            $query->where('username','=',trim($data->username));
            $query->where('password','=',trim($data->password));
        })->first();

        if(!$user){
            return redirect(route('login'))->with('error', 'Wrong user name or password');
        }  
        
        // Auth
        Auth::login($user);
        return redirect(route('dashboard'));
            
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
