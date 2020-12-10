<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\MemberShip;
use App\UserPremium;
use Illuminate\Http\Request;

class UserPremiumController extends Controller
{
    public function create()
    {
        return view('main.home.membership', ['memberships' => MemberShip::all(), 'bankaccounts' => BankAccount::all()]);
    }

    public function store(Request $request)
    {
        auth()->user()->premium()->create($request->except('duration_id'));

        return redirect('home');
    }
}
