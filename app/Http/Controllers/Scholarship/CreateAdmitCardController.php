<?php

namespace App\Http\Controllers\Scholarship;

use App\Http\Controllers\Controller;
use App\Models\AdmitCard;
use App\Models\Applicant;
use App\Models\Center;

class CreateAdmitCardController extends Controller
{
    public function CreateAdmitCard(Applicant $applicant){
        return view($applicant->create_admit_card_view)->with([
            'applicant'=> $applicant,
            'centers'=> Center::all(),
            'action_url'=> AdmitCard::storeUrl(),
        ]);
    }
}
