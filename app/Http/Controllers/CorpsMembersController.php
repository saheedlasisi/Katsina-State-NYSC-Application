<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\input;
use DB;
use App\User;
use App\UserStatus;
use App\State;
use App\UserEducation;
use App\UserAward;
use App\UserWork;
use App\UserSkill;
use App\FriendRequest;
use App\UserChat;
use Validator;
use response;
use App\Http\Requests;
use App\UserShop;
use App\UserPhoto;
use App\SaedMaster;
use App\SaedSession;
use App\SaedSessionMember;
use App\CdsProject;

class CorpsMembersController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }


public function index(){

	$title = "Corps Members";

        $count_msg = UserChat::where('receiver_id', auth()->user()->id)->where('receiver_status', 1)->get();

	return view('pages.corpsmembers')->with('title', $title)->with('count_msg',$count_msg);
}



public function load(Request $request){

	if ($request->ajax()) {

		if ($request->corpsmember_name != '') {
			
	$corps = User::orderBy('users.name', 'asc')->join('states', 'states.state_id', '=', 'users.state_of_origin')->where('name','LIKE',"%{$request->corpsmember_name}%")->orWhere('email','LIKE',"%{$request->corpsmember_name}%")->get();
		}else{

			$corps = User::orderBy('users.name', 'asc')->join('states', 'states.state_id', '=', 'users.state_of_origin')->where('batch', auth()->user()->batch)->where('stream', auth()->user()->stream)->where('year', auth()->user()->year)->where('id', '!=' ,auth()->user()->id)->get();
		}
		
		return response(['corps'=>$corps, 'total'=>count($corps)]);
	}
}




public function profile($name, $id){

	$title = $name;

	if ($id == auth()->user()->id) {
		return redirect('/myprofile/'.$name.'/'.$id);
	}else{
		

		$user_name = $name;
		$education = UserEducation::orderBy('e_id', 'desc')->where('user_id',  $id)->get();
		$works = UserWork::orderBy('w_id', 'desc')->where('user_id',  $id)->get();
		$awards = UserAward::orderBy('a_id', 'desc')->where('user_id',  $id)->get();
		$skills = UserSkill::orderBy('skill_id', 'desc')->where('user_id',  $id)->get();
$users = User::join('states', 'states.state_id', '=', 'users.state_of_origin')->where('id',$id)->get();

// $friends = \DB::table('friend_request')->where(function($query) use ($id){
// 	$query->where('sender_id', $id)->where('request_status', 1);

// })->orWhere(function($query) use ($id){
// 	$query->where('receiver_id', $id)->where('request_status', 1);
// })->get();

$shops = UserShop::orderBy('shop_id', 'desc')->where('user_id', $id)->where('shop_account_status', 'active')->get();

 $friends = \DB::table('friend_request')->join('users As Sender', 'Sender.id', '=', 'friend_request.sender_id')->join('users As Receiver', 'Receiver.id', '=', 'friend_request.receiver_id')->join('states as SenderState', 'SenderState.state_id', '=', 'Sender.state_of_origin')->join('states as ReceiverState', 'ReceiverState.state_id', '=', 'Receiver.state_of_origin')->select('Sender.name as sender_name', 'Receiver.name as receiver_name', 'Sender.id as sender_id', 'Receiver.id as receiver_id', 'Sender.profile_pic as sender_image', 'Receiver.profile_pic as receiver_image','Sender.batch as sender_batch', 'Receiver.batch as receiver_batch', 'Sender.stream as sender_stream', 'Receiver.stream as receiver_stream', 'Sender.year as sender_year', 'Receiver.year as receiver_year', 'SenderState.state as sender_state', 'ReceiverState.state as receiver_state')->where(function($query) use ($id){
	$query->where('sender_id', $id)->where('request_status', 1);

})->orWhere(function($query) use ($id){
	$query->where('receiver_id', $id)->where('request_status', 1);
})->get();







$wearefriends =  \DB::table('friend_request')->where(function($query) use ($id){
	$query->where('sender_id', auth()->user()->id)->where('receiver_id', $id);

})->orWhere(function($query) use ($id){
	$query->where('sender_id', $id)->where('receiver_id', auth()->user()->id);
})->get();

$saeds = SaedSession::join('saed_masters', 'saed_masters.id', '=', 'saed_session.saed_id')->join('saed_session_member', 'saed_session_member.session_id', '=', 'saed_session.saed_session_id')->where('saed_session_member.user_id', $id)->get(); 

$cds = CdsProject::join('users', 'users.id', '=', 'cds_project.user_id')->where('user_id', $id)->get();
$photos = UserPhoto::where('user_id', $id)->get();
	return view('pages.corpsmemberprofile')->with('title', $title)->with('user_name', $user_name)->with('users', $users)->with('education', $education)->with('works', $works)->with('awards', $awards)->with('skills', $skills)->with('friends', $friends)->with('wearefriends', $wearefriends)->with('shops', $shops)->with('photos', $photos)->with('saeds', $saeds)->with('cds', $cds);
	}
	

}




