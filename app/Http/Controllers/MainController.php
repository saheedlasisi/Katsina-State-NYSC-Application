<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\HelpDeskMessage;
use App\HelpDeskTicket;
use Mail;
use App\Mail\HelpDeskTicketReply;
use App\Staff;
use App\States;
use App\Admin;
use App\Mail\ObsRegistrationMail;
use App\Blog;
use App\Obs;
use App\Category;
use App\BlogComment;
use App\LectureQuestion;
use App\UserShop;
use App\Mail\ShopCreatedMail;
use Twilio\Rest\Client;
use App\Mail\ReplyMessageShopMail;
use App\Mail\OrderPlaceMail;
use App\Mail\OrderPlacedMail;
use App\Year;
use App\CdsProject;
use App\CdsSlidePhoto;
use App\Slide;
use App\Mail\MailMe;
use App\Mail\ReplyMailMe;
use App\Mail\UserWelcomeMail;


//use App\Mail\TicketResponse;

class MainController extends Controller
{
    
//Home Page
    public function index(){


   $firsts = Slide::orderBy('slide_id', 'asc')->take(1)->get(); 
   $slides = Slide::orderBy('slide_id', 'asc')->get();	

$blogs = Blog::orderBy('b_id', 'desc')->join('obs', 'obs.id', '=', 'blog.b_obs_id')->join('category', 'category.c_id', '=', 'blog.b_c_id')->where('user_blog_status', 'active')->where('admin_blog_status', 'active')->take(4)->get();
    	$title = "Home";

   return view('MainPages.index')->with('title', $title)->with('blogs', $blogs)->with('firsts', $firsts)->with('slides', $slides);
    }



//HelpDesk Page
    public function HelpDesk(){

   $title = "Help Desk";

   return view('MainPages.helpdesk')->with('title', $title);

    }


  //Deliver Ticket
  
