<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\CdsProject;
use Illuminate\Support\Facades\File;
use App\CdsSlidePhoto;

class ObsCdsProjectController extends Controller
{
      public function __construct()
    {
        $this->middleware('obs');
    }


public function index(){

	$cds = CdsProject::orderBy('cds_project_id', 'desc')->join('users', 'users.id', '=', 'cds_project.user_id')->paginate(10);

	$title = "CDs Project";

	return view('ObsPages.cds')->with('title', $title)->with('cds', $cds);
}



public function create(){

	$title = "Create CDs Project";
	$users = User::all(); 

	return view('ObsPages.createcds')->with('title', $title)->with('users', $users);
}



public function store(Request $request){

	if ($request->ajax()) {

      $image_data = $request->image;
    $image_array_1 = explode(";", $image_data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);
    $image_name = 'cdsimage'.$request->cds_topic.''.time().'.png';
    $upload_path = 'assets/img/cdsimage/'.$image_name;
    file_put_contents($upload_path, $data);



		$cds = new CdsProject;
		$cds->user_id = $request->cds_user_id;
		$cds->project_topic = $request->cds_topic;
		$cds->project_image = $image_name;
		$cds->project_detail = $request->cds_detail;
		$cds->sponsored_by = $request->cds_sponsored_by;
		$cds->project_from_date = $request->cds_from_date;
		$cds->project_to_date = $request->cds_to_date;
		$cds->view = 0;
		$cds->save();
		
		return response()->json('Project Uploaded Successfully');
	}
}



public function edit($id){

	$title = "Edit CDs Project";
		$users = User::all(); 
		$cds = CdsProject::find($id);
		$photos = CdsSlidePhoto::where('cds_id', $id)->get();

	return view('ObsPages.editcds')->with('title', $title)->with('users', $users)->with('cds', $cds)->with('photos', $photos);
}



public function update(Request $request){

	if ($request->ajax()) {

		$cds = CdsProject::find($request->cds_id);

		$cds->user_id = $request->edit_cds_user_id;
		$cds->project_topic = $request->edit_cds_topic;
		$cds->project_detail = $request->edit_cds_detail;
		$cds->sponsored_by = $request->edit_cds_sponsored_by;
		
		$cds->save();
		return response('Updated Successfully');
	}
}



public function updateimage(Request $request){

	if ($request->ajax()) {

		$image_data = $request->image;
    $image_array_1 = explode(";", $image_data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);
    $image_name = 'cdsimage'.$request->cds_topic.''.time().'.png';
    $upload_path = 'assets/img/cdsimage/'.$image_name;
    file_put_contents($upload_path, $data);

		$cds = CdsProject::find($request->cds_id);
		File::delete('assets/img/cdsimage/'.$cds->project_image);
		$cds->project_image = $image_name;
		$cds->save();

		return response()->json('Updated Successfully');
	
	}
}


public function uploadcdsslideimage(Request $request){

	if ($request->ajax()) {
		


		$image = $request->file('slide_photo');
		$ext = $image->getClientOriginalExtension();

		if ($ext != 'jpg') {
		
		return response()->json(['message' => 'Sorry image must be jpg format', 'class_name' => 'alert-danger']);
		}else if($request->file('slide_photo')->getSize() > 2097152){

return response()->json(['message' => 'Picture must not be greater than 2MB', 'class_name' => 'alert-danger']);

		}else{

		$new_name = date('YmD').'Slide'.date('YmD').'photo'.rand().'.'.$ext;
		$image->move('assets/img/cdsimage', $new_name);

		$photo = new CdsSlidePhoto;
		$photo->cds_id = $request->photo_cds_id;
		$photo->photo = $new_name;
		$photo->save();

		return response()->json(['message' => 'Image Uploaded Successfully', 'class_name' => 'alert-success']);

		}


		
	}
}



public function deletecdsslideimage(Request $request){

	if ($request->ajax()) {

		$photo = CdsSlidePhoto::find($request->photo_id);
		File::delete('assets/img/cdsimage/'.$photo->photo);
		$photo->delete();

		
		return response('Deleted Successfully');
	}
}


public function deletecds(Request $request){
	if ($request->ajax()) {
		
		$cds = CdsProject::find($request->cds_id);
		File::delete('assets/img/cdsimage/'.$cds->project_image);
		$cds->delete();

		$check = CdsSlidePhoto::where('cds_id', $request->cds_id)->get();

		if (count($check) > 0) {
			
			CdsSlidePhoto::where('cds_id', $request->cds_id)->delete();

			foreach ($check as $image) {
				File::delete('assets/img/cdsimage/'.$image->photo);
			}
		}


		return response('Delete Successfully');
	}
}








}
