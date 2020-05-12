<?php

namespace App\Http\Controllers;

use App\MemberShipDuration;
use Illuminate\Http\Request;

class MemberShipDurationController extends Controller
{
    public function index($id)
    {
        return MemberShipDuration::whereMembershipId($id)->get();
    }
}
