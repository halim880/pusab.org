<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvisorSignupRequest;
use Illuminate\Http\Request;

class AdvisorSignupController extends Controller
{
    public function signup(AdvisorSignupRequest $request){
        $request->createAdvisor();
    }
}
