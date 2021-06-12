<?php

namespace App\Http\Controllers\Scholarship;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationStoreRequest;
use App\Models\AdmitCard;
use App\Models\Applicant;
use App\Models\Exam;
use App\Models\School;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ApplicationStoreController extends Controller
{
    public function createApplication(int $examId){
        return view('scholarship.application.create')->with([
            'action_url'=> 'application/submit',
            'examId'=> $examId,
            'schools'=> School::all(),
        ]);
    }

    public function storeApplication(ApplicationStoreRequest $request){
        $application =  $request->store();
        Session::flash(
            'message', 'Your application has successfully completed..!',
        );
        return view('scholarship.application.show')->with([
            'download_url'=> 'application/download/'.$application->id,
            'applicant'=> $application,
        ]);
    }

    public function downloadApplication(Applicant $applicant){
        // ini_set('max_execution_time', 300);
        $pdf = PDF::loadView('scholarship.application.pdf', compact('applicant'));
        return $pdf->download('application.pdf');
    }
}
