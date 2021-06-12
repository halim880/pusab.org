<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CenterController extends Controller
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
        return view('scholarship.center.create')->with([
            'action_url'=> Center::BASE_URL,
            'examId'=> request('examId'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'exam_id'=> ['required', 'numeric'],
            'name'=> ['required', 'string'],
            'address'=> ['required','string'],
        ]);
        Center::create($data);
        Session::flash('success', 'Center successfully saved');
        return redirect(Exam::find($request->exam_id)->url);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function show(Center $center)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function edit(Center $center)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Center $center)
    {
        $data = $request->validate([
            'name'=> ['required', 'string'],
        ]);
        $center->update($data);
        return redirect($center->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function destroy(Center $center)
    {
        $center->delete();
        return redirect(Center::indexUrl());
    }
}