public function getonlinestatus(Request $request){

	if ($request->ajax()) {
		$status = UserStatus::where('user_id', $request->corper_id)->get();

		return response(['status' => $status, 'date' => date('Y-m-d H:i:s')]);
		
	}

}


public function sendrequest(Request $request){
	if ($request->ajax()) {


		$checkuser = User::find($request->r_id);

		if ($checkuser->account_status == 'inactive') {
			return response('Fail to add user, due to unverified account.');
		}elseif (auth()->user()->account_status == 'inactive') {
			return response('Verify your account.');
		}else{

		$friend = new FriendRequest;
		$friend->sender_id = auth()->user()->id;
		$friend->receiver_id = $request->r_id;
		$friend->request_status = 0;
		$friend->save();
		
		return response('Sent');

	}
	}
}



public function cancelrequest(Request $request){
	if ($request->ajax()) {

		$friend = FriendRequest::find($request->c_id);
		$friend->delete();
		
		return response('Cancelled');
	}
}



public function acceptrequest(Request $request){
	if ($request->ajax()) {

		$friend = FriendRequest::find($request->a_id);
		$friend->request_status = 1;
		$friend->save();
		
		return response('Accepted');
	}
}

public function acceptrequest2(Request $request){
	if ($request->ajax()) {

		$friend = FriendRequest::find($request->a2_id);
		$friend->request_status = 1;
		$friend->save();
		
		return response('Accepted');
	}
}


public function declinerequest(Request $request){
	if ($request->ajax()) {

		$friend = FriendRequest::find($request->d_id);
		$friend->delete();
		
		return response('Declined');
	}
}


public function declinerequest2(Request $request){
	if ($request->ajax()) {

		$friend = FriendRequest::find($request->d2_id);
		$friend->delete();
		
		return response('Declined');
	}
}




public function unfriend(Request $request){
	if ($request->ajax()) {

		$friend = FriendRequest::find($request->u_id);
		$friend->delete();
		
		return response('Unfriend');
	}
}



public function fetchrequest(Request $request){
	if ($request->ajax()) {
		
	$users = FriendRequest::orderBy('f_r_id', 'desc')->join('users', 'users.id', '=', 'friend_request.sender_id')->join('states', 'states.state_id', '=', 'users.state_of_origin')->where('receiver_id', auth()->user()->id)->where('request_status', 0)->get();

		return response(['users'=>$users, 'total'=> count($users)]);
	}
}



public function sendmessage(Request $request){
	if ($request->ajax()) {

$id = $request->chatuser_id;


$chats =  \DB::table('chat')->where(function($query) use ($id){
	$query->where('sender_id', auth()->user()->id)->where('receiver_id', $id);

})->orWhere(function($query) use ($id){
	$query->where('sender_id', $id)->where('receiver_id', auth()->user()->id);
})->take(1)->get();


	if (count($chats) > 0) {
		foreach ($chats as $chat) {
			$msg = new UserChat;
		$msg->sender_id = auth()->user()->id;
		$msg->receiver_id = $id;
		$msg->message = $request->chatuser_msg;
		$msg->chat_code = $chat->chat_code;
		$msg->receiver_status = 1;
		$msg->time_sent = date('h:i A');
		$msg->save();

		}
	}else{

		$msg = new UserChat;
		$msg->sender_id = auth()->user()->id;
		$msg->receiver_id = $id;
		$msg->message = $request->chatuser_msg;
		$msg->chat_code = rand();
		$msg->receiver_status = 1;
		$msg->time_sent = date('h:i A');
		$msg->save();

	}


		

		
	}
}




public function fetchmessage(Request $request){
	if ($request->ajax()) {
//->join('users As Sender', 'Sender.id', '=', 'chat.sender_id')
	$user_id = $request->chatuser_user_id;
	$chats =  \DB::table('chat')->orderBy('chat_id', 'desc')->join('users As Receiver', 'Receiver.id', '=', 'chat.receiver_id')->where(function($query) use ($user_id){
	$query->where('sender_id', auth()->user()->id)->where('receiver_id', $user_id);

})->orWhere(function($query) use ($user_id){
	$query->where('sender_id', $user_id)->where('receiver_id', auth()->user()->id);
})->get();

	
	return response($chats);

		
	}
}



