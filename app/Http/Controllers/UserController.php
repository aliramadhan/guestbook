<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Hash;

class UserController extends Controller
{
    public function viewChangePassword()
    {
    	return view('auth.change-password');
    }
    public function ChangePassword(Request $request)
    {
    	$this->validate($request,[
			"old_password" => "",
			"password" => "confirmed|different:old_password"
    	]);
    	$user = auth()->user();
    	#cek old password
    	if (Hash::check($request->old_password, $user->password)) { 
		   $user->fill([
		    'password' => Hash::make($request->password)
		    ])->save();

	        #redirect and send alert success
	        Alert::success('Change Password', 'Password changed successfully.');
		    return redirect()->route('profile.viewchange_password');

		} else {
		    $request->session()->flash('error', 'Password does not match');
	        #redirect and send alert success
	        Alert::error('Change Password', 'Password does not match.');
		    return redirect()->route('profile.viewchange_password');
		}
    }
}
