<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\input;
use Illuminate\Support\Facades\File;
use DB;
use App\User;
use App\UserShop;
use Validator;
use response;
use App\Http\Requests;
use Mail;
use App\Mail\ShopCreatedMail;
use App\ShopView;
use App\ShopLike;
use App\ShopReview;
use App\ShopReviewReply;
use App\ShopReviewYes;
use App\ShopReviewReplyYes;
use App\ShopReviewNo;
use App\ShopReviewReplyNo;
use App\ShopAward;
use App\ShopMessage;
use App\Mail\MessageShopMail;
use App\Mail\ReplyMessageShopMail;
use App\ShopCall;
use App\UserCall;
use App\UserWhatsapp;
use App\ShopProduct;
use App\Order;
use App\UserChat;


class MarketController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){


    	$shops = UserShop::orderBy('shop_like','desc')->join('users', 'users.id', '=', 'shop.user_id')->where('shop_account_status', 'active')->get();
    	$title = "Market";

    	return view('pages.market')->with('title', $title)->with('shops', $shops);
    }



    public function shops(){

    	$title = "Shops";

    	return view('pages.shops')->with('title', $title);
    }


    public function fetchshops(Request $request){
    	if ($request->ajax()) {
    		

    		if ($request->shop_name != '') {
    		
	$shops = UserShop::orderBy('shop_like','desc')->where('shop_account_status', 'active')->where('shop_name','LIKE',"%{$request->shop_name}%")->orWhere('shop_address','LIKE',"%{$request->shop_name}%")->orWhere('shop_specialist','LIKE',"%{$request->shop_name}%")->get();

    		}else{


    $shops = UserShop::orderBy('shop_like','desc')->where('shop_account_status', 'active')->get();	


    		}




    		return response($shops);
    	}
    }



    public function create(Request $request){
    	if ($request->ajax()) {


    	if (auth()->user()->account_status == 'inactive') {
    			return response()->json('You need to verify your account first and it is free.');
    		}else{	
    		
    	$image_data = $request->image;
		$image_array_1 = explode(";", $image_data);
		$image_array_2 = explode(",", $image_array_1[1]);
		$data = base64_decode($image_array_2[1]);
		$image_name = 'shopimage'.$request->shop_name.''.time().'.png';
		$upload_path = 'assets/img/shopimage/'.$image_name;
		file_put_contents($upload_path, $data);

	$text = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $text_shuff = str_shuffle($text);
	$half = substr($text_shuff, 7, 4);


	$get_shop = UserShop::all();
	$count = count($get_shop) + 1;

	$shop_auth_id = $half.'-SHOP-'.$count;

	$check = UserShop::where('user_id', auth()->user()->id)->where('shop_name', $request->shop_name)->get();

	if (count($check) > 0) {
		return response()->json('No dublication of bussness name');
	}else{

		$shop = new UserShop;
		$shop->shop_auth_id = $shop_auth_id;
		$shop->shop_image = $image_name;
		$shop->shop_name = $request->shop_name;
		$shop->user_id = auth()->user()->id;
		$shop->shop_phone_number = $request->shop_phone_number;
		$shop->shop_email = $request->shop_email;
		$shop->shop_address = $request->shop_address;
		$shop->shop_specialist = $request->shop_specialist;
		$shop->about_shop  = $request->about_shop;
		$shop->shop_open_hour = $request->shop_open_hour;
		$shop->shop_closing_hour = $request->shop_closing_hour;
		$shop->shop_working_days = $request->shop_working_days;
		$shop->shop_account_status = 'inactive';
		$shop->amount_paid = '';
		$shop->account_activator_name = '';
		$shop->shop_like = 1;
		$shop->shop_view = 1;
		$shop->save();

Mail::to($request->shop_email, auth()->user()->name)->send(new ShopCreatedMail( $request->shop_name, $shop_auth_id));	
return response()->json('Created Successfully');

}

}


    	}
    }




   public function shop($name, $id){

   	$title = $name;

   	$checkauth = UserShop::find($id);

   	if ($checkauth->user_id == auth()->user()->id) {
   		return redirect('/myshop/'.$name.'/'.$id);
   	}else if($checkauth->shop_account_status == 'inactive'){
   			return redirect('/dashboard')->with('error', $name.' is yet to be verified.');
   	}else{

   		$checkview = ShopView::where('shop_id', $id)->where('user_id', auth()->user()->id)->get();
   if (count($checkview) > 0) {
   	
   }else if(auth()->user()->account_status == 'inactive'){
   	//
   }else{

   	
   		$view = new ShopView;
   		$view->shop_id = $id;
   		$view->user_id = auth()->user()->id;
   		$view->save();

   UserShop::where('shop_id',$id)->update(['shop_view' => DB::raw('shop_view + 1')]);


   }

   $products = ShopProduct::orderBy('shop_product_id', 'desc')->where('shop_id', $id)->get();

   $orders = Order::orderBy('order_id', 'desc')->join('shop_product', 'shop_product.shop_product_id', '=', 'order.product_id')->where('order.shop_id', $id)->where('buyer_id', auth()->user()->id)->get();

   $calls = ShopCall::orderBy('shop_call_id', 'desc')->where('caller_id', auth()->user()->id)->where('shop_id', $id)->get();
   $messages = ShopMessage::orderBy('shop_message_id', 'desc')->where('sender_id', auth()->user()->id)->where('shop_id', $id)->get();
   $awards = ShopAward::where('shop_id', $id)->get();
   	$shoplike = ShopLike::where('shop_id', $id)->where('user_id', auth()->user()->id)->get();
   		$shop_name = $name;
   		$shop = UserShop::find($id);
   		$ownby = UserShop::join('users', 'users.id', '=', 'shop.user_id')->where('shop_id',$id)->get();


   	return view('pages.shop')->with('title', $title)->with('shop_name', $shop_name)->with('shop', $shop)->with('ownby', $ownby)->with('shoplike', $shoplike)->with('awards', $awards)->with('messages', $messages)->with('calls', $calls)->with('orders', $orders)->with('products', $products);



   	}




   }


     public function myshop($name, $id){

   	$title = $name;


   	$checkauth = UserShop::find($id);

   	if ($checkauth->user_id == auth()->user()->id) {

 $orders = Order::orderBy('order_id', 'desc')->join('users', 'users.id', '=', 'order.buyer_id')->join('shop_product', 'shop_product.shop_product_id', '=', 'order.product_id')->where('order.shop_id', $id)->get();

   	$products = ShopProduct::orderBy('shop_product_id', 'desc')->where('shop_id', $id)->get();

   		$call = ShopCall::where('shop_id', $id)->where('owner_notify', 1)->get();
   		$mes = ShopMessage::where('shop_id', $id)->where('shop_owner_notify', 1)->get();
   		$order = Order::where('shop_id', $id)->where('seller_order_notify', 1)->get();

   	$calls = DB::table('shop_call')->orderBy('shop_call_id', 'desc')->join('users', 'users.id', '=', 'shop_call.caller_id')->select('*', 'shop_call.created_at As time_called')->where('shop_id', $id)->get();

	$messages = DB::table('shop_message')->orderBy('shop_message_id', 'desc')->join('users', 'users.id', '=', 'shop_message.sender_id')->select('*', 'shop_message.created_at As time_sent')->where('shop_id', $id)->get();

   		$shop_name = $name;
   		$shop = UserShop::find($id);
   		$awards = ShopAward::where('shop_id', $id)->get();
   	
   	return view('pages.myshop')->with('title', $title)->with('shop_name', $shop_name)->with('shop', $shop)->with('awards', $awards)->with('calls', $calls)->with('messages', $messages)->with('call', $call)->with('mes', $mes)->with('products', $products)->with('orders', $orders)->with('order', $order);

   		
   	}else{

		return redirect('/shop/'.$name.'/'.$id);
   	}

}




