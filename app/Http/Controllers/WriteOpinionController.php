<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WriteOpinionController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
    }
    
    public function store(Request $request)
    {
        $opinions=new \App\Opinion;
        $opinions->user_id=auth()->user()->id;
        $opinions->product_id=$request->input('product_id');
        $opinions->rating=$request->input('rating');
        $opinions->opinion=$request->input('textopinion');
        $opinions->save();
        return back()->with('success_message','Komentarz został dodany!');

    }

    public function destroy($id)
    {
        $user_id=auth()->user()->id;
        $opinion=\App\Opinion::where('opinion_id',$id)->where('user_id',$user_id);;
        
        $opinion->delete();
        return back()->with('success_message','Komentarz został usunięty!');
    
    }
}
