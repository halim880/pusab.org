<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberUpdateRequest;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Member::orderby('session')->get()->groupBy(function ($item){
            return $item->session;
        });
        return view('backend.member.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('backend.member.show')->with([
            'member'=> $member,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('backend.member.edit')->with([
            'member'=> $member,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(MemberUpdateRequest $request, Member $member)
    {
        $request->update($member);
        return redirect($member->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }

    public function memberRequest(Member $member){
        $notification = DB::table('notifications')->where('id', request('notification_id'))->update([
            'read_at'=> now(),
        ]);
        return view('backend.member.request')->with([
            'member'=> $member,
        ]);
    }

    public function approve(Member $member){
        $member->update(['approved'=> true]);
        Session::flash('message', 'Member approved successfully');
        return back();
    }
}