public function likeshop(Request $request){
	if ($request->ajax()) {

		if (auth()->user()->account_status == 'inactive') {
			return response('You need to verify your account first.');
		}else{
			$like = new ShopLike;
		$like->shop_id = $request->shop_id;
		$like->user_id = auth()->user()->id;
		$like->save();

	UserShop::where('shop_id',$request->shop_id)->update(['shop_like' => DB::raw('shop_like + 1')]);

		return response('Like');
		}
		
	}
}



public function unlikeshop(Request $request){
	if ($request->ajax()) {

ShopLike::where('shop_id', $request->u_shop_id)->where('user_id', auth()->user()->id)->delete();

	UserShop::where('shop_id',$request->u_shop_id)->update(['shop_like' => DB::raw('shop_like - 1')]);

		return response('UnLike');
	}
}



public function addreview(Request $request){
	if ($request->ajax()) {

		if (auth()->user()->account_status == 'inactive') {
			return response('You need to verify your account first.');
		}else{

			$review = new ShopReview;
		$review->user_id = $request->review_star;
		$review->shop_id = $request->review_shop_id;
		$review->review_title = $request->review_title;
		$review->review_content = $request->review_content;
		$review->review_star = $request->review_star;
		$review->review_yes = 0;
		$review->review_no = 0;
		$review->save(); 		
		return response('Added');
		}

		
	}
}



