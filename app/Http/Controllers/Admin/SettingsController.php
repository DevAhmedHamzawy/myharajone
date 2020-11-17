<?php

namespace App\Http\Controllers\Admin;

use App\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings)
    {
        return view('admin.settings.edit', ['settings' => Settings::findOrFail(1)]);           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $settings)
    {
        //dd($request->all());
        //$settings->update($request->all());
        Settings::whereId(1)->update($request->except('_token','_method','1','0'));
        return redirect()->back();
    }
}
