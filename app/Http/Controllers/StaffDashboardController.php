<?php

namespace App\Http\Controllers;

use DB;
use App\Staff;
use Mail;
use App\HelpDeskMessage;
use App\HelpDeskTicket;
use App\Mail\TicketResponse;
use Illuminate\Http\Request;

class StaffDashboardController extends Controller
{
     public function __construct()
    {
        $this->middleware('staff');
    }


    public function index(){

$staff_id = auth()->guard('staff')->user()->id;
    	$title = "Dashboard |".auth()->guard('staff')->user()->name;

    	//Fetcting incoming tickets

   $incomings = HelpDeskTicket::orderBy('h_d_id', 'desc')->where('staff_email', '')->get();
   $active_ticket = HelpDeskTicket::where('staff_id', $staff_id)->where('ticket_status', 'active')->get();
   $closed_ticket = HelpDeskTicket::where('staff_id', $staff_id)->where('ticket_status', 'closed')->get();	
   // Getting Tickets

  $tickets = DB::table('help_desk_ticket')->join('help_desk_message', 'help_desk_message.message_ticket', '=', 'help_desk_ticket.ticket_id')->select('ticket_id', 'help_desk_ticket.name', 'ticket_status','subject', DB::raw('count(IF(staff_notify = "1", 1, NULL)) As staff_notify'))->where('staff_id', $staff_id)->orderBy(\DB::raw('count(IF(staff_notify = "1", 1, NULL))'),'desc')->groupBy('ticket_id', 'help_desk_ticket.name', 'ticket_status','h_d_id','subject')->get();	

    return view('StaffPages.index')->with('title', $title)->with('incomings', $incomings)->with('tickets', $tickets)->with('active_ticket', $active_ticket)->with('closed_ticket', $closed_ticket);
    }


    //Entering Helpdesk Chat

    public function StartHelpDeskChat(Request $request){

    	if ($request->ajax()) {

    		$ticket_id = $request->start_ticket_id;
    		$row_id = $request->start_row_id;
    		$staff_email = auth()->guard('staff')->user()->email;
    		$staff_name = auth()->guard('staff')->user()->name;
    		$staff_id = auth()->guard('staff')->user()->id;

    		$desk = HelpDeskTicket::find($row_id);

    		if ($desk->staff_email == '') {

    			$desk->staff_email = $staff_email;
    			$desk->staff_name = $staff_name;
    			$desk->staff_id = $staff_id;
    			$desk->save();

    			return response('success');
    			
    			
    		}else {

    			return response('Ticket picked by another staff, kindly go for another ticket you can handle.');

    		}
    		
    		
    	}


    }


     //showing Helpdesk Chat

    public function ShowHelpDeskChat($id){

   	$title = 'Ticket ID: '.$id;
   		$staff_email = auth()->guard('staff')->user()->email;
    		$staff_name = auth()->guard('staff')->user()->name;
    		$staff_id = auth()->guard('staff')->user()->id;

    $tickets = HelpDeskTicket::where('ticket_id', $id)->where('staff_id', $staff_id)->get();

    if (count($tickets) > 0) {

    	return view('StaffPages.helpdeskchat')->with('title', $title)->with('tickets', $tickets);
    	
    }else{


    	return redirect(route('staff.dashboard'))->with('error', 'Opps!, You were redirect because the ticket has been taken by another staff. Note, only admin can view all tickets');
    }




    }


    //Getting Chat

public function LoadHelpDeskChat(Request $request){


	if ($request->ajax()) {
		
	$msgs = HelpDeskMessage::orderBy('h_d_m_id', 'desc')->where('message_ticket', $request->get_ticket_id)->get();	

	
		//$msgs = DB::table('help_desk_message')->select('*')->where('message_ticket', $request->get_ticket_id)->get();

		return response($msgs);

		//return view('MainAjax.chats')->with('msgs', $msgs);
	}


}




//Sending another new message base on booked ticket

public function ReplyTicket(Request $request){


	if ($request->ajax()) {

		$ticket = $request->msg_ticket_id;
		
		$message = $request->msg;
		$id = $request->row_id;
		$staff_email = auth()->guard('staff')->user()->email;
    	$staff_name = auth()->guard('staff')->user()->name;


$check = HelpDeskTicket::find($id);
$name = $check->name;
$email = $check->email;
$subject = $check->subject;

if ($check->ticket_status == 'active') {


		$helpmessage = new HelpDeskMessage;
	$helpmessage->message_ticket = $ticket;
	$helpmessage->message = $message;
	$helpmessage->sender_email = $staff_email;
	$helpmessage->sender_name = $staff_name;
	$helpmessage->sender_type = 'staff';
	$helpmessage->msg_time = date('h:i A');
	$helpmessage->user_notify = 1;
	$helpmessage->staff_notify = 0;
	$helpmessage->save(); 

HelpDeskMessage::where('message_ticket',$ticket)->update(['staff_notify' => 0]);
	
Mail::to($email, $name)->send(new TicketResponse( $name, $subject, $message, $ticket));	

return response('Message sent successfully, User will be notified by email.');
	
}else{
	

	return response('User closed this ticket already.');

}





	}

}





public function profilesettings(){

    $title = "Profile Settings";

    return view('StaffPages.profilesettings')->with('title', $title);
}





public function updateprofile(Request $request){

    if ($request->ajax()) {

        $staff = Staff::find(auth()->guard('staff')->user()->id);

        $staff->name = $request->edit_name;

        $staff->email = $request->edit_email;

        $staff->phone_number =$request->edit_phone_number;
        $staff->save();
       
       return response('Updated successfully');
    }
}




public function updatepassword(Request $request){

    if ($request->ajax()) {

         $staff = Staff::find(auth()->guard('staff')->user()->id);
         $staff->password = bcrypt($request->edit_password);
         $staff->save();
      
      return response('Password Change successfully');
    }
}


public function updateprofilepicture(Request $request){

if ($request->ajax()) {
    

        if (auth()->guard('staff')->user()->profile_picture == 'noimage.jpg') {
            
            $image_data = $request->image;
        $image_array_1 = explode(";", $image_data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $image_name = 'profilepic'.date('YDM').''.time().'.png';
        $upload_path = 'assets/img/staffimage/'.$image_name;
        file_put_contents($upload_path, $data);

 $staff = Staff::find(auth()->guard('staff')->user()->id);
        $staff->profile_picture = $image_name;
        $staff->save();
        
        return response()->json('Uploaded Successfully');

        }else{

 File::delete('assets/img/staffimage/'.auth()->guard('staff')->user()->profile_picture);

            $image_data = $request->image;
        $image_array_1 = explode(";", $image_data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $image_name = 'profilepic'.date('MYD').''.time().'.png';
        $upload_path = 'assets/img/staffimage/'.$image_name;
        file_put_contents($upload_path, $data);


        $staff = Staff::find(auth()->guard('staff')->user()->id);
        $staff->profile_picture = $image_name;
        $staff->save();
        
        return response()->json('Uploaded Successfully');

        }


        
    }
} 

    



}
