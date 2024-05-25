<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\UserWelcomeMail;
use App\BlogComment;
use App\Blog;
use App\Lecture;
use DB;
use App\Information;
use App\InformationView;
use App\LectureView;
use App\LectureQuestion;
use App\Obs;
use App\User;
use App\UserStatus;
use App\FriendRequest;
use App\Order;
use App\UserShop;
use App\UserChat;
use App\UserWelcome;
use Mail;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Dashboard";

        $count_msg = UserChat::where('receiver_id', auth()->user()->id)->where('receiver_status', 1)->get();

        $request = FriendRequest::orderBy('f_r_id', 'desc')->join('users', 'users.id', '=', 'friend_request.sender_id')->join('states', 'states.state_id', '=', 'users.state_of_origin')->where('receiver_id', auth()->user()->id)->where('request_status', 0)->get();

        $todayinfos = Information::orderBy('i_id', 'desc')->where('i_batch', auth()->user()->batch )->where('i_stream', auth()->user()->stream)->where('i_batch', auth()->user()->batch )->where('obs_info_status', 'active')->where('admin_info_status', 'active')->whereDate('created_at', date('Y-m-d'))->get();

        $infos = Information::orderBy('i_id', 'desc')->where('i_batch', auth()->user()->batch )->where('i_stream', auth()->user()->stream)->where('i_year', auth()->user()->year)->where('obs_info_status', 'active')->where('admin_info_status', 'active')->whereDate('created_at','!=' ,date('Y-m-d'))->get();

        $lectures = Lecture::orderBy('l_id', 'desc')->where('l_batch', auth()->user()->batch )->where('l_stream', auth()->user()->stream)->where('l_year', auth()->user()->year)->where('obs_lecture_status', 'active')->where('admin_lecture_status', 'active')->get();
        $order = Order::where('buyer_id', auth()->user()->id)->where('buyer_order_notify', 1)->get();


$shop_notify = DB::table('order')->join('shop', 'shop.shop_id', '=', 'order.shop_id')->select('shop.shop_name As shop_name', 'shop.shop_id As shop_id',DB::raw('count(IF(order.seller_order_notify = 1, 1, NULL)) As total_notify') )->where('order.seller_order_notify', 1)->where('order.seller_id', auth()->user()->id)->groupBy('order.shop_id')->get();



    $welcome = UserWelcome::where('user_id', auth()->user()->id)->get();

    if (count($welcome) > 0) {
      
    }else{



      $wel = new UserWelcome;
      $wel->user_id = auth()->user()->id;
      $wel->save();

      Mail::to(auth()->user()->email, auth()->user()->name)->send(new UserWelcomeMail( auth()->user()->name ) ); 

    }




        return view('pages.index')->with('title', $title)->with('lectures', $lectures)->with('todayinfos', $todayinfos)->with('infos', $infos)->with('request', $request)->with('order', $order)->with('shop_notify', $shop_notify)->with('count_msg', $count_msg);
    }



    public function addviewinformation(Request $request){
        if ($request->ajax()) {

            $views = InformationView::where('i_v_i_id',$request->info_id)->get();

            $check = InformationView::where('user_id', auth()->user()->id)->where('i_v_i_id',$request->info_id)->get();

            if (count($check) > 0) {

              
            }else{
Information::where('i_id',$request->info_id)->update(['i_view' => DB::raw('i_view + 1')]);

                $view = new InformationView;
                $view->i_v_i_id = $request->info_id;
                $view->user_id = auth()->user()->id;
                $view->save();
                

            }

           return response(count($views));
        }
    }




       public function addviewlecture(Request $request){
        if ($request->ajax()) {

            $views = LectureView::where('l_v_l_id',$request->lecture_id)->get();

            $check = LectureView::where('user_id', auth()->user()->id)->where('l_v_l_id',$request->lecture_id)->get();

            if (count($check) > 0) {

              
            }else{

        Lecture::where('l_id',$request->lecture_id)->update(['l_view' => DB::raw('l_view + 1')]);
                $view = new LectureView;
                $view->l_v_l_id = $request->lecture_id;
                $view->user_id = auth()->user()->id;
                $view->save();
                

            }

           return response(count($views));
        }
    }


    public function addquestion(Request $request){
         if ($request->ajax()) {

           
$user_ques = LectureQuestion::where('l_q_l_id', $request->lecture_id)->where('user_id', auth()->user()->id)->get();

$lec_ques = LectureQuestion::where('l_q_l_id', $request->lecture_id)->get();

            if (count($user_ques) == 1) {
               
                return response('Sorry You Can only Ask One Question Per Lecture');

            }else if (count($lec_ques) == 10) {
                
                return response('Only 12 questions is entertained here, Make use of the helpdesk system is the question is much important!');
            }else {

                $ques = new LectureQuestion;
                $ques->l_q_l_id = $request->lecture_id;
                $ques->user_id = auth()->user()->id;
                $ques->obs_id = $request->lecture_obs_id;
                $ques->question = $request->lecture_question;
                $ques->reply = '';
                $ques->q_status = 'active';
                $ques->save();

        Lecture::where('l_id',$request->lecture_id)->update(['l_question' => DB::raw('l_question + 1')]);
                
                return response("Success");

            }

         }

    }




   public function loadquestion(Request $request){
        if ($request->ajax()) {

            $ques = DB::table('lecture_question')->join('obs', 'obs.id', '=', 'lecture_question.obs_id')->join('users', 'users.id', '=', 'lecture_question.user_id' )->select('*', 'users.name AS user_name', 'obs.name AS obs_name')->where('l_q_l_id', $request->lecture_id)->where('q_status', 'active')->get();

            //$ques = LectureQuestion::where('l_q_l_id', $request->lecture_id)->where('q_status', 'active');
            return response($ques);
        }
    }




    public function deletequestion(Request $request){
      if ($request->ajax()) {
        
        $q = LectureQuestion::find($request->q_id);
        $q->delete();
      }
    }




  public function countquestion(Request $request){
        if ($request->ajax()) {

            $ques = LectureQuestion::where('l_q_l_id', $request->lecture_id)->get();

            
           return response(count($ques));
        }
    }




public function userstatus(Request $request){

if ($request->ajax()) {

    $check = UserStatus::where('user_id', auth()->user()->id)->get();

    if (count($check) == 1) {
UserStatus::where('user_id', auth()->user()->id)->update(['status' => date('Y-m-d H:i:s')]);

    }else {

        $status = new UserStatus;
        $status->user_id = auth()->user()->id;
        $status->status = date('Y-m-d H:i:s');
        $status->save();

    }
   
   return response($check);

}

}





  public function updatepassword(Request $request){
    if ($request->ajax()) {

      $user = User::find(auth()->user()->id);
      $user->password = bcrypt($request->edit_password);
      $user->save();
      return response('Password Changed Successfully');
    }
  }






}
