<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecture;
use DB;
use App\User;
use App\Obs;
use App\LectureQuestion;


class ObsLectureController extends Controller
{
      public function __construct()
    {
        $this->middleware('obs');
    }


    public function index(){

    	$title = "Lectures";
        $useryears = User::orderBy('year', 'asc')->groupBy('year')->get();

    	return view('ObsPages.lecture')->with('title', $title)->with('useryears', $useryears);
    }


      public function create(){

    	$title = "Add Lecture";
            $useryears = User::orderBy('year', 'asc')->groupBy('year')->get();

    	return view('ObsPages.addlecture')->with('title', $title)->with('useryears', $useryears);
    }


     public function store(Request $request){
     	if ($request->ajax()) {
     		
     		$lec = new Lecture;
            $lec->obs_id = auth()->guard('obs')->user()->id;
            $lec->l_topic = $request->lecture_topic;
     		$lec->l_content = $request->lecture_content;
     		$lec->lecturer_name = $request->lecturer_name;
     		$lec->l_batch = $request->info_batch;
     		$lec->l_stream = $request->info_stream;
     		$lec->l_year = $request->info_year;
            $lec->l_question = 0;
            $lec->l_view = 0;
     		$lec->obs_lecture_status = 'active';
     		$lec->admin_lecture_status = 'active';
     		$lec->save();
     		
     		
     		return response('Lecture inserted successfully');
     	}
    	
    }


public function fetch(Request $request){
    if ($request->ajax()) {
       
       $lecture = Lecture::orderBy('l_id', 'desc')->get();
       return response($lecture);

    }

}



public function show($id){

$title = "Lecture";
    $useryears = User::orderBy('year', 'asc')->groupBy('year')->get();
$lecture = Lecture::find($id);
$questions = DB::table('lecture_question')->join('obs', 'obs.id', '=', 'lecture_question.obs_id')->join('users', 'users.id', '=', 'lecture_question.user_id' )->select('*', 'users.name AS user_name', 'obs.name AS obs_name')->where('l_q_l_id', $id)->get();

return view('ObsPages.showlecture')->with('title', $title)->with('lecture', $lecture)->with('questions', $questions)->with('useryears', $useryears);

}



public function update(Request $request){

    if ($request->ajax()) {

        $lec = Lecture::find($request->edit_lecture_id);
        $lec->l_topic = $request->edit_lecture_topic;
        $lec->l_content = $request->edit_lecture_content;
        $lec->lecturer_name = $request->edit_lecturer_name;
        $lec->obs_lecture_status = $request->edit_lecture_status;
            $lec->l_batch = $request->edit_lecture_batch;
            $lec->l_stream = $request->edit_lecture_stream;
            $lec->l_year = $request->edit_lecture_year;
        $lec->save();
        
        return response('Updated successfully');

    }
}



public function reply(Request $request){

    if ($request->ajax()) {

    $ques = LectureQuestion::find($request->q_id); 
    $ques->reply = $request->reply_question_content;
    $ques->q_status = $request->edit_q_status;
    $ques->save();
        return response('Replied successfully');
        

    }
}


public function delete(Request $request){

    if ($request->ajax()) {

        $lec = Lecture::find($request->remove_lecture_id);
        $lec->delete();

        // LectureQuestion::where('l_q_l_id', $request->remove_lecture_id)->delete();
        // LectureView::where('l_v_l_id', $request->remove_lecture_id)->delete();
        return response('Deleted successfully');

    }
}





}
