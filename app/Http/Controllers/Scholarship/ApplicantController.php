<?php

namespace App\Http\Controllers\Scholarship;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicantRequest;
use App\Models\AdmitCard;
use App\Models\Applicant;
use App\Models\Center;
use App\Models\Exam;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(Applicant::indexView())->with([
            'applicants'=> Applicant::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(Applicant::createView())->with([
            'action_url'=> Applicant::indexUrl(),
            'exam_id'=> Exam::where('is_ongoing', 1)->first()->id,
            'schools'=> School::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicantRequest $request)
    {
        $request->store();
        Session::flash('message', 'Your application has successfully completed..!');
        return redirect('/pages/scholarship_exam');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        return view('scholarship.application.show')->with([
            'download_url'=> 'application/download/'.$applicant->id,
            'applicant'=> $applicant,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        return view(Applicant::editView())->with([
            'applicant'=> $applicant,
            'action_path'=> $applicant->url,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicantRequest $request, Applicant $applicant)
    {
        $request->update($applicant);
        return redirect($applicant->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        if ($applicant->delete()) {
            $applicant->removeImage();
        }
    }
}
