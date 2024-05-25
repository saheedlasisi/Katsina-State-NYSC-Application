<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\User;
use App\Admin;
use App\SaedMaster;
use App\SaedSession;
use App\SaedSessionReview;
use DB;
use App\SaedSessionLecture;
use App\SaedLectureView;
use App\SaedLectureQuestion;
use App\SaedEbook;
use App\SaedSessionMember;
use App\SaedSessionChat;
use App\SaedSessionGroup;


class SaedMasterDashboardController extends Controller
{
     public function __construct()
    {
        $this->middleware('saedmaster');
    }

    public function index(){

    	$title = "Dashboard";

 $chats = DB::table('saed_session_chat')->join('saed_session', 'saed_session.saed_session_id', '=', 'saed_session_chat.session_id')->select('saed_session.session_id As true_session_id','saed_session_chat.session_id As session_id',DB::raw('count(IF(saed_session_chat.saed_notify = 1, 1, NULL)) As total_notify') )->where('saed_session_chat.saed_notify', 1)->where('saed_session_chat.saed_id', auth()->guard('saedmaster')->user()->id)->groupBy('saed_session_chat.session_id')->get();

       // $chats = SaedSessionChat::->get();

    	return view('SaedMasterPages.index')->with('title', $title)->with('chats', $chats);
    }


    public function profilesetting(){

    	$title = "Profile Setting";
    	return view('SaedMasterPages.profilesetting')->with('title', $title);
    }


    public function updateprofile(Request $request){
    	if ($request->ajax()) {


    	$saed = SaedMaster::find(auth()->guard('saedmaster')->user()->id);	
    	$saed->name = $request->edit_saed_name;
    	$saed->email = $request->edit_saed_email;
    	$saed->saed_title = $request->edit_saed_title;
    	$saed->phone_number = $request->edit_saed_phone_number;
    	$saed->about = $request->edit_saed_about;	
    	$saed->address = $request->edit_saed_address;
    	$saed->save();

    		return response("Uddated Successfully");
    	}
    }




    public function changeimage(Request $request){
if ($request->ajax()) {

    if (auth()->guard('saedmaster')->user()->image == 'noimage.jpg') {
      
      $image_data = $request->image;
    $image_array_1 = explode(";", $image_data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);
    $image_name = 'profilepic'.auth()->guard('saedmaster')->user()->name.''.time().'.png';
    $upload_path = 'assets/img/saedimage/'.$image_name;
    file_put_contents($upload_path, $data);


     $saedmaster = SaedMaster::find(auth()->guard('saedmaster')->user()->id);
    $saedmaster->image = $image_name;
    $saedmaster->save();
    
    return response()->json('Uploaded Successfully');

    }else{

 File::delete('assets/img/saedimage/'.auth()->guard('saedmaster')->user()->image);

      $image_data = $request->image;
    $image_array_1 = explode(";", $image_data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);
    $image_name = 'profilepic'.auth()->guard('saedmaster')->user()->name.''.time().'.png';
    $upload_path = 'assets/img/saedimage/'.$image_name;
    file_put_contents($upload_path, $data);

$saedmaster = SaedMaster::find(auth()->guard('saedmaster')->user()->id);
    $saedmaster->image = $image_name;
    $saedmaster->save();
    
    return response()->json('Uploaded Successfully');

    }

 


}
}




  public function updatepassword(Request $request){
    if ($request->ajax()) {

      $saed = SaedMaster::find(auth()->guard('saedmaster')->user()->id);
      $saed->password = bcrypt($request->edit_password);
      $saed->save();
      return response('Password Changed Successfully');
    }
  }














}
