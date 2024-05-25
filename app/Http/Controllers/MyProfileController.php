<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\States;
use App\LGA;
use App\UserEducation;
use App\UserAward;
use App\UserWork;
use App\UserSkill;
use App\UserShop;
use App\UserCall;
use App\UserWhatsapp;
use response;
use App\ShopProduct;
use App\Order;
use Validator;
use App\UserPhoto;
use App\SaedMaster;
use App\SaedSession;
use App\SaedSessionMember;
use App\CdsProject;
use App\UserChat;
class MyProfileController extends Controller
{
         public function __construct()
    {
        $this->middleware('auth');
    }

public function index($name, $id){

	$title = $name;
	if ($id == auth()->user()->id) {

		$order = Order::where('buyer_id', auth()->user()->id)->where('buyer_order_notify', 1)->get();

		$user_name = $name;
	$calls = DB::table('user_call')->orderBy('user_call_id', 'desc')->join('users As Caller', 'Caller.id', '=', 'user_call.caller_id')->join('users As Receiver', 'Receiver.id', '=', 'user_call.receiver_id')->select('Caller.name As caller_name','Caller.id As caller_id','Caller.phone_number As caller_number','Caller.whatsapp_number As caller_whatsapp','Receiver.name As receiver_name','Receiver.id As receiver_id','Receiver.phone_number As receiver_number','Receiver.whatsapp_number As receiver_whatsapp', 'user_call.created_at As time_called')->where('caller_id', $id)->orWhere('receiver_id', $id)->get();

$whats = DB::table('user_whatsapp')->orderBy('user_whatsapp_id', 'desc')->join('users As Sender', 'Sender.id', '=', 'user_whatsapp.sender_id')->join('users As Receiver', 'Receiver.id', '=', 'user_whatsapp.receiver_id')->select('Sender.name As sender_name','Sender.id As sender_id','Sender.phone_number As sender_number','Sender.whatsapp_number As sender_whatsapp','Receiver.name As receiver_name','Receiver.id As receiver_id','Receiver.phone_number As receiver_number','Receiver.whatsapp_number As receiver_whatsapp', 'user_whatsapp.created_at As time_sent')->where('sender_id', $id)->orWhere('receiver_id', $id)->get();


$count_call = UserCall::where('receiver_id', $id)->where('receiver_status', 1)->get();
$count_what = UserWhatsapp::where('receiver_id', $id)->where('receiver_status', 1)->get();

		$education = UserEducation::orderBy('e_id', 'desc')->where('user_id',  $id)->get();
		$works = UserWork::orderBy('w_id', 'desc')->where('user_id',  $id)->get();
		$awards = UserAward::orderBy('a_id', 'desc')->where('user_id',  $id)->get();
		$skills = UserSkill::orderBy('skill_id', 'desc')->where('user_id',  $id)->get();
$users = User::join('states', 'states.state_id', '=', 'users.state_of_origin')->where('id',$id)->get();

$orders = Order::orderBy('order_id', 'desc')->join('shop', 'shop.shop_id', '=', 'order.shop_id')->join('shop_product', 'shop_product.shop_product_id', '=', 'order.product_id')->where('buyer_id', auth()->user()->id)->get();	

 $friends = \DB::table('friend_request')->join('users As Sender', 'Sender.id', '=', 'friend_request.sender_id')->join('users As Receiver', 'Receiver.id', '=', 'friend_request.receiver_id')->join('states as SenderState', 'SenderState.state_id', '=', 'Sender.state_of_origin')->join('states as ReceiverState', 'ReceiverState.state_id', '=', 'Receiver.state_of_origin')->select('Sender.name as sender_name', 'Receiver.name as receiver_name', 'Sender.id as sender_id', 'Receiver.id as receiver_id', 'Sender.profile_pic as sender_image', 'Receiver.profile_pic as receiver_image','Sender.batch as sender_batch', 'Receiver.batch as receiver_batch', 'Sender.stream as sender_stream', 'Receiver.stream as receiver_stream', 'Sender.year as sender_year', 'Receiver.year as receiver_year', 'SenderState.state as sender_state', 'ReceiverState.state as receiver_state', 'friend_request.f_r_id as request_id')->where(function($query) use ($id){
	$query->where('sender_id', $id)->where('request_status', 1);

})->orWhere(function($query) use ($id){
	$query->where('receiver_id', $id)->where('request_status', 1);
})->get();

$shops = UserShop::orderBy('shop_id', 'desc')->where('user_id', $id)->get();

$saeds = SaedSession::join('saed_masters', 'saed_masters.id', '=', 'saed_session.saed_id')->join('saed_session_member', 'saed_session_member.session_id', '=', 'saed_session.saed_session_id')->where('saed_session_member.user_id', $id)->get(); 
$cds = CdsProject::join('users', 'users.id', '=', 'cds_project.user_id')->where('user_id', $id)->get();

$photos = UserPhoto::where('user_id', auth()->user()->id)->get();
return view('pages.myprofile')->with('title', $title)->with('user_name', $user_name)->with('users', $users)->with('education', $education)->with('works', $works)->with('awards', $awards)->with('skills', $skills)->with('friends', $friends)->with('shops', $shops)->with('calls', $calls)->with('whats', $whats)->with('count_call', $count_call)->with('count_what', $count_what)->with('orders', $orders)->with('order', $order)->with('photos', $photos)->with('saeds', $saeds)->with('cds', $cds);
		
	}else{
		return redirect('/corpsmemberprofile/'.$name.'/'.$id);

	}
	

}


public function editmyprofile($name, $id){


      $count_msg = UserChat::where('receiver_id', $id)->where('receiver_status', 1)->get();
	$title = $name;
	$user_name = $name;
	$states = States::all();
	$photos = UserPhoto::where('user_id', auth()->user()->id)->get();
	$lgas = LGA::where('lga_state_id', auth()->user()->serving_state)->get();
	return view('pages.editmyprofile')->with('title', $title)->with('user_name', $user_name)->with('states', $states)->with('lgas', $lgas)->with('photos', $photos)->with('count_msg',$count_msg);
}



public function updatemyprofile(Request $request){

	if ($request->ajax()) {

		$user_id = auth()->user()->id;

		$user = User::find($user_id);
		$user->gender = $request->gender;
		$user->religion = $request->religion;
		$user->marital_status = $request->marital_status;
		$user->platoon = $request->platoon;
		$user->state_of_origin = $request->state_of_origin;
		$user->serving_lga = $request->serving_lga;
		$user->phone_number = $request->phone_number;	
		$user->whatsapp_number = $request->whatsapp_number;
		$user->facebook_id = $request->facebook_id;
		$user->about_me = $request->about_me;
		$user->save();
			
		return response('Updated Successfully');
		//return response($request->about_me);
}

}




public function uploadphoto(Request $request){

	 $this->validate($request, [
          'photo' => 'image|nullable|max:1999|required'
        ]);


	// if ($request->hasFile('photo')) {

	// 	return redirect('/editmyprofile/'.auth()->user()->name.'/'.auth()->user()->id)->with('error',$request->input('photo') );
	// }


}




public function addeducation(Request $request){

if ($request->ajax()) {

	$check = UserEducation::where('user_id', auth()->user()->id)->get();

	if (count($check) == 4 ) {
	return response('Opps!, You can only upload four education background.');
	}else{

		$edu = new UserEducation;
		$edu->user_id =  auth()->user()->id;
		$edu->school_name = $request->school_name;
		$edu->type = $request->degree_type;
		$edu->from_date = $request->education_from_date;
		$edu->to_date = $request->education_to_date;
		$edu->save();
		
		return response('Inserted Successfully');

	}
	
	

}


}




public function addaward(Request $request){
if ($request->ajax()) {
	
	$check = UserAward::where('user_id', auth()->user()->id)->get();

	if (count($check) == 3 ) {
	return response('Opps!, You can only upload three award.');
	}else{

		$award = new UserAward;
		$award->user_id =  auth()->user()->id;
		$award->award_name = $request->award_name;
		$award->award_detail = $request->award_detail;
		$award->award_date = $request->award_date;
		$award->save();
		
		return response('Inserted Successfully');

	}
}
}




public function addwork(Request $request){
	if ($request->ajax()) {
		
			$check = UserWork::where('user_id', auth()->user()->id)->get();

	if (count($check) == 4 ) {
	return response('Opps!, You can only upload four Work Exprience.');
	}else{

		$work = new UserWork;
		$work->user_id =  auth()->user()->id;
		$work->w_title = $request->w_title;
		$work->w_from_date = $request->w_from_date;
		$work->w_to_date = $request->w_to_date;
		$work->save();
		
		return response('Inserted Successfully');

	}
	}
}





public function addskill(Request $request){
if ($request->ajax()) {
	
	$check = UserSkill::where('user_id', auth()->user()->id)->get();

	if (count($check) == 4 ) {
	return response('Opps!, You can only upload four Specialization.');
	}else{

		$skill = new UserSkill;
		$skill->user_id =  auth()->user()->id;
		$skill->skill_name = $request->skill_name;
		
		$skill->save();
		
		return response('Inserted Successfully');

	}
}
}


public function fetcheducation(Request $request){
if ($request->ajax()) {

	$edu = UserEducation::orderBy('e_id', 'desc')->where('user_id', auth()->user()->id)->get();
	
	return response($edu);
}

}



public function deleteeducation(Request $request){
if ($request->ajax()) {

	$edu = UserEducation::find($request->e_id);
	$edu->delete();
	return response('Deleted Successfully');
}
}



public function fetchaward(Request $request){
if ($request->ajax()) {

	$award = UserAward::orderBy('a_id', 'desc')->where('user_id', auth()->user()->id)->get();
	
	return response($award);
}

}


public function deleteaward(Request $request){
if ($request->ajax()) {

	$award = UserAward::find($request->a_id);
	$award->delete();
	return response('Deleted Successfully');
}
}



public function fetchwork(Request $request){
if ($request->ajax()) {

	$work = UserWork::orderBy('w_id', 'desc')->where('user_id', auth()->user()->id)->get();
	
	return response($work);
}

}



public function deletework(Request $request){
if ($request->ajax()) {

	$work = UserWork::find($request->w_id);
	$work->delete();
	return response('Deleted Successfully');
}
}




public function fetchskill(Request $request){
if ($request->ajax()) {

	$skill = UserSkill::orderBy('skill_id', 'desc')->where('user_id', auth()->user()->id)->get();
	
	return response($skill);
}

}



public function deleteskill(Request $request){
if ($request->ajax()) {

	$skill = UserSkill::find($request->s_id);
	$skill->delete();
	return response('Deleted Successfully');
}
}




public function changeimage(Request $request){
	if ($request->ajax()) {

		if (auth()->user()->profile_pic == 'noimage.jpg') {
			
			$image_data = $request->image;
		$image_array_1 = explode(";", $image_data);
		$image_array_2 = explode(",", $image_array_1[1]);
		$data = base64_decode($image_array_2[1]);
		$image_name = 'profilepic'.auth()->user()->name.''.time().'.png';
		$upload_path = 'assets/img/corperimage/'.$image_name;
		file_put_contents($upload_path, $data);


		$user = User::find(auth()->user()->id);
		$user->profile_pic = $image_name;
		$user->save();
		
		return response()->json('Uploaded Successfully');

		}else{

 File::delete('assets/img/corperimage/'.auth()->user()->profile_pic);

			$image_data = $request->image;
		$image_array_1 = explode(";", $image_data);
		$image_array_2 = explode(",", $image_array_1[1]);
		$data = base64_decode($image_array_2[1]);
		$image_name = 'profilepic'.auth()->user()->name.''.time().'.png';
		$upload_path = 'assets/img/corperimage/'.$image_name;
		file_put_contents($upload_path, $data);


		$user = User::find(auth()->user()->id);
		$user->profile_pic = $image_name;
		$user->save();
		
		return response()->json('Uploaded Successfully');

		}


		
	}
} 





public function clearcallstatus(Request $request){
	if ($request->ajax()) {

	UserCall::where('receiver_id', auth()->user()->id)->where('receiver_status', 1)->update(['receiver_status' => 0]);

	}
}



public function clearwhatsappstatus(Request $request){
	if ($request->ajax()) {

	UserWhatsapp::where('receiver_id', auth()->user()->id)->where('receiver_status', 1)->update(['receiver_status' => 0]);

	}
}



public function usersuploadphoto(Request $request){
	if ($request->ajax()) {

		$check = UserPhoto::where('user_id', auth()->user()->id)->get();

		if (count($check) == 4) {
		return response()->json(['message' => 'Only 4 pictures allowed', 'class_name' => 'alert-danger']);
		}else{

		$image = $request->file('usersphoto');
		$ext = $image->getClientOriginalExtension();

		if ($ext != 'jpg') {
		
		return response()->json(['message' => 'Sorry image must be jpg format', 'class_name' => 'alert-danger']);
		}else if($request->file('usersphoto')->getSize() > 2097152){

return response()->json(['message' => 'Picture must not be greater than 2MB', 'class_name' => 'alert-danger']);

		} else{

		$new_name = date('YmD').'User'.date('YmD').'photo'.rand().'.'.$ext;
		$image->move('assets/img/corperimage', $new_name);

		$photo = new UserPhoto;
		$photo->user_id = auth()->user()->id;
		$photo->photo = $new_name;
		$photo->save();

		return response()->json(['message' => 'Image Uploaded Successfully', 'class_name' => 'alert-success']);

		}


		}
		
	}
}



public function deletemyphoto(Request $request){
	if ($request->ajax()) {

$photo = UserPhoto::find($request->photo_id);
	File::delete('assets/img/corperimage/'.$photo->photo);
$photo->delete();



	return response('Deleted');
	}
}









}
