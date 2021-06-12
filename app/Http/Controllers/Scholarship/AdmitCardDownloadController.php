<?php

namespace App\Http\Controllers\Scholarship;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class AdmitCardDownloadController extends Controller
{
    public function downloadAdmitCard(Applicant $applicant){
        $data = $applicant->getAdmitCardData();
        $pdf = PDF::loadView('scholarship.admitCard.pdf', compact('data'));
        return $pdf->download('admitCard.pdf');
    }

    public function createAdmitCardForm(){
        return view('scholarship.admitCard.download_form')->with([
            'action_url'=> 'admitCard/show',
        ]);
    }

    public function showAdmitCard(Request $request){

        return view('scholarship.admitCard.show')->with([
            'data'=> Applicant::findOrFail($request->applicant_id)->getAdmitCardData(),
        ]);
    }
}