public function getreview(Request $request){
	if ($request->ajax()) {

//$reviews = ShopReview::join('users', 'users.id', '=', 'shop_review.user_id')->where('shop_id', $request->shop_id)->get();
$reviews = DB::table('shop_review')->orderBy('shop_review_id', 'desc')->join('users', 'users.id', '=', 'shop_review.user_id')->select('*', 'shop_review.created_at As time_created')->where('shop_id', $request->shop_id)->get();

		
return response($reviews);
	}
}



public function loadreply(Request $request){
	if ($request->ajax()) {


$reviews = DB::table('shop_review_reply')->orderBy('shop_review_reply_id', 'desc')->join('users', 'users.id', '=', 'shop_review_reply.user_id')->select('*', 'shop_review_reply.created_at As time_created')->where('shop_review_id', $request->r_shop_id)->get();

		
return response($reviews);
	}
}




public function reviewyes(Request $request){
	if ($request->ajax()) {

		if (auth()->user()->account_status == 'inactive') {
			
		}else{

			$check = ShopReviewYes::where('shop_review_id', $request->review_id)->where('user_id', auth()->user()->id)->get();

		
	if (count($check) > 0 ) {

ShopReviewYes::where('shop_review_id', $request->review_id)->where('user_id', auth()->user()->id)->delete();
		ShopReview::where('shop_review_id',$request->review_id)->update(['review_yes' => DB::raw('review_yes - 1')]);
			
			}else{

				$yes = new ShopReviewYes;
				$yes->shop_review_id = $request->review_id;
				$yes->user_id = auth()->user()->id;
				$yes->save();
		ShopReview::where('shop_review_id',$request->review_id)->update(['review_yes' => DB::raw('review_yes + 1')]);

			}
		}
	
		
	}
}



public function reviewno(Request $request){
	if ($request->ajax()) {

		if (auth()->user()->account_status == 'inactive') {
			
		}else{

			$check = ShopReviewNo::where('shop_review_id', $request->review_id)->where('user_id', auth()->user()->id)->get();

		
	if (count($check) > 0 ) {

ShopReviewNo::where('shop_review_id', $request->review_id)->where('user_id', auth()->user()->id)->delete();
		ShopReview::where('shop_review_id',$request->review_id)->update(['review_no' => DB::raw('review_no - 1')]);
			
			}else{

				$yes = new ShopReviewNo;
				$yes->shop_review_id = $request->review_id;
				$yes->user_id = auth()->user()->id;
				$yes->save();
		ShopReview::where('shop_review_id',$request->review_id)->update(['review_no' => DB::raw('review_no + 1')]);

			}
		}
		
	}
}





public function reviewreplyyes(Request $request){
	if ($request->ajax()) {

		if (auth()->user()->account_status == 'inactive') {
			
		}else{

			$check = ShopReviewReplyYes::where('shop_review_reply_id', $request->review_reply_id)->where('user_id', auth()->user()->id)->get();

		
	if (count($check) > 0 ) {

ShopReviewReplyYes::where('shop_review_reply_id', $request->review_reply_id)->where('user_id', auth()->user()->id)->delete();
		ShopReviewReply::where('shop_review_reply_id',$request->review_reply_id)->update(['reply_review_yes' => DB::raw('reply_review_yes - 1')]);
			
			}else{

				$yes = new ShopReviewReplyYes;
				$yes->shop_review_reply_id = $request->review_reply_id;
				$yes->user_id = auth()->user()->id;
				$yes->save();
		ShopReviewReply::where('shop_review_reply_id',$request->review_reply_id)->update(['reply_review_yes' => DB::raw('reply_review_yes + 1')]);

			}
		}
		
		
	}
}



public function reviewreplyno(Request $request){
	if ($request->ajax()) {

		if (auth()->user()->account_status == 'inactive') {
			
		}else{

$check = ShopReviewReplyNo::where('shop_review_reply_id', $request->review_reply_id)->where('user_id', auth()->user()->id)->get();

		
	if (count($check) > 0 ) {

ShopReviewReplyNo::where('shop_review_reply_id', $request->review_reply_id)->where('user_id', auth()->user()->id)->delete();
		ShopReviewReply::where('shop_review_reply_id',$request->review_reply_id)->update(['reply_review_no' => DB::raw('reply_review_no - 1')]);
			
			}else{

				$yes = new ShopReviewReplyNo;
				$yes->shop_review_reply_id = $request->review_reply_id;
				$yes->user_id = auth()->user()->id;
				$yes->save();
		ShopReviewReply::where('shop_review_reply_id',$request->review_reply_id)->update(['reply_review_no' => DB::raw('reply_review_no + 1')]);

			}
		}
		
		
	}
}



