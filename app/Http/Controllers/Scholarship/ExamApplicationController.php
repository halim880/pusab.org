<?php

namespace App\Http\Controllers\Scholarship;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamApplicationController extends Controller
{
    public function closeApplication(Exam $exam){
        $exam->closeApplication();
        return redirect($exam->url);
    }

    public function startApplication(Exam $exam){
        $exam->startApplication();
        return redirect($exam->url);
    }

    public function publishAdmitCard(Exam $exam){
        $exam->publishAdmitCard();
        return redirect($exam->url);
    }

    public function viewApplicants(Exam $exam){
        return view(Applicant::indexView())->with([
            'applicants'=> $exam->applicants,
        ]);
    }
}
