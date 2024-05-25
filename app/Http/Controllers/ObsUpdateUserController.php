<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Year;

class ObsUpdateUserController extends Controller
{
     public function __construct()
    {
        $this->middleware('obs');
    }


    public function index(){

    	$title = "CorpsMembers";

    	$years = Year::orderBy('year', 'asc')->get();

    	return view('ObsPages.corpsmembers')->with('title', $title)->with('years', $years);
    }


public function fetch(Request $request){

	if ($request->ajax()) {
		
		$admin = Admin::find(1);

		if ($request->user_name != '') {
		
		$users = User::orderBy('account_status', 'asc')->join('states', 'states.state_id', '=', 'users.state_of_origin')->where('name','LIKE',"%{$request->user_name}%")->orWhere('email','LIKE',"%{$request->user_name}%")->orWhere('phone_number','LIKE',"%{$request->user_name}%")->orWhere('state_code','LIKE',"%{$request->user_name}%")->get();
		}else{


			$users = User::orderBy('account_status', 'asc')->where('batch', $admin->batch)->where('stream', $admin->stream)->where('year', $admin->year)->get();
		}

		return response(['corps'=> $users, 'total'=>count($users)]);
	}
}



public function update(Request $request){

	if ($request->ajax()) {

		$user = User::find($request->corps_id);
		$user->name = $request->corps_name;
		$user->state_code = $request->corps_state_code;
		$user->email = $request->corps_email;
		$user->account_status = $request->corps_account_status;
		$user->year = $request->corps_year;
		$user->batch = $request->corps_batch;
		$user->stream = $request->corps_stream;
		$user->save();
		return response('Updated');


	}
}





}