  public function DeliverTicket(Request $request){

  	$this->validate($request, [
         'name' => 'required',
         'subject' => 'required',
         'email' => 'required',
         'message' => 'required',

         ]);



  	$text = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.strtolower('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
    $text_shuff = str_shuffle($text);
	$half = substr($text_shuff, 7, 4);

	$num = '1234567890';
    $num_shuff = str_shuffle($num);
	$num_half = substr($num_shuff, 7, 4);

	$date = date('hi');

	$ticket = $half.'-'.$num_half.'-'.$date;



	$heplticket = new HelpDeskTicket;
	$heplticket->ticket_id = $ticket;
	$heplticket->name = $request->input('name');
	$heplticket->email = $request->input('email');
	$heplticket->subject = $request->input('subject');
	$heplticket->ticket_status = 'active';
	$heplticket->staff_name = '';
	$heplticket->staff_email ='';
	$heplticket->staff_id ='';
	$heplticket->save();


	$helpmessage = new HelpDeskMessage;
	$helpmessage->message_ticket = $ticket;
	$helpmessage->message = $request->input('message');
	$helpmessage->sender_email = $request->input('email');
	$helpmessage->sender_name = $request->input('name');
	$helpmessage->sender_type = 'user';
	$helpmessage->msg_time = date('h:i A');
	$helpmessage->user_notify = 0;
	$helpmessage->staff_notify = 1;
	$helpmessage->save(); 
	
	// Mail::to($request->input('email'), $request->input('name'))->send(new TicketResponse( $request->input('name'), $request->input('subject'),  $request->input('message'), $ticket));
	Mail::to($request->input('email'), $request->input('name'))->send(new HelpDeskTicketReply( $request->input('name'), $request->input('subject'), $request->input('message'), $ticket ));	 


return redirect('/helpdesk')->with('success', 'Message sent successfully, your tiket id is '.$ticket.' You will be notified when a response is made by email.');

  }


//Tracking Ticket
public function TrackTicket(Request $request){

	if ($request->ajax()) {
		

	$check = HelpDeskTicket::where('ticket_id', $request->track_ticket_id)->get();	

	if (count($check) > 0) {

		return response('success');
	}else{

		return response('Sorry, no record found fot the ticket ID provided, please check and try again.');
}

	}

}




//Show Ticket, With Chat and info
public function ShowTicket($id){
	$title = 'Show Ticket '.$id;
	$ticket_id = $id;

	$chats = HelpDeskTicket::where('ticket_id', $id)->get();

	if (count($chats) > 0) {
	$staff_image = HelpDeskTicket::join('staff', 'staff.id', '=', 'help_desk_ticket.staff_id')->where('ticket_id', $id)->get();

		return view('MainPages.ticketchat')->with('title', $title)->with('ticket_id', $ticket_id)->with('chats', $chats)->with('staff_image', $staff_image);
		
	}else{

		return redirect('/');
	}
	


}


//Getting Chat

public function GetChats(Request $request){


	if ($request->ajax()) {
		
	$msgs = HelpDeskMessage::orderBy('h_d_m_id', 'desc')->where('message_ticket', $request->get_ticket_id)->get();	

	
		//$msgs = DB::table('help_desk_message')->select('*')->where('message_ticket', $request->get_ticket_id)->get();

		return response($msgs);

		//return view('MainAjax.chats')->with('msgs', $msgs);
	}


}



//Sending another new message base on booked ticket

public function SendHelp(Request $request){


	if ($request->ajax()) {
		

		$ticket = $request->msg_ticket_id;
		$name = $request->user_name;
		$message = $request->msg;
		$subject =$request->user_subject;
		$email = $request->user_email;
		$id = $request->row_id;


$check = HelpDeskTicket::find($id);

if ($check->ticket_status == 'active') {


	$helpmessage = new HelpDeskMessage;
	$helpmessage->message_ticket = $ticket;
	$helpmessage->message = $message;
	$helpmessage->sender_email = $email;
	$helpmessage->sender_name = $name;
	$helpmessage->sender_type = 'user';
	$helpmessage->msg_time = date('h:i A');
	$helpmessage->user_notify = 0;
	$helpmessage->staff_notify = 1;
	$helpmessage->save(); 
	
  HelpDeskMessage::where('message_ticket',$ticket)->update(['user_notify' => 0]);
//Mail::to($email, $name)->send(new HelpDeskTicketReply( $name, $subject, $message, $ticket));	

return response('Message sent successfully, You will be notified when a response is made by email.');
	
}else{

	return response('You already close this ticket, no point sending message through it....Make a new ticket.');

}





	}

}



//Closing of a Ticket

public function CloseTicket(Request $request){


	if ($request->ajax()) {
	

	$close = HelpDeskTicket::find($request->close_row_id);
	$close->ticket_status = 'closed';
	$close->save();

	return response('Ticket Closed, If there is anything we could help you with again make sure you submit a ticket straight away.');


	}

}



public function GetStates(Request $request){


	if ($request->ajax()) {
		
		$states = States::all();
		return response($states);
	}


}


public function getYear(Request $request){

if ($request->ajax()) {
		
		$years = Year::orderBy('year', 'asc')->get();
		return response($years);
	}


}


public function GetAdminDetails(Request $request){


	if ($request->ajax()) {
		
		$admin = Admin::find(1);
		return response($admin);
	}


}




public function BlogList(){

	$title = "Blog";
$blog_sides = Blog::orderBy('b_id', 'desc')->take(7)->get();

	$blogs = Blog::orderBy('b_id', 'desc')->join('obs', 'obs.id', '=', 'blog.b_obs_id')->join('category', 'category.c_id', '=', 'blog.b_c_id')->where('user_blog_status', 'active')->where('admin_blog_status', 'active')->paginate();

	return view('MainPages.bloglist')->with('title', $title)->with('blogs', $blogs)->with('blog_sides', $blog_sides);
}



public function Blog($blog_title){


	$title = $blog_title;
$blog_sides = Blog::orderBy('b_id', 'desc')->where('b_title', '!=', $blog_title)->take(7)->get();
$blogs = Blog::join('obs', 'obs.id', '=', 'blog.b_obs_id')->join('category', 'category.c_id', '=', 'blog.b_c_id')->where('b_title', $blog_title)->where('user_blog_status', 'active')->where('admin_blog_status', 'active')->get();

	return view('MainPages.blog')->with('title', $title)->with('blogs', $blogs)->with('blog_sides', $blog_sides);
}



public function QuestComment(Request $request){

	if ($request->ajax()) {

		$comment = new BlogComment;
		$comment->c_b_id = $request->guest_blog_id;
		$comment->c_b_title = $request->guest_blog_title;
		$comment->c_name = $request->guest_comment_name;
		$comment->c_email = $request->guest_comment_email;
		$comment->c_comment = $request->guest_comment;
		$comment->c_image = 'noimage.jpg';
		$comment->c_type = 'guest';
		$comment->save();

		 Blog::where('b_id',$request->guest_blog_id)->update(['b_comment' => DB::raw('b_comment + 1')]);
		

		return response('success');
	}

}



public function GetComment(Request $request){

	if ($request->ajax()) {

	$comment = BlogComment::orderBy('blog_comment_id', 'desc')->where('c_b_id', $request->get_blog_id)->get();
		
		return response($comment);
	}


}



public function CountComment(Request $request){

	if ($request->ajax()) {

	$comment = BlogComment::orderBy('blog_comment_id', 'desc')->where('c_b_id', $request->count_blog_id)->get();
		
		return response(count($comment));
	}


}



public function usercomment(Request $request){

    if ($request->ajax()) {

        $comment = new BlogComment;
        $comment->c_b_id = $request->user_blog_id;
        $comment->c_b_title = $request->user_blog_title;
        $comment->c_name = $request->user_comment_name;
        $comment->c_email = $request->user_comment_email;
        $comment->c_comment = $request->user_comment;
        $comment->c_image = $request->user_comment_image;
        $comment->c_type = 'user';
        $comment->save();

         Blog::where('b_id',$request->user_blog_id)->update(['b_comment' => DB::raw('b_comment + 1')]);

        return response('success');
      
    }

}






public function Test(){


// $like = 30;
// $view = 5;

// $total = $like + $view;

// $rate = $total / 5;


// if ($rate > 0 && $rate < 1) {

// 	echo ' going to one';
// 	}elseif ($rate == 1) {
// 		echo ' one';
// 	}elseif ($rate > 1 && $rate < 2) {
// 		echo ' going to two';
// 	}elseif ($rate == 2 ) {
// 		echo ' two';
// 	}elseif ($rate > 2 && $rate < 3) {
// 		echo ' going to three';
// 	}elseif ($rate == 3) {
// 		echo ' three';
// 	}elseif ($rate > 3 && $rate < 4) {
// 		echo ' going to four';
// 	}elseif ($rate == 4) {
// 		echo ' four';
// 	}elseif ($rate > 4 && $rate < 5) {
// 		echo ' going to three';
// 	}elseif ($rate >= 5) {
// 		echo 'five';
// 	}else{


// 	}	

	Mail::to(auth()->user()->email, auth()->user()->name)->send(new UserWelcomeMail( auth()->user()->name ) ); 


	  // $sid    = env( 'TWILIO_SID' );
   //     $token  = env( 'TWILIO_TOKEN' );
   //     $client = new Client( $sid, $token );

    //    $number = "+2349012291199";

    // $client->messages->create(
    //                $number,
    //                [
    //                    'from' => env( 'TWILIO_FROM' ),
    //                    'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    //                ]
    //            );

       // $client->verify->v2->services("0805")
       //                             ->verifications
       //                             ->create("+2348158337308", "sms");



// Mail::to('lasisisaheed5@gmail.com', 'Saheeed')->send(new ReplyMessageShopMail('global', 'jyu-dks','love','saheed', 'Testing'));


	// $o = 7000;
	// $n = 2000;
	// $dv =  $o - $n;
	// echo round(($dv / $o) * 100);

	echo '25-09-2020' - date('d-m-Y');
}


public function OpenTicket(){

	$title = "Open Ticket";

	return view('MainPages.openticket')->with('title', $title);

}


public function transportation(){

	$title = "Transportation";

	return view('MainPages.transportation')->with('title', $title);
}



  public function ckeditorupload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move('assets/img/ckimage', $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('assets/img/ckimage/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }



    public function CdsList(){

    	$title = "CDs Project";

    	$cds_sides = CdsProject::orderBy('cds_project_id', 'desc')->take(7)->get();

    	$cds = CdsProject::join('users', 'users.id', '=', 'cds_project.user_id')->paginate(12);

    	return view('MainPages.cdsproject')->with('title', $title)->with('cds', $cds)->with('cds_sides', $cds_sides);
    }



    public function Cds($name, $id){

    	$title = $name;
CdsProject::where('cds_project_id',$id)->update(['view' => DB::raw('view + 1')]);
	
    	$cds_sides = CdsProject::orderBy('cds_project_id', 'desc')->where('cds_project_id', '!=', $id)->take(7)->get();

    	$cds = CdsProject::join('users', 'users.id', '=', 'cds_project.user_id')->where('cds_project_id', $id)->get();

    $firsts = CdsSlidePhoto::orderBy('cds_slide_photo_id', 'desc')->where('cds_id', $id)->take(1)->get();
    $photos = CdsSlidePhoto::orderBy('cds_slide_photo_id', 'desc')->where('cds_id', $id)->get();


    	return view('MainPages.cds')->with('title', $title)->with('cds', $cds)->with('cds_sides', $cds_sides)->with('firsts', $firsts)->with('photos', $photos);
    }



    public function ContactMe(Request $request){

    	if ($request->ajax()) {


Mail::to('lasisisaheed5@gmail.com', 'Lasisi Saheed')->send(new MailMe( $request->sender_name, $request->sender_email, $request->sender_subject, $request->sender_message ));

Mail::to($request->sender_email, $request->sender_name)->send(new ReplyMailMe( $request->sender_name));



    	return response('Message Sent successfully.');
    	}
    }



 public function SearchBlog(Request $request){

 	if ($request->ajax()) {
 		
 		if ($request->search_blog != '') {
 			
 	$blog = Blog::orderBy('b_id')->where('b_title','LIKE',"%{$request->search_blog}%")->get();		

 		}else{

$blog = Blog::orderBy('b_id')->where('b_title','')->get();
 		}

 		return response($blog);
 	}

 } 





  public function SearchCds(Request $request){

 	if ($request->ajax()) {
 		
 		if ($request->search_cds != '') {
 			
 	$cds = CdsProject::orderBy('cds_project_id')->where('project_topic','LIKE',"%{$request->search_cds}%")->get();		

 		}else{

$cds = CdsProject::orderBy('cds_project_id')->where('project_topic','')->get();
 		}

 		return response($cds);
 	}

 }





 public function About(){

 	$title = "About";


 	return view('MainPages.about')->with('title', $title);		

 } 















}
