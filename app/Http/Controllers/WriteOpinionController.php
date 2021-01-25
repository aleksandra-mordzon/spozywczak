<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WriteOpinionController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id=auth()->user()->id;
        $opinion=\App\Opinion::where('opinion_id',$id)->where('user_id',$user_id);;
        
        $opinion->delete();
        return back()->with('success_message','Komentarz został usunięty!');
    
    }
}
