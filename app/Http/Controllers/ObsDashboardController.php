<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\States;
use App\LGA;
use App\SaedMaster;
use Mail;
use DB;
use App\Mail\SaedRegisterMail;
use App\Obs;
use App\User;

class ObsDashboardController extends Controller
{
      public function __construct()
    {
        $this->middleware('obs');
    }


    public function index(){

    $title = 'Dashboard';
$useryears = User::orderBy('year', 'asc')->groupBy('year')->get();
    return view('ObsPages.index')->with('title', $title)->with('useryears', $useryears);
    }


    public function registersaedmaster(){
    	$title = "Saed Master Registration";

     $saeds = SaedMaster::orderBy('id', 'desc')->where('register_user_type', 'obs')->get();
        $states = States::all();
        $lgas = LGA::all();

    return view('ObsPages.registersaedmaster')->with('title', $title)->with('states', $states)->with('lgas', $lgas)->with('saeds', $saeds);


    
    }


    public function storesaedmaster(Request $request){
        if ($request->ajax()) {

       $getall = SaedMaster::all();
       $count = count($getall) + 1;
       $saed_id = 'SAED_'.rand().'_'.$count;

       $chechemail = SaedMaster::where('email', $request->saed_email)->get(); 

       if (count($chechemail) > 0) {
              return response('Email has been taken.');
           }else{


            $saed = new SaedMaster;
            $saed->saed_id = $saed_id;
            $saed->name = $request->saed_name;
            $saed->email = $request->saed_email;
            $saed->saed_title = '';
            $saed->image = 'noimage.jpg';
            $saed->phone_number = '';
            $saed->state_of_origin = $request->saed_origin;
            $saed->lga = $request->saed_lga;
            $saed->about = '';
            $saed->address = '';
            $saed->register_by = auth()->guard('obs')->user()->name;
            $saed->register_user_type = 'obs';
            $saed->password = bcrypt($saed_id);
            $saed->save();

            Mail::to($request->saed_email, $request->saed_name)->send(new SaedRegisterMail( $request->saed_email, $request->saed_name, $saed_id ) );  

            return response('Register Successfully.');
           }    


      
        }
    }



    public function deletesaedmaster(Request $request){
      if ($request->ajax()) {

        $saed = SaedMaster::find($request->saed_id);
        $saed->delete();
        return response('Deleted');
      }
    }




public function profilesetting(){

  $title = "Profile Setting";

  return view('ObsPages.profilesetting')->with('title', $title);
}


public function updateprofile(Request $request){
  if ($request->ajax()) {

    $obs = Obs::find(auth()->guard('obs')->user()->id);
    $obs->name = $request->edit_name;
    $obs->email = $request->edit_email;
    $obs->save();

   return response('Updated Successfully');
  }
}


public function changeimage(Request $request){
if ($request->ajax()) {

    if (auth()->guard('obs')->user()->image == 'noimage.jpg') {
      
      $image_data = $request->image;
    $image_array_1 = explode(";", $image_data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);
    $image_name = 'profilepic'.auth()->guard('obs')->user()->name.''.time().'.png';
    $upload_path = 'assets/img/obsimage/'.$image_name;
    file_put_contents($upload_path, $data);


     $obs = Obs::find(auth()->guard('obs')->user()->id);
    $obs->image = $image_name;
    $obs->save();
    
    return response()->json('Uploaded Successfully');

    }else{

 File::delete('assets/img/obsimage/'.auth()->guard('obs')->user()->image);

         $image_data = $request->image;
    $image_array_1 = explode(";", $image_data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($image_array_2[1]);
    $image_name = 'profilepic'.auth()->guard('obs')->user()->name.''.time().'.png';
    $upload_path = 'assets/img/obsimage/'.$image_name;
    file_put_contents($upload_path, $data);

  $obs = Obs::find(auth()->guard('obs')->user()->id);
    $obs->image = $image_name;
    $obs->save();
    
    return response()->json('Uploaded Successfully');

    }

 


}
}


  public function updatepassword(Request $request){
    if ($request->ajax()) {

      $obs = Obs::find(auth()->guard('obs')->user()->id);
      $obs->password = bcrypt($request->edit_password);
      $obs->save();
      return response('Password Changed Successfully');
    }
  }


 // public function ckeditorupload(Request $request)
 //    {
 //        if($request->hasFile('upload')) {
 //            $originName = $request->file('upload')->getClientOriginalName();
 //            $fileName = pathinfo($originName, PATHINFO_FILENAME);
 //            $extension = $request->file('upload')->getClientOriginalExtension();
 //            $fileName = $fileName.'_'.time().'.'.$extension;
        
 //            $request->file('upload')->move('assets/img/ckimage', $fileName);
   
 //            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
 //            $url = asset('assets/img/ckimage/'.$fileName); 
 //            $msg = 'Image uploaded successfully'; 
 //            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
 //            @header('Content-type: text/html; charset=utf-8'); 
 //            echo $response;
 //        }
 //    }





}
