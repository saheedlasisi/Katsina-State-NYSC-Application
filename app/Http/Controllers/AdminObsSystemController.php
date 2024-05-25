<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\Obs;
use App\Admin;
use App\User;
use App\Mail\ObsRegistrationMail;
use Staff;


class AdminObsSystemController extends Controller
{
      public function __construct()
    {
        $this->middleware('admin');
    }



    public function index(){

    	$title = "Obs";

    	return view('AdminPages.obs')->with('title', $title);


    }


    public function fetch(Request $request){

    	if ($request->ajax()) {

    	$admin = Admin::find(1);
		$users = User::orderBy('name', 'asc')->where('batch', $admin->batch)->where('stream', $admin->stream)->where('year', $admin->year)->get();
		return response($users);

    	}

    }



    public function store(Request $request){

    	if ($request->ajax()) {
    		
    	
    	$check = Staff::where('email', $request->staff_email)->get();
        $checkphone = Staff::where('phone_number', $request->staff_phone_number)->get();
    
    	if (count($check) > 0) {

    	 		return response("Email Taken.");
    	 	}else if(count($checkphone) > 0){

            return response("Phone Number Taken.");
            } else{

    	 		
    	 		

    	 		$staff = new Staff;
    	 	
    	 		$staff->name = $user->staff_name;
    	 		$staff->image = 'noimage.jpg';
    	 		$staff->email = $user->staff_email;
                $staff->phone_number = $request->staff_phone_number;
                $staff->position = $request->staff_position;
    	 		$staff->password = bcrypt($request->staff_password);
    	 		$staff->save();



    	 	return response('registered successfully');	

    	 	} 	




    	}

    }



public function obstable(Request $request){


	if ($request->ajax()) {
		
		//$obs = Obs::orderBy('obs.id', 'desc')->join('users', 'users.id', '=', 'obs.user_id')->get();

		$obs = DB::table('obs')->orderBy('obs.id', 'desc')->join('users', 'users.id', '=', 'obs.user_id')->select('*', 'obs.id as obs_user_id')->get();

		return response($obs);
	}


}




public function destroy(Request $request){

if ($request->ajax()) {

	$obs = Obs::find($request->obs_user_id);
	$obs->delete();

	return response('user removed successfully');

}

}





}
