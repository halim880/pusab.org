<?php

namespace App\Http\Controllers\Scholarship;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdmitCardRequest;
use App\Models\AdmitCard;
use App\Models\Center;
use Illuminate\Http\Request;

class AdmitCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(AdmitCard::createView())->with([
            'action_url'=> AdmitCard::storeUrl(),
            'centers'=> Center::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdmitCardRequest $request)
    {
        $admitCard = $request->store();
        return redirect($admitCard->url);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdmitCard  $admitCard
     * @return \Illuminate\Http\Response
     */
    public function show(AdmitCard $admitCard)
    {
        return view(AdmitCard::showView())->with([
            'admitCard'=> $admitCard,
            'applicant'=> $admitCard->applicant,
            'exam'=> $admitCard->exam,
            'center'=> $admitCard->center,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdmitCard  $admitCard
     * @return \Illuminate\Http\Response
     */
    public function edit(AdmitCard $admitCard)
    {
        return view(AdmitCard::VIEWS_PATH.'edit', compact('admitCard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdmitCard  $admitCard
     * @return \Illuminate\Http\Response
     */
    public function update(AdmitCardRequest $request, AdmitCard $admitCard)
    {
        $admitCard->update($request->validated());
        return redirect($admitCard->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdmitCard  $admitCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdmitCard $admitCard)
    {
        $admitCard->delete();
    }
}
