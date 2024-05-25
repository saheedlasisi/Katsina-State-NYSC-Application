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



class SaedSessionController extends Controller
{
     public function __construct()
    {
        $this->middleware('saedmaster');
    }



    public function index(){

    	$title = "Session";

        $sessions = SaedSession::orderBy('saed_session_id', 'desc')->where('saed_id',auth()->guard('saedmaster')->user()->id)->get();

    	$useryears = User::orderBy('year', 'asc')->groupBy('year')->get();

   return view('SaedMasterPages.session')->with('title', $title)->with('useryears', $useryears)->with('sessions', $sessions);

    }



    public function getAdminSession(Request $request){
    	if ($request->ajax()) {
    		
    		$admin  = Admin::find(1);
    		
    		return response($admin);
    	}
    }



       public function sessionupload(Request $request){
        if ($request->ajax()) {

        $session_id = 'SESSION_'.rand(); 

        $check = SaedSession::where('saed_id', auth()->guard('saedmaster')->user()->id)->where('session_batch', $request->session_batch)->where('session_stream', $request->session_stream)->where('session_year',$request->session_year)->get();

        if (count($check) > 0) {
                return response('Existing');
           }else{

        $session = new SaedSession;
        $session->session_id = $session_id;
        $session->saed_id = auth()->guard('saedmaster')->user()->id;
        $session->session_batch = $request->session_batch;
        $session->session_stream = $request->session_stream;
        $session->session_year = $request->session_year;
        $session->member = 0;
        $session->session_status = 'inactive';
        $session->activator_name = '';
        $session->activator_type = '';
        $session->amount_paid = '';
        $session->lock_session = 0;
        $session->save();
        
        return response('Uploaded Successfully');

           }   
        
       
        }
    }





