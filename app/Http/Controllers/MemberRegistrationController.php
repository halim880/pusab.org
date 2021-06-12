<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRegistrationRequest;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class MemberRegistrationController extends Controller
{
    public function register(MemberRegistrationRequest $request){
        $request->createMember();

        return redirect('backend/members');
    }
}
