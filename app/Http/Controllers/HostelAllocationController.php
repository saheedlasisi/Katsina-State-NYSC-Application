<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\HostelAllocation;
use App\Admin;
use App\Staff;
use App\User;


class HostelAllocationController extends Controller
{
     public function __construct()
    {
        $this->middleware('staff');
    }



    public function index(){

    	$title = "Hostel Allocaton";

    	return view('StaffPages.hostelallocation')->with('title', $title);
    }


//Subming allocation

    public function store(Request $request){

    	if ($request->ajax()) {

    		$user_id = $request->allocate_user_id;
    		$stream = $request->allocate_stream;
    		$batch = $request->allocate_batch;
    		$year = $request->allocate_year;
    		$block = $request->allocate_block;
    		$room = $request->allocate_room;

    		$check = HostelAllocation::where('user_id', $user_id)->get();

    		if (count($check) > 0) {

    			return response('Existing, proceed with another user.');
    		}else{

    			$user = User::find($user_id);

    			if ($user->gender == 'male') {

    			$hostel = new HostelAllocation;
    			$hostel->user_id = $user_id;
    			$hostel->h_block = $block;
    			$hostel->h_room = $room;
    			$hostel->h_batch = $batch;
    			$hostel->h_stream = $stream;
    			$hostel->h_year = $year;
    			$hostel->type = 'male';
    			$hostel->save();

    			}else{

    			$hostel = new HostelAllocation;
    			$hostel->user_id = $user_id;
    			$hostel->h_block = $block;
    			$hostel->h_room = $room;
    			$hostel->h_batch = $batch;
    			$hostel->h_stream = $stream;
    			$hostel->h_year = $year;
    			$hostel->type = 'female';
    			$hostel->save();

    			}

    		return response('Allocated Successfully.');	

    		}
    		
    		
    	}

    }


//geting admin info for allocation
    public function getadmininfo(Request $request){

    	if ($request->ajax()) {
		
		$admin = Admin::find(1);
		return response($admin);
	}

    }



//fetch corper for allocation
public function fetchcorperforallocation(Request $request){


	if ($request->ajax()) {
		$admin = Admin::find(1);
		$users = User::orderBy('name', 'asc')->where('batch', $admin->batch)->where('stream', $admin->stream)->where('year', $admin->year)->get();
		return response($users);
	}


}




public function fetchmalecorperallocated(Request $request){

	if ($request->ajax()) {
		$admin = Admin::find(1);
		


		if ($request->male_block_filter != '') {

		$allocated = HostelAllocation::orderBy('h_block', 'asc')->join('users', 'users.id','=','hostel_allocation.user_id')->where('h_block', $request->male_block_filter)->where('type', 'male')->get();
			
		}else if($request->male_block_and_room_block !='' AND $request->male_block_and_room_room != ''){

			$allocated = HostelAllocation::orderBy('h_batch', 'asc')->join('users', 'users.id','=','hostel_allocation.user_id')->where('h_block', $request->male_block_and_room_block)->where('h_room',$request->male_block_and_room_room )->where('type', 'male')->get();

		}else if($request->male_manual_block != '' AND $request->male_manual_room != '' AND $request->male_manual_batch !='' AND $request->male_manual_stream !='' AND $request->male_manual_year !=''){

	$allocated = HostelAllocation::orderBy('h_batch', 'asc')->join('users', 'users.id','=','hostel_allocation.user_id')->where('h_block', $request->male_manual_block)->where('h_room',$request->male_manual_room )->where('h_batch', $request->male_manual_batch )->where('h_stream', $request->male_manual_stream)->where('h_year', $request->male_manual_year)->where('type', 'male')->get();

		}else{

		$allocated = HostelAllocation::orderBy('h_batch', 'asc')->join('users', 'users.id','=','hostel_allocation.user_id')->where('h_batch', $admin->batch)->where('h_stream', $admin->stream)->where('h_year', $admin->year)->where('type', 'male')->get();	

		}

		return response($allocated);

	}
}








public function fetchfemalecorperallocated(Request $request){

	if ($request->ajax()) {
		$admin = Admin::find(1);
		


		if ($request->female_block_filter != '') {

		$allocated = HostelAllocation::orderBy('h_block', 'asc')->join('users', 'users.id','=','hostel_allocation.user_id')->where('h_block', $request->female_block_filter)->where('type', 'female')->get();
			
		}else if($request->female_block_and_room_block !='' AND $request->female_block_and_room_room != ''){

			$allocated = HostelAllocation::orderBy('h_batch', 'asc')->join('users', 'users.id','=','hostel_allocation.user_id')->where('h_block', $request->female_block_and_room_block)->where('h_room',$request->female_block_and_room_room )->where('type', 'female')->get();

		}else if($request->female_manual_block != '' AND $request->female_manual_room != '' AND $request->female_manual_batch !='' AND $request->female_manual_stream !='' AND $request->female_manual_year !=''){

	$allocated = HostelAllocation::orderBy('h_batch', 'asc')->join('users', 'users.id','=','hostel_allocation.user_id')->where('h_block', $request->female_manual_block)->where('h_room',$request->female_manual_room )->where('h_batch', $request->female_manual_batch )->where('h_stream', $request->female_manual_stream)->where('h_year', $request->female_manual_year)->where('type', 'female')->get();

		}else{

		$allocated = HostelAllocation::orderBy('h_batch', 'asc')->join('users', 'users.id','=','hostel_allocation.user_id')->where('h_batch', $admin->batch)->where('h_stream', $admin->stream)->where('h_year', $admin->year)->where('type', 'female')->get();	

		}

		return response($allocated);

	}
}






//removig allocated corper from lodge
public function removemalecorperallocated(Request $request){


if ($request->ajax()) {

HostelAllocation::where('user_id', $request->male_user_id)->delete();

	return response('Removed Successfully');
}

}









//removig allocated corper from lodge
public function removefemalecorperallocated(Request $request){


if ($request->ajax()) {

HostelAllocation::where('user_id', $request->female_user_id)->delete();

	return response('Removed Successfully');
}

}















}
