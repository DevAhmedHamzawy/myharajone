<?php

namespace App\Http\Controllers;

use App\MemberShipDuration;
use Illuminate\Http\Request;

class MemberShipDurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return MemberShipDuration::whereMembershipId($id)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MemberShipDuration  $memberShipDuration
     * @return \Illuminate\Http\Response
     */
    public function show(MemberShipDuration $memberShipDuration)
    {
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
