<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SaedMaster;
use App\SaedSession;

class ObsUpdateSessionController extends Controller
{
     public function __construct()
    {
        $this->middleware('obs');
    }


public function index(){

	$title = "Saed Session";

	return view('ObsPages.session')->with('title', $title);
}



public function fetch(Request $request){

	if ($request->ajax()) {
		
		if ($request->session_id != '') {
		$session = SaedSession::orderBy('session_status', 'desc')->join('saed_masters', 'saed_masters.id', '=', 'saed_session.saed_id')->where('session_id','LIKE',"%{$request->session_id}%")->get();
		}else{

	$session = SaedSession::orderBy('session_status', 'desc')->join('saed_masters', 'saed_masters.id', '=', 'saed_session.saed_id')->get();

		}

		return response($session);


	}

}



public function activate(Request $request){

	if ($request->ajax()) {

		$session = SaedSession::find($request->session_id);
		$session->session_status = 'active';
		$session->activator_name = auth()->guard('obs')->user()->name;
		$session->activator_type = 'obs';
		$session->amount_paid = 1000;
		$session->save();

		return response('Now Active'); 	
	}
}




public function deactivate(Request $request){

	if ($request->ajax()) {

		$session = SaedSession::find($request->session_id);
		$session->session_status = 'inactive';
		$session->save();

		return response('Deactivated'); 	
	}
}










}
