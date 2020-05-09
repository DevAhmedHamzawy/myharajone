<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MemberShip;
use App\MemberShipDuration;
use Illuminate\Http\Request;

class MemberShipDurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.membershipdurations.index', ['membershipdurations' => MemberShipDuration::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.membershipdurations.add', ['memberships' => MemberShip::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MemberShipDuration::create($request->except('_token'));
        return redirect('admin/membershipdurations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MemberShipDuration  $memberShipDuration
     * @return \Illuminate\Http\Response
     */
    public function show(MemberShipDuration $memberShipDuration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MemberShipDuration  $memberShipDuration
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberShipDuration $memberShipDuration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MemberShipDuration  $memberShipDuration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberShipDuration $memberShipDuration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MemberShipDuration  $memberShipDuration
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberShipDuration $memberShipDuration)
    {
        //
    }
}
