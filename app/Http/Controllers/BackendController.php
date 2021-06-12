<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\Member;
use Illuminate\Http\Request;

class BackendController extends Controller
{

    public function members(){
        return view('backend.members');
    }

    public function advisors(){
        return view('backend.advisors');
    }

    public function notice(){
        return view('backend.notice');
    }

    public function publications(){
        return view('backend.publications');
    }

    public function dashboard(){

        return view('backend.dashboard')->with([
            'totalMember'=> Member::count(),
            'totalAdvisor'=> Advisor::count(),
        ]);
    }
}
