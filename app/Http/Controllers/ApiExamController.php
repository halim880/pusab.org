<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScholarshipExamRequest;
use App\Models\Exam;
use Illuminate\Http\Request;

class ApiExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'exams'=> Exam::all(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScholarshipExamRequest $request)
    {
        $request->store();
        return response([
            'message'=> 'Exam is saved',
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        return response([
            'exam'=> $exam,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(ScholarshipExamRequest $request, Exam $exam)
    {
        $request->update($exam);
        return response([
            'message'=> 'Exam is updated',
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();
        return response([
            'message'=> 'Exam is deleted',
        ], 200);
    }
}
