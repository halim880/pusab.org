<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvisorUpdateRequest;
use App\Models\Advisor;
use Illuminate\Http\Request;

class AdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.advisor.index')->with([
            'advisors'=> Advisor::orderBy('passing_year', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.advisor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function show(Advisor $advisor)
    {
        return view('backend.advisor.show')->with([
            'advisor'=> $advisor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function edit(Advisor $advisor)
    {
        return view('backend.advisor.edit')->with([
            'advisor'=> $advisor,
            'action_url'=> $advisor->url,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function update(AdvisorUpdateRequest $request, Advisor $advisor)
    {
        $request->update($advisor);
        return redirect($advisor->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advisor $advisor)
    {
        //
    }
}