public function addreviewreply(Request $request){
	if ($request->ajax()) {

		if (auth()->user()->account_status == 'inactive') {
			return response('You need to verify your account first.');
		}else{

			$reply = new ShopReviewReply;
		$reply->user_id = auth()->user()->id;
		$reply->shop_review_id = $request->r_r_id;
		$reply->reply_review_content = $request->reviewreply_content;
		$reply->reply_review_star = $request->reviewreply_star;
		$reply->reply_review_yes = 0;
		$reply->reply_review_no = 0;
		$reply->save();
		
		return response('Added');
		}

		
	}

}



public function editshop($name, $id){

	$title = $name;

	$shop = UserShop::find($id);
 $count_msg = UserChat::where('receiver_id', auth()->user()->id)->where('receiver_status', 1)->get();
	if ($shop->user_id == auth()->user()->id) {
		

		return view('pages.editshop')->with('title', $title)->with('shop', $shop)->with('count_msg',$count_msg);

	}else{

		return redirect('/dashboard');
	}


}



public function updateshop(Request $request){
	if ($request->ajax()) {

		$shop = UserShop::find($request->edit_shop_id);
		$amount_paid = $shop->amount_paid;
		$account_activator_name = $shop->account_activator_name;

		$shop->shop_name = $request->edit_shop_name;
		$shop->shop_phone_number = $request->edit_shop_phone_number;
		$shop->shop_email = $request->edit_shop_email;
		$shop->shop_address = $request->edit_shop_address;
		$shop->shop_specialist = $request->edit_shop_specialist;
		$shop->about_shop  = $request->edit_about_shop;
		$shop->shop_open_hour = $request->edit_shop_open_hour;
		$shop->shop_closing_hour = $request->edit_shop_closing_hour;
		$shop->shop_working_days = $request->edit_shop_working_days;
		$shop->amount_paid = $amount_paid;
		$shop->account_activator_name = $account_activator_name;
		$shop->save();
		
		return response('Updated Successfully');
	}
}


public function changeshopimage(Request $request){
	if ($request->ajax()) {

	File::delete('assets/img/shopimage/'.$request->changing_image);
$shop = UserShop::find($request->change_shop_image_id);
		$image_data = $request->image;
		$image_array_1 = explode(";", $image_data);
		$image_array_2 = explode(",", $image_array_1[1]);
		$data = base64_decode($image_array_2[1]);
		$image_name = 'ShopImageChanged'.$shop->shop_name.''.time().'.png';
		$upload_path = 'assets/img/shopimage/'.$image_name;
		file_put_contents($upload_path, $data);

			
			$shop->shop_image = $image_name;
			$shop->save();

		return response()->json('Shop Image Updated Successfully');
	}
}


public function addshopaward(Request $request){
if ($request->ajax()) {
	
	$check = ShopAward::where('shop_id', $request->shopaward_shop_id)->get();

	if (count($check) == 3 ) {
	return response('Opps!, You can only upload three award.');
	}else{

		$award = new ShopAward;
		$award->shop_id =  $request->shopaward_shop_id;
		$award->shopaward_name = $request->shopaward_name;
		$award->shopaward_detail = $request->shopaward_detail;
		$award->shopaward_date = $request->shopaward_date;
		$award->save();
		
		return response('Inserted Successfully');

	}
}
}




public function fetchshopaward(Request $request){
if ($request->ajax()) {

	$award = ShopAward::orderBy('shopaward_id', 'desc')->where('shop_id', $request->shop_id)->get();
	
	return response($award);
}

}


public function deleteshopaward(Request $request){
if ($request->ajax()) {

	$award = ShopAward::find($request->as_id);
	$award->delete();
	return response('Deleted Successfully');
}
}



public function deleteshop(Request $request){
if ($request->ajax()) {

	$shop = UserShop::find($request->shop_id);
	$shop->delete();
	return response('Deleted Successfully');
}
}



