<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberRoleController extends Controller
{
    public function assignRole(Request $request, Member $member){
        $member->assignRole($request->role);
        return back();
    }

    public function revokeRole(Request $request, Member $member){
        $member->removeRole($request->role);
        return back();
    }
}
