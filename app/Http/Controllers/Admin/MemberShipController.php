<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MemberShip;
use Illuminate\Http\Request;

class MemberShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.memberships.index', ['memberships' => MemberShip::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.memberships.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MemberShip::create($request->except('_token'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MemberShip  $memberShip
     * @return \Illuminate\Http\Response
     */
    public function show(MemberShip $memberShip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MemberShip  $memberShip
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberShip $memberShip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MemberShip  $memberShip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberShip $memberShip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MemberShip  $memberShip
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberShip $memberShip)
    {
        //
    }
}
