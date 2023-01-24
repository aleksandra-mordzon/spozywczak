<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $user_id=auth()->user()->id;
        $user=\App\User::find($user_id);
        $productcart=\App\User::find($user_id);
        $data=array(
            'user'=>$user,
            'productcart'=>$productcart->cart
        );
        return view('home')->with($data);
    }
    public function editData(Request $request)
    {
        $user_id=auth()->user()->id;
        $user=\App\User::find($user_id);
        $name=$request->input('name');
        $surname=$request->input('surname');
        $password=$request->input('password');
        $password2=$request->input('password2');
        if($name!=$user->name)
        {
            $user->name=$name;
        }
        if($surname!=$user->surname)
        {
            $user->surname=$surname;
        }
        if(!(is_null($password)))
        {
            if($password==$password2)
            {
                $user->password=Hash::make($password);
            }
        }
        $user->save();

        return back();

    }

    public function destroy(Request $request)
    {
        $user_id=auth()->user()->id;
        if($user_id==$request->input('id')){
            $user = \App\User::find($user_id);
            $mail= new MailController($user_id);
            $mail->sendDeleteUserMail();
            $user->delete();
            Auth::logout();
            return response()->json(['success' => true]);
        }
        else
        {
            return ['error' => true];
        }
        
    }
}
