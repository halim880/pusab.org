<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Advisor;
use App\Models\Applicant;
use App\Models\Exam;
use App\Models\Member;
use App\Models\Notice;
use App\Models\SayorPost;
use App\Models\School;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function welcome(){
        return view('welcome')->with([
            'images'=> DB::table('slider_images')->get(),
        ]);
    }
    public function home(){
        return view('pages.home');
    }

    public function about(){
        return view('pages.about');
    }

    public function contact(){
        return view('pages.contact');
    }

    public function publications(){
        return view('pages.publications')->with([
            'posts'=> SayorPost::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function members(){

        return view('pages.members')->with([
            'members'=> Member::all(),
        ]);
    }

    public function advisors(){
        return view('pages.advisors')->with([
            'advisors'=> Advisor::all(),
        ]);
    }

    public function notice(){
        return view('pages.notice')->with([
            'exam'=> Exam::where('is_ongoing', 1)->first(),
            'notices'=> Notice::all(),
        ]);
    }

    public function activities(){
        return view('pages.activities')->with([
            'activities'=> Activity::all(),
        ]);
    }

    public function scholarship_exam(){
        return view('pages.scholarship_exam')->with([
            'exam'=> Exam::where('is_ongoing', 1)->first(),
        ]);;
    }

    public function dashboard(){
        return view('dashboard');
    }
}