public function chats(){

	$title = 'Chats';

	return view('pages.chats')->with('title', $title);


 

	//return $users = \DB::table('chat')->orderBy('time_sent', 'desc')->join('users_status As SenderStatus', 'SenderStatus.user_id', '=', 'chat.sender_id')->join('users_status As ReceiverStatus', 'ReceiverStatus.user_id', '=', 'chat.receiver_id')->join('users As Sender', 'Sender.id', '=', 'chat.sender_id')->join('users As Receiver', 'Receiver.id', '=', 'chat.receiver_id')->select('Sender.profile_pic as sender_image','Receiver.profile_pic as receiver_image','Sender.name as sender_name','Receiver.name as receiver_name','sender_id','receiver_id' ,'message','SenderStatus.status as sender_online_status', 'chat.time_sent','ReceiverStatus.status as receiver_online_status', DB::raw('COUNT(IF(chat.receiver_status = 1, 1, NULL)) As receiver_status'))->groupBy('receiver_id')->where('receiver_id', auth()->user()->id)->get();
	

}


public function chatusers(Request $request){

	if ($request->ajax()) {

		if ($request->users != '') {

$users = \DB::table('chat')->orderBy('chat_id', 'desc')->join('users_status As SenderStatus', 'SenderStatus.user_id', '=', 'chat.sender_id')->join('users_status As ReceiverStatus', 'ReceiverStatus.user_id', '=', 'chat.receiver_id')->join('users As Sender', 'Sender.id', '=', 'chat.sender_id')->join('users As Receiver', 'Receiver.id', '=', 'chat.receiver_id')->select('Sender.profile_pic as sender_image','Receiver.profile_pic as receiver_image','Sender.name as sender_name','Receiver.name as receiver_name','sender_id','receiver_id' ,'message','SenderStatus.status as sender_online_status', 'chat.time_sent','ReceiverStatus.status as receiver_online_status', 'chat.chat_id', 'receiver_status')->where('Sender.name','LIKE',"%{$request->corpsmember_name}%")->get();			
			
		}else{



$users = \DB::table('chat')->orderBy('chat_id', 'desc')->join('users_status As SenderStatus', 'SenderStatus.user_id', '=', 'chat.sender_id')->join('users_status As ReceiverStatus', 'ReceiverStatus.user_id', '=', 'chat.receiver_id')->join('users As Sender', 'Sender.id', '=', 'chat.sender_id')->join('users As Receiver', 'Receiver.id', '=', 'chat.receiver_id')->select('Sender.profile_pic as sender_image','Receiver.profile_pic as receiver_image','Sender.name as sender_name','Receiver.name as receiver_name','sender_id','receiver_id' ,'message','SenderStatus.status as sender_online_status', 'chat.time_sent','ReceiverStatus.status as receiver_online_status', 'chat.chat_id', 'receiver_status')->groupBy('sender_id')->where('receiver_id', auth()->user()->id)->get();


		}
		
		return response(['users'=> $users, 'current_time' => date('Y-m-d H:i:s')]);
	}
}




public function getchatuserinfo(Request $request){
if ($request->ajax()) {

	//$user = User::join('users_status', 'users_status.user_id', '=', 'users.id')->where('id', $request->u_id)->get();

	UserChat::where('sender_id', $request->u_id)->where('receiver_id', auth()->user()->id)->update(['receiver_status' => 0 ]);
	
	//return response(['user'=>$user, 'current_time'=> date('Y-m-d H:i:s')]);
}
}



public function getourchat(Request $request){
	if ($request->ajax()) {
//->join('users As Sender', 'Sender.id', '=', 'chat.sender_id')
	$user_id = $request->u_id;
	$chats =  \DB::table('chat')->orderBy('chat_id', 'desc')->join('users As Receiver', 'Receiver.id', '=', 'chat.receiver_id')->where(function($query) use ($user_id){
	$query->where('sender_id', auth()->user()->id)->where('receiver_id', $user_id);

})->orWhere(function($query) use ($user_id){
	$query->where('sender_id', $user_id)->where('receiver_id', auth()->user()->id);
})->get();

	
	return response($chats);

		
	}
}



public function submitourchat(Request $request){
	if ($request->ajax()) {

$id = $request->u_id;


$chats =  \DB::table('chat')->where(function($query) use ($id){
	$query->where('sender_id', auth()->user()->id)->where('receiver_id', $id);

})->orWhere(function($query) use ($id){
	$query->where('sender_id', $id)->where('receiver_id', auth()->user()->id);
})->take(1)->get();


	if (count($chats) > 0) {
		foreach ($chats as $chat) {
			$msg = new UserChat;
		$msg->sender_id = auth()->user()->id;
		$msg->receiver_id = $id;
		$msg->message = $request->messages;
		$msg->chat_code = $chat->chat_code;
		$msg->receiver_status = 1;
		$msg->time_sent = date('h:i A');
		$msg->save();

		}
	}else{

		$msg = new UserChat;
		$msg->sender_id = auth()->user()->id;
		$msg->receiver_id = $id;
		$msg->message = $request->messages;
		$msg->chat_code = rand();
		$msg->receiver_status = 1;
		$msg->time_sent = date('h:i A');
		$msg->save();

	}


		

		
	}
}


public function deletemychat(Request $request){
	if ($request->ajax()) {

	$chat = UserChat::find($request->chat_id);
	$chat->delete();
	//return response('okay');
	}
}





}