public function addsendshopmessage(Request $request){
if ($request->ajax()) {

	$shop = UserShop::find($request->shop_id);

	if ($shop->shop_account_status == 'inactive') {
		return response('Sorry You message was unsuccessful, The shop is yet to be verified.');
	}else{

		Mail::to($shop->shop_email, $shop->shop_name)->send(new MessageShopMail($request->shop_message_name, $request->shop_message_email, $request->shop_message_subject, $request->shop_message_content, $shop->shop_name, $shop->shop_auth_id));
$body = 'Thanks for reaching out to us,We will reply you as soon as possible';

Mail::to($request->shop_message_email, $request->shop_message_name)->send(new ReplyMessageShopMail($shop->shop_name, $shop->shop_auth_id,$request->shop_message_subject,$request->shop_message_name, $body));	

	$mes = new ShopMessage;
	$mes->sender_id = auth()->user()->id;
	$mes->shop_id = $request->shop_id;
	$mes->receiver_id = $shop->user_id;
	$mes->sender_name = $request->shop_message_name;
	$mes->sender_email = $request->shop_message_email;
	$mes->shop_message_subject = $request->shop_message_subject;
	$mes->shop_message_content = $request->shop_message_content;
	$mes->shop_owner_notify = 1;
	$mes->save();




	return response('Message Sent Successfully');

	}


}
}



public function addshopcall(Request $request){

	if ($request->ajax()) {
		$shop = UserShop::find($request->shop_id);
		$call = new ShopCall;
		$call->caller_id = auth()->user()->id;
		$call->shop_id = $request->shop_id;
		$call->receiver_id = $shop->user_id;
		$call->owner_notify = 1;
		$call->save();
	}
}



public function addusercall(Request $request){

	if ($request->ajax()) {
		$call = new UserCall;

		$call->caller_id = auth()->user()->id;
		$call->receiver_id = $request->user_id;
		$call->receiver_status = 1;
		$call->save();
	}
}


public function adduserwhatsapp(Request $request){

	if ($request->ajax()) {
		$whatsapp = new UserWhatsapp;

		$whatsapp->sender_id = auth()->user()->id;
		$whatsapp->receiver_id = $request->user_id;
		$whatsapp->receiver_status = 1;
		$whatsapp->save();
	}
}


public function replyshopmessage(Request $request){

	if ($request->ajax()) {

	$shop = UserShop::find($request->reply_shop_id);

Mail::to($request->reply_shop_message_email, $request->reply_shop_message_name)->send(new ReplyMessageShopMail($shop->shop_name, $shop->shop_auth_id,$request->reply_shop_message_subject,$request->reply_shop_message_name, $request->reply_shop_message_content));

return response('Message Sent Successfully');
	}
}



public function clearshopcallstatus(Request $request){
	if ($request->ajax()) {

	ShopCall::where('shop_id', $request->shop_id)->where('owner_notify', 1)->update(['owner_notify' => 0]);

	}
}



public function clearshopmessagestatus(Request $request){
	if ($request->ajax()) {

	ShopMessage::where('shop_id', $request->shop_id)->where('shop_owner_notify', 1)->update(['shop_owner_notify' => 0]);

	}
}



public function ordercomplete(Request $request){
if ($request->ajax()) {
	
	$order = Order::find($request->order_id);
	$order->seller_order_status = 'completed';
	$order->seller_order_notify = 0;
	$order->buyer_order_notify = 1;
	$order->save();
	return response('Done');
}
}



public function orderyes(Request $request){
	if ($request->ajax()) {
		
UserShop::where('shop_id',$request->shop_id)->update(['shop_like' => DB::raw('shop_like + 1')]);
ShopProduct::where('shop_product_id',$request->product_id)->update(['love' => DB::raw('love + 1')]);
$order = Order::find($request->order_id);
$order->order_status = 'completed';
$order->buyer_order_status = 'completed';
$order->buyer_order_notify = 0;
$order->seller_order_notify = 1;
$order->save();		
return response('Done');


	}
}


public function clearcompletenotify(Request $request){
	if ($request->ajax()) {

	Order::where('shop_id', $request->shop_id)->where('order_status', 'completed')->update(['seller_order_notify' => 0]);
		//return response('okay');
	}
}




public function deletemyshopreview(Request $request){

	if ($request->ajax()) {
		
		$r = ShopReview::find($request->r_id);
		$r->delete();

		$check = ShopReviewReply::where('shop_review_id', $request->r_id)->get();

		if (count($check) > 0) {
			ShopReviewReply::where('shop_review_id', $request->r_id)->delete();
		
		}else{
			
		}


	}
}





}
