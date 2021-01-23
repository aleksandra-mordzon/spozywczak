<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Hash;
use Str;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function googleredirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googlecallback()
    {
        try{
            $user = Socialite::driver('google')->user();
        }catch(\Exception $e){
            return redirect('/login');
        }
        $fullname=explode(" ",$user->name);
        $user=\App\User::firstOrCreate([
            'email' => $user->email
        ],
        [
            'name' => $fullname[0],
            'surname' => $fullname[1] ? $fullname[1] : "---" ,
            'email' => $user->email,
            'password' => Hash::make(Str::random(24))

        ]);
            
            
        auth()->login($user, true);
            
        
        return redirect()->to('/');

    }
    
}
