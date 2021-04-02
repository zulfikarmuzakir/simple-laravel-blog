<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}

	public function index()
	{
		return view('admin.settings.settings')->with('settings', Setting::first());
	}

    public function update()
    {
    	$this->validate(request(), [
    		'site_name' => 'required',
    		'contact_number' => 'required',
    		'contact_email' => 'required',
    		'address' => 'required',
			'about_us' => 'required|max:300'
    	]);

    	$settings = Setting::first();

    	$settings->site_name = request()->site_name;
    	$settings->contact_number = request()->contact_number;
    	$settings->contact_email = request()->contact_email;
    	$settings->address = request()->address;
		$settings->about_us = request()->about_us;

    	$settings->save();

    	return redirect()->back()->with('success', 'Settings updated.');
    }
}
