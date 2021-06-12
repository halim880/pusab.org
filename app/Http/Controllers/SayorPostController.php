<?php

namespace App\Http\Controllers;

use App\Http\Requests\SayorPostRequest;
use App\Models\SayorPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SayorPostController extends Controller
{
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
        return view('pages.sayorpost.create')->with([
            'action_url'=> 'sayor-post/store',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SayorPostRequest $request)
    {
        $request->store();
        Session::flash('success', 'Your post is submitted successfully...!');
        return redirect('pages/publications');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SayorPost  $sayorPost
     * @return \Illuminate\Http\Response
     */
    public function show(SayorPost $post)
    {
        return view('pages.sayorpost.show')->with([
            'post'=> $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SayorPost  $sayorPost
     * @return \Illuminate\Http\Response
     */
    public function edit(SayorPost $sayorPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SayorPost  $sayorPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SayorPost $sayorPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SayorPost  $sayorPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(SayorPost $sayorPost)
    {
        //
    }
}
