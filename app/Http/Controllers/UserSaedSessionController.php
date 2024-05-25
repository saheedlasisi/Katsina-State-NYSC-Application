<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SaedMaster;
use App\SaedSessionMember;
use App\SaedSession;
use DB;
use App\SaedSessionReview;
use App\SaedSessionLecture;
use App\SaedLectureView;
use App\SaedLectureQuestion;
use App\SaedEbook;
use App\SaedEbookView;
use App\SaedSessionChat;


class UserSaedSessionController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }


  public function index(){

  	$title = "SAED";
  	return view('pages.saeds')->with('title', $title);
  }


  public function fetchsession(Request $request){
  	if ($request->ajax()) {


  		if ($request->saed_name != '') {

  			$session = SaedSession::join('saed_masters', 'saed_masters.id', '=', 'saed_session.saed_id')->where('saed_masters.saed_title','LIKE',"%{$request->saed_name}%")->get();
  		}else{

  	$session = SaedSession::join('saed_masters', 'saed_masters.id', '=', 'saed_session.saed_id')->where('session_batch', auth()->user()->batch)->where('session_stream', auth()->user()->stream)->where('session_year', auth()->user()->year)->where('session_status', 'active')->get();		

  		}
  		
  		return response($session);
  	}
  } 



  public function saed($name, $id){

  	$title = $name;

  	$check  = SaedSession::find($id);

  		if ($check->session_batch != auth()->user()->batch AND $check->session_stream != auth()->user()->stream AND $check->session_year != auth()->user()->year) {
  			return redirect('/dashboard')->with('error', 'Restricted Area');
  		}else if ($check->session_status == 'inactive') {
  			return redirect('/dashboard')->with('error', 'Unverified Saed Platform');
  		}else{

  			$ebooks = SaedEbook::where('session_id', $id)->get();
       

  			$members = SaedSessionMember::orderBy('saed_session_member_id', 'desc')->join('users', 'users.id', '=', 'saed_session_member.user_id')->where('session_id', $id)->get();

  	$lecs = SaedSessionLecture::orderBy('saed_session_lecture_id', 'desc')->where('session_id',$id)->get();		

  	$enrolls = SaedSessionMember::where('user_id', auth()->user()->id)->where('session_id', $id)->get();		

$sessions = SaedSession::join('saed_masters', 'saed_masters.id', '=', 'saed_session.saed_id')->where('saed_session_id',$id)->get();

 	return view('pages.saed')->with('title', $title)->with('sessions', $sessions)->with('enrolls', $enrolls)->with('lecs', $lecs)->with('members', $members)->with('ebooks',$ebooks);


  		}
  }




public function saedenroll(Request $request){
	if ($request->ajax()) {

SaedSession::where('saed_session_id',$request->session_id)->update(['member' => DB::raw('member + 1')]);


	$member = new SaedSessionMember;
	$member->saed_id = $request->saed_id;
	$member->session_id = $request->session_id;
	$member->user_id = auth()->user()->id;
	$member->access = 'on';
	$member->save();

	return response('success');
	}
}






public function saedunenroll(Request $request){
	if ($request->ajax()) {

SaedSession::where('saed_session_id',$request->session_id)->update(['member' => DB::raw('member - 1')]);


	SaedSessionMember::where('user_id', auth()->user()->id)->where('session_id', $request->session_id)->delete();
	

	return response('success');
	}
}


public function addsaedreview(Request $request){
	if ($request->ajax()) {
		
		$review = new SaedSessionReview;
		$review->saed_id = $request->saed_id;
		$review->session_id = $request->session_id;
		$review->user_id = auth()->user()->id;
		$review->review_star = $request->saed_review_star;
		$review->review_content = $request->saed_review_content;
		$review->save();
		return response('Added Successfully');
	}
}



public function fetchsaedreview(Request $request){
	if ($request->ajax()) {
		

		$review = DB::table('saed_session_review')->orderBy('saed_session_review_id', 'desc')->join('users', 'users.id', '=', 'saed_session_review.user_id')->select('*', 'saed_session_review.created_at As time_created')->where('session_id', $request->session_id)->get();
		
		return response($review);
	}
}



