<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Information;
use App\InformationView;
use App\Year;
use App\User;

class ObsInformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('obs');
    }


    public function index(){

    $title = "Information";
$useryears = User::orderBy('year', 'asc')->groupBy('year')->get();

    return view('ObsPages.information')->with('title', $title)->with('useryears', $useryears);

    }


    public function getdetailsforinfo(Request $request){

    	if ($request->ajax()) {

    		$admin = Admin::find(1);
		return response($admin);

    	}
    }



    public function store(Request $request){

    	if ($request->ajax()) {
    	
    	$check = Information::where('i_title', $request->info_title)->where('i_batch',$request->info_batch)->where('i_stream',$request->info_stream)->where('i_year',$request->info_year)->get();			
    	if (count($check) > 0 ) {

    		return response('Opps! this information title has been posted before, for the current batch');
    	}else {

    		$info = new Information;
    		$info->i_title = $request->info_title;
    		$info->i_info = $request->info_content;
    		$info->i_from = 'obs';
    		$info->i_signed = $request->info_signature;
    		$info->i_batch = $request->info_batch;
    		$info->i_stream = $request->info_stream;
    		$info->i_year = $request->info_year;
    		$info->obs_info_status = 'active';
    		$info->admin_info_status = 'active';
    		$info->i_view = 0;
    		$info->save();


    	return response('Inserted Successfully');

    	}

    	}
    }



public function getinformation(Request $request){

	if ($request->ajax()) {
		
		
		$info = Information::orderBy('i_id', 'desc')->get();
		return response($info);
	}
}



public function delete(Request $request){
if ($request->ajax()) {

    $info = Information::find($request->delete_info_id);
    $info->delete();
   // InfornationView::where('i_v_i_id', $request->delete_info_id)->delete();
	return response('Deleted Successfully');
}
}



public function update(Request $request){
  if ($request->ajax()) {

    
            $info = Information::find($request->edit_info_id);
            $info->i_title = $request->edit_info_title;
            $info->i_info = $request->edit_info_content;
            $info->i_signed = $request->edit_info_signature;
            $info->obs_info_status = $request->edit_info_status;
            $info->i_batch = $request->edit_info_batch;
            $info->i_stream = $request->edit_info_stream;
            $info->i_year = $request->edit_info_year;
            $info->save();
            return response('Updated Successfully');
} 

}







}