 public function deletesession(Request $request){
        if ($request->ajax()) {
            
           $session = SaedSession::find($request->session_id); 
           $session->delete();

            
            return response('Deleted');
        }
    }


public function saedsession($name, $id){

    $title = $name;

    $session = SaedSession::find($id);

    if ($session->saed_id != auth()->guard('saedmaster')->user()->id) {
      return redirect(route('saedmaster.dashboard'))->with('error', 'restricted Area');
    }else{

        $group = SaedSessionGroup::where('session_id', $id)->get();

$ebooks = SaedEbook::where('session_id', $id)->get();
$chat_notifies = SaedSessionChat::where('session_id', $id)->where('saed_notify', 1)->get();
        $lecs = SaedSessionLecture::orderBy('saed_session_lecture_id', 'desc')->where('session_id',$id)->get();
$members = SaedSessionMember::orderBy('saed_session_member_id', 'desc')->join('users', 'users.id', '=', 'saed_session_member.user_id')->where('session_id', $id)->get();
return view('SaedMasterPages.saedsession')->with('title', $title)->with('session', $session)->with('lecs', $lecs)->with('members', $members)->with('ebooks', $ebooks)->with('group',$group)->with('chat_notifies', $chat_notifies);

    }

    
}



public function fetchsaedsessionreview(Request $request){
if ($request->ajax()) {
    
        $review = DB::table('saed_session_review')->orderBy('saed_session_review_id', 'desc')->join('users', 'users.id', '=', 'saed_session_review.user_id')->select('*', 'saed_session_review.created_at As time_created')->where('session_id', $request->session_id)->get();


        
        return response(['review'=> $review, 'count_review'=> count($review)]);
}
}



public function addsaedlecture(Request $request){
if ($request->ajax()) {

    $lec = new SaedSessionLecture;
    $lec->saed_id = auth()->guard('saedmaster')->user()->id;
    $lec->session_id = $request->session_id;
    $lec->lecture_title = $request->saed_lecture_title;
    $lec->lecture_content = $request->saed_lecture_content;
    $lec->view = 0;
    $lec->question = 0;
    $lec->save();
   
   return response('Uploaded Successfully');
}

}


public function updatesaedlecture(Request $request){
if ($request->ajax()) {

    $lec = SaedSessionLecture::find($request->edit_saed_lecture_id);
    $lec->lecture_title = $request->edit_saed_lecture_title;
    $lec->lecture_content = $request->edit_saed_lecture_content;
    $lec->save();
    
    return response('Updated Successfully');
}
}


public function deletesaedlecture(Request $request){
    if ($request->ajax()) {
      $lec = SaedSessionLecture::find($request->lecture_id);
      $lec->delete();
      return response('Deleted');
    }
}



public function bringsaedlecturequestion(Request $request){
    if ($request->ajax()) {

        $ques = DB::table('saed_lecture_question')->orderBy('saed_lecture_question_id', 'desc')->join('users', 'users.id', '=', 'saed_lecture_question.user_id')->select('*', 'saed_lecture_question.created_at As time_created','saed_lecture_question.updated_at As time_updated')->where('saed_lecture_id', $request->lecture_id)->get();

        return response(['question' => $ques, 'count_question' =>count($ques)]);
    }
}




public function replysaedlecturequestion(Request $request){
    if ($request->ajax()) {

$ques = SaedLectureQuestion::find($request->saed_lecture_reply_id);
$ques->reply = $request->saed_lecture_reply_content;
  $ques->save();      

return response('Replied');
    }
}




public function uploadebook(Request $request){
    if ($request->ajax()) {
       
        $book = $request->file('ebook');
        $ext = $book->getClientOriginalExtension();

        if ($ext != 'pdf') {
        
        return response()->json(['message' => 'Sorry book must be pdf format', 'class_name' => 'alert-danger']);
        }else{

        $new_name = date('YmD').'Session'.date('YmD').'book'.rand().'.'.$ext;
        $book->move('assets/book/saedebook', $new_name);

        $ebook = new SaedEbook;
        $ebook->saed_id = auth()->guard('saedmaster')->user()->id;
        $ebook->session_id = $request->session_ebook_id;
        $ebook->ebook_title =  $request->ebook_title;
        $ebook->ebook = $new_name;
        $ebook->view = 0;
        $ebook->save();



        return response()->json(['message' => 'Book Uploaded Successfully', 'class_name' => 'alert-success']);

        }

    }
}



public function deletebook(Request $request){
    if ($request->ajax()) {
        
        $book = SaedEbook::find($request->ebook_id);
         File::delete('assets/book/saedebook/'.$book->ebook);
        $book->delete();
        return response('Deleted');
    }
}





public function denyuseraccess(Request $request){
    if ($request->ajax()) {
        $member = SaedSessionMember::find($request->member_id);
        $member->access = 'off';
        $member->save();
        return response('Access Denied Successfully');
    }
}



public function grantuseraccess(Request $request){
    if ($request->ajax()) {
        $member = SaedSessionMember::find($request->member_id);
        $member->access = 'on';
        $member->save();
        return response('Access Granted Successfully');
    }
}


public function submitsessionchat(Request $request){

    if ($request->ajax()) {

        $chat = new SaedSessionChat;
        $chat->saed_id = auth()->guard('saedmaster')->user()->id;
        $chat->session_id = $request->session_id;
        $chat->user_id = auth()->guard('saedmaster')->user()->id;
        $chat->user_type = 'saedmaster';
        $chat->message = $request->session_message;
        $chat->time_sent = date('h:i A');
        $chat->saed_notify = 0;
        $chat->save();
      // return response('okay');
    }
}



public function loadsessionchat(Request $request){
    if ($request->ajax()) {

        $chat = SaedSessionChat::orderBy('time_sent', 'desc')->join('users', 'users.id', '=', 'saed_session_chat.user_id')->where('session_id', $request->session_id)->get();
        
        return response($chat);
    }
}



public function deletemysessionmsg(Request $request){

    if ($request->ajax()) {

        $chat = SaedSessionChat::find($request->chat_id);
        $chat->delete();
       
    }
}




public function locksessiongroup(Request $request){
    if ($request->ajax()) {

        $group = new SaedSessionGroup;
        $group->saed_id = auth()->guard('saedmaster')->user()->id;
        $group->session_id = $request->session_id;
        $group->save();

        $ses = SaedSession::find($request->session_id);
        $ses->lock_session = 1;
        $ses->save();
        
        return response('Locked');
    }
}




public function unlocksessiongroup(Request $request){
    if ($request->ajax()) {

   $ses = SaedSession::find($request->session_id);
        $ses->lock_session = 0;
        $ses->save();

       SaedSessionGroup::where('session_id', $request->session_id)->delete();
        return response('Unlock');
    }
}


public function clearsessionchat(Request $request){

    if ($request->ajax()) {

    SaedSessionChat::where('session_id', $request->session_id)->update(['saed_notify' => 0]);
       
       
    }
}








}