public function deletesaedreview(Request $request){
if ($request->ajax()) {
	
	$review = SaedSessionReview::find($request->review_id);
	$review->delete();
	return response('Deleted');
}
}


public function bringsaedlecture(Request $request){
	if ($request->ajax()) {


		$check = SaedLectureView::where('saed_lecture_id', $request->lecture_id)->where('user_id', auth()->user()->id)->get();

		if (count($check) > 0) {
		$lec = SaedSessionLecture::find($request->lecture_id);
		return response($lec);

		}else{

			$view = new SaedLectureView;
			$view->saed_lecture_id = $request->lecture_id;
			$view->user_id = auth()->user()->id;
			$view->save();

		SaedSessionLecture::where('saed_session_lecture_id',$request->lecture_id)->update(['view' => DB::raw('view + 1')]);

		$lec = SaedSessionLecture::find($request->lecture_id);
		return response($lec);

		}

	
	}
}




public function addsaedlecturequestion(Request $request){
	if ($request->ajax()) {

		$check = SaedLectureQuestion::where('saed_lecture_id', $request->lecture_id)->where('user_id', auth()->user()->id)->get();

		if (count($check) == 2) {
		return response('only two questions per lecture is allowed.');
		}else{
		
		$ques = new SaedLectureQuestion;
		$ques->saed_lecture_id = $request->lecture_id;
		$ques->user_id = auth()->user()->id;
		$ques->question = $request->saed_lecture_question_content;
		$ques->reply = '';
		$ques->save();

	SaedSessionLecture::where('saed_session_lecture_id',$request->lecture_id)->update(['question' => DB::raw('question + 1')]);
		
		return response('success');
		}


	}
}



public function bringsaedlecturequestion(Request $request){
	if ($request->ajax()) {

		$ques = DB::table('saed_lecture_question')->orderBy('saed_lecture_question_id', 'desc')->join('users', 'users.id', '=', 'saed_lecture_question.user_id')->select('*', 'saed_lecture_question.created_at As time_created','saed_lecture_question.updated_at As time_updated')->where('saed_lecture_id', $request->lecture_id)->get();

		return response(['question' => $ques, 'count_question' =>count($ques)]);
	}
}



public function deletesaedlecturequestion(Request $request){
	if ($request->ajax()) {
		
		$ques = SaedLectureQuestion::find($request->saed_question_id);
		$ques->delete();
		SaedSessionLecture::where('saed_session_lecture_id',$request->lecture_id)->update(['question' => DB::raw('question - 1')]);
		return response('Deleted');
	}
}



public function addebookview(Request $request){
	if ($request->ajax()) {

		$check = SaedEbookView::where('user_id', auth()->user()->id)->where('ebook_id', $request->ebook_id)->get();

		if (count($check) > 0) {
			
		}else{
	$view = new SaedEbookView;
	$view->ebook_id = $request->ebook_id;
	$view->user_id = auth()->user()->id;
	$view->save();

SaedEbook::where('saed_ebook_id',$request->ebook_id)->update(['view' => DB::raw('view + 1')]);
		}

		


		
		
	}
}




public function sendsessionchat(Request $request){
	if ($request->ajax()) {

		$session = SaedSession::find($request->session_id);
		$member = SaedSessionMember::find($request->member_id);

		if ($session->lock_session == 1) {
			return response('Group Locked By SaedMaster');
		}else if($member->access == 'off'){

	return response('You have no access to this group');
		}else{

			    $chat = new SaedSessionChat;
        $chat->saed_id = $request->saed_id;
        $chat->session_id = $request->session_id;
        $chat->user_id = auth()->user()->id;
        $chat->user_type = 'corper';
        $chat->message = $request->session_message;
        $chat->time_sent = date('h:i A');
        $chat->saed_notify = 1;
        $chat->save();

        	return response('success');
		}
		
		
	}
}



public function fetchsessionchat(Request $request){

	if ($request->ajax()) {
		
		$chat = SaedSessionChat::orderBy('time_sent', 'desc')->join('users', 'users.id', '=', 'saed_session_chat.user_id')->where('session_id', $request->session_id)->get();
        
        return response($chat);
	}
}



public function deletesessionchat(Request $request){
	if ($request->ajax()) {
		
		$chat = SaedSessionChat::find($request->chat_id);
		$chat->delete();
		
	}
}






}
