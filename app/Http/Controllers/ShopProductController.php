<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\input;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\PDF_Code128;
use DB;
use App\User;
use App\UserShop;
use Validator;
use response;
use App\Http\Requests;
use App\ShopProduct;
use App\ProductLove;
use App\Order;
use App\Mail\OrderPlacedMail;
use App\Mail\OrderPlaceMail;
use Mail;
use App\UserChat;


class ShopProductController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }




    public function store(Request $request){
    	if ($request->ajax()) {


    		//Image//

    		$image_data = $request->image;
		$image_array_1 = explode(";", $image_data);
		$image_array_2 = explode(",", $image_array_1[1]);
		$data = base64_decode($image_array_2[1]);
		$image_name = 'productimage'.$request->product_name.''.time().'.png';
		$upload_path = 'assets/img/shopimage/'.$image_name;
		file_put_contents($upload_path, $data);


		//Product

    		$product = new ShopProduct;
    		$product->shop_id = $request->product_shop_id;
    		$product->user_id = auth()->user()->id;
    		$product->product_image = $image_name;
    		$product->product_name = $request->product_name;
    		$product->current_price = $request->product_price;
    		$product->old_price = $request->product_old_price;
    		$product->description = $request->product_description;
    		$product->product_qty = $request->product_qty;
			$product->specification = '';
    		$product->key_feature = '';
    		$product->love = 1;
    		$product->product_status = 'available'; 
    		$product->save();
    		
    		return response()->json('Uploaded Successfully');
    	}
    }




public function fetch(Request $request){
	if ($request->ajax()) {

		if ($request->product_name != '') {
			
$products = ShopProduct::orderBy('shop.shop_like','desc')->orderBy('love','desc')->join('shop', 'shop.shop_id', '=', 'shop_product.shop_id')->where('shop.shop_account_status', 'active')->where('product_name','LIKE',"%{$request->product_name}%")->orWhere('description','LIKE',"%{$request->product_name}%")->get();		

		}elseif ($request->shop_name != '') {
	$products = ShopProduct::orderBy('shop.shop_like','desc')->orderBy('love','desc')->join('shop', 'shop.shop_id', '=', 'shop_product.shop_id')->where('shop.shop_account_status', 'active')->where('shop.shop_name','LIKE',"%{$request->shop_name}%")->get();
		}else{

	$products = ShopProduct::orderBy('shop.shop_like','desc')->orderBy('love','desc')->join('shop', 'shop.shop_id', '=', 'shop_product.shop_id')->where('shop.shop_account_status', 'active')->get();		

		}
		
		return response($products);
	}
}




	public function product($name, $id){

		$title = $name;

		$product = ShopProduct::find($id);

		$shop = UserShop::find($product->shop_id);

		if ($product->user_id == auth()->user()->id) {
		
		return redirect('/myproduct/'.$name.'/'.$id);

		}elseif($shop->shop_account_status == 'inactive'){

			return redirect('/dashboard')->with('error', $shop->shop_name.' is yet to be verified.');

		}else{

			$love = ProductLove::where('product_id', $id)->where('lover_id', auth()->user()->id)->get();

			return view('pages.product')->with('title', $title)->with('product', $product)->with('love', $love);
		}


	}


	public function myproduct($name, $id){

		$title = $name;
		$product = ShopProduct::find($id);
		if ($product->user_id == auth()->user()->id) {
		
		return view('pages.myproduct')->with('title', $title)->with('product', $product);

		}else{

			return redirect('/product/'.$name.'/'.$id);

		}

	}



    public function editproduct($name, $id){

    	$title = $name;

    	$product = ShopProduct::find($id);
        $count_msg = UserChat::where('receiver_id', auth()->user()->id)->where('receiver_status', 1)->get();

    	if ($product->user_id == auth()->user()->id) {

    		return view('pages.editproduct')->with('title', $title)->with('product', $product)->with('count_msg', $count_msg);
    		
    	}else{

	return redirect('/dashboard');
    	}
    }


    public function deleteproduct($pid, $sid){

    	$product = ShopProduct::find($pid);
    	$product->delete();

    	$shop = UserShop::find($sid);

    	return redirect('/myshop/'.$shop->shop_name.'/'.$shop->shop_id)->with('success', 'Product Delete Successfully');
    }



    public function updateproduct(Request $request){
    	if ($request->ajax()) {

    		$product = ShopProduct::find($request->product_id);

    		$product->product_name = $request->edit_product_name;
    		$product->current_price = $request->edit_product_price;
    		$product->old_price = $request->edit_product_old_price;
    		$product->description = $request->edit_product_description;
			$product->product_status = $request->edit_product_status;
			$product->specification = $request->edit_product_specification;
    		$product->key_feature = $request->edit_product_keyfeature;
    		$product->product_qty = $request->edit_product_qty;
    		$product->save();
    		
    		return response()->json('Updated Successfully');
    	}
    }



    public function changeproductimage(Request $request){
    	if ($request->ajax()) {

    	File::delete('assets/img/shopimage/'.$request->changing_image);

		$product = ShopProduct::find($request->change_product_image_id);
		$image_data = $request->image;

		$image_array_1 = explode(";", $image_data);
		$image_array_2 = explode(",", $image_array_1[1]);
		$data = base64_decode($image_array_2[1]);
		$image_name = 'ProductImageChanged'.$product->product_name.''.time().'.png';
		$upload_path = 'assets/img/shopimage/'.$image_name;
		file_put_contents($upload_path, $data);

			
			$product->product_image = $image_name;
			$product->save();

		return response()->json('Product Image Updated Successfully');
    
    	}
    }




    public function loveproduct(Request $request){

    	if ($request->ajax()) {

    	if (auth()->user()->account_status == 'inactive' ) {
    			return response('Verify your account first.');
    		}	else{
ShopProduct::where('shop_product_id',$request->product_id)->update(['love' => DB::raw('love + 1')]);

    		$love = new ProductLove;
    		$love->lover_id = auth()->user()->id;
    		$love->product_id = $request->product_id;
    		$love->save();
    		
    		return response('Love');

    		}


    	}

    }




public function unloveproduct(Request $request){

    	if ($request->ajax()) {

ShopProduct::where('shop_product_id',$request->product_id)->update(['love' => DB::raw('love - 1')]);

    		$love = ProductLove::where('product_id', $request->product_id)->where('lover_id', auth()->user()->id);
    		
    		$love->delete();
    		
    		return response('UnLove');
    	}

    }



    public function placeorder(Request $request){
    	if ($request->ajax()) {

    $product = ShopProduct::find($request->product_id);
    $shop = UserShop::find($product->shop_id);		

    if (auth()->user()->account_status == 'inactive') {
    		
    		return response('You need to verirfy your account first.');

		}else if (auth()->user()->serving_lga == '') {

    return response('Update your serving or served lga.');
    
    }else if ($shop->shop_account_status == 'inactive') {

    return response('The Shop you try making order from is yet to be verified.');
    
    }else if ($product->product_qty == 0) {

    return response('This product has all been sold out.');
    
    }else if ($product->product_qty < $request->quantity) {

    return response('Quatity required is not available');
    
    }else {

    	$total = $request->quantity * $request->product_price;
    	$unique = 'OR'.rand();

    	$order = new Order;
    	$order->buyer_id = auth()->user()->id;
    	$order->seller_id = $product->user_id;
    	$order->shop_id = $product->shop_id;
    	$order->product_id = $request->product_id;
    	$order->order_unique_id = $unique;
    	$order->product_price = $request->product_price;
    	$order->quantity = $request->quantity;
    	$order->total_price = $total;
    	$order->destination = $request->product_destination;
    	$order->period = $request->product_period;
    	$order->order_status = 'pending';
    	$order->buyer_order_status = 'pending';
    	$order->seller_order_status = 'pending';
    	$order->buyer_order_notify = 0;
    	$order->seller_order_notify = 1;
    	$order->save();
   
   ShopProduct::where('shop_product_id',$request->product_id)->update(['product_qty' => DB::raw('product_qty - '.$request->quantity)]);


Mail::to($shop->shop_email, $shop->shop_name)->send(new OrderPlaceMail($shop->shop_name, $unique, $request->quantity, $request->product_price, $request->product_period, auth()->user()->name,$product->product_name));


Mail::to(auth()->user()->email, auth()->user()->name)->send(new OrderPlacedMail(auth()->user()->name, $unique, $product->product_name, $request->product_price, $request->quantity, $request->product_period));

return response('Order Placed Successfully');


    }




    		
    		
    	}
    }




    public function orderreceipt($order_id,$seller_id,$product_id,$shop_id,$buyer_id){

        require('code128.php');

        if ($buyer_id == auth()->user()->id) {
            $order = Order::find($order_id);
            $seller = User::find($seller_id);
            $product = ShopProduct::find($product_id);
            $shop = UserShop::find($shop_id);
            $buyer = User::find($buyer_id);

  $fpdf = new  PDF_Code128();
       //$fpdf->SetLeftMargin(10);
    $fpdf->AddPage();

    $fpdf->Image(asset('assets/img/logo.png'), 70,5);
    $fpdf->SetFont("Times","B", 18);
$fpdf->SetTextColor(0,3,0);
$fpdf->SetXY(75,23);
$fpdf->Cell(0,0,"Order Receipt",0,0);


$fpdf->SetXY(20,30);
$fpdf->setFillColor(0,255,0);
$fpdf->SetFont("Courier","B", 20);
$fpdf->SetTextColor(255,255,255);
$fpdf->Cell(200,20,"Invoice #".$order->order_unique_id,0,0,'',TRUE);

$fpdf->SetXY(120,30);
// $c->SetFont("Times","B", 11);
$fpdf->SetFont("Courier","B", 23);
$fpdf->SetTextColor(255,255,255);
$fpdf->Cell(200,20,$order->order_status,0,0,'',TRUE);


$fpdf->SetXY(20,55);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(192,192,192);
$fpdf->Cell(0,5,"Invoice Date",0,0);

$fpdf->SetXY(50,55);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(0,5,":".Date("Y-M-d"),0,0);



$fpdf->SetXY(20,60);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(192,192,192);
$fpdf->Cell(0,5,"Order Date",0,0);

$fpdf->SetXY(50,60);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(0,5,":".date('Y-M-d', strtotime($order->created_at)),0,0);


$fpdf->SetXY(20,65);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(192,192,192);
$fpdf->Cell(0,5,"Order Status",0,0);

$fpdf->SetXY(50,65);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(0,3,0);
$fpdf->MultiCell(100,5,":".$order->order_status,0,1);




$fpdf->SetXY(140,60);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(192,192,192);
$fpdf->Cell(0,5,"Invoice To",0,0);

$fpdf->SetXY(140,65);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(0,5,$buyer->name,0,0);

$fpdf->SetXY(140,70);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(70,5,$buyer->state_code,0,1);

$fpdf->SetXY(140,75);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(70,5,$buyer->phone_number,0,1);

$fpdf->Ln(10);


$fpdf->SetTextColor(192,192,192);
$fpdf->SetFont("Courier","B", 11);
$fpdf->Cell(80,5,"Product Name",0,0, "L");
$fpdf->Cell(40,5,"Quantity",0,0, "C");
$fpdf->Cell(20,5,"Price",0,0, "C");
$fpdf->Cell(40,5,"Total",0,1, "C");


$total = 0;
        $fpdf->setFillColor(192,192,192);
    $fpdf->SetFont("Courier","B", 11);
        $fpdf->SetTextColor(0,3,0);
        $fpdf->Ln(1);
        $fpdf->Cell(80,8,$product->product_name,0,0, "L", TRUE);
        
        $fpdf->Cell(40,8,$order->quantity,0,0, "C", TRUE);
        
    $fpdf->Cell(20,8,"N".number_format($order->product_price),0,0, "C",TRUE);

    $fpdf->Cell(40,8,"N".number_format($order->quantity * $order->product_price),0,1, "C",TRUE);
    $sub = $order->product_price * $order->quantity;
    $total += $sub;
    

$fpdf->Ln(3);

$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(192,192,192);
$fpdf->Cell(140,5,"Sub Total",0,0,"R");

$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(30,5,"N".number_format($total),0,1, "R");

$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(192,192,192);
$fpdf->Cell(140,5,"Shipping and Handling",0,0,"R");

$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(23,5,"------",0,1, "R");


$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(192,192,192);
$fpdf->Cell(140,5,"Tax",0,0,"R");

$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(24,5,"N0.00",0,1, "R");

$fpdf->SetTextColor(255,255,255);
$fpdf->setFillColor(255,0,255);
$fpdf->SetFont("Courier","B", 11);
$fpdf->Cell(140,10,"Total",0,0,"R", TRUE);
    

$fpdf->setFillColor(255,0,205);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(255,255,255);
$fpdf->Cell(29,10,"N".number_format($total),0,1, "R",TRUE);
$fpdf->Ln(4);


$fpdf->SetFont("Courier","B", 20);
$fpdf->SetTextColor(192,192,192);
$fpdf->Cell(10,5,"Shop Details",0,1,"L");
$fpdf->Ln(3);

$fpdf->SetTextColor(192,192,192);
$fpdf->SetFont("Courier","B", 10);
$fpdf->Cell(40,5,":Name",0,0);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(50,5,$shop->shop_name,0,1);

$fpdf->SetTextColor(192,192,192);
$fpdf->SetFont("Courier","B", 10);
$fpdf->Cell(40,5,":Phone Number ",0,0);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(50,5,$shop->shop_phone_number,0,1);

$fpdf->SetTextColor(192,192,192);
$fpdf->SetFont("Courier","B", 10);
$fpdf->Cell(40,5,":Address",0,0);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(10,5,$shop->shop_address,0,1);

$fpdf->SetTextColor(192,192,192);
$fpdf->SetFont("Courier","B", 10);
$fpdf->Cell(40,5,":Field",0,0);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(50,5,$shop->shop_specialist,0,1);

$fpdf->SetTextColor(192,192,192);
$fpdf->SetFont("Courier","B", 10);
$fpdf->Cell(40,5,":Own By",0,0);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(50,5,$seller->name.' '.$seller->state_code,0,1);










              $fpdf->Output();
              exit();
        }else{

            return redirect('/dashboard')->with('error', 'Invalid User');

        }


    }







    public function myorderreceipt($order_id,$seller_id,$product_id,$shop_id,$buyer_id){

        require('code128.php');

        if ($seller_id == auth()->user()->id) {
            $order = Order::find($order_id);
            $seller = User::find($seller_id);
            $product = ShopProduct::find($product_id);
            $shop = UserShop::find($shop_id);
            $buyer = User::find($buyer_id);

  $fpdf = new  PDF_Code128();
       //$fpdf->SetLeftMargin(10);
    $fpdf->AddPage();

    $fpdf->Image(asset('assets/img/logo.png'), 70,5);
    $fpdf->SetFont("Times","B", 18);
$fpdf->SetTextColor(0,3,0);
$fpdf->SetXY(75,23);
$fpdf->Cell(0,0,"Order Receipt",0,0);


$fpdf->SetXY(20,30);
$fpdf->setFillColor(0,255,0);
$fpdf->SetFont("Courier","B", 20);
$fpdf->SetTextColor(255,255,255);
$fpdf->Cell(200,20,"Invoice #".$order->order_unique_id,0,0,'',TRUE);

$fpdf->SetXY(120,30);
// $c->SetFont("Times","B", 11);
$fpdf->SetFont("Courier","B", 23);
$fpdf->SetTextColor(255,255,255);
$fpdf->Cell(200,20,$order->order_status,0,0,'',TRUE);


$fpdf->SetXY(20,55);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(192,192,192);
$fpdf->Cell(0,5,"Invoice Date",0,0);

$fpdf->SetXY(50,55);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(0,5,":".Date("Y-M-d"),0,0);



$fpdf->SetXY(20,60);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(192,192,192);
$fpdf->Cell(0,5,"Order Date",0,0);

$fpdf->SetXY(50,60);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(0,5,":".date('Y-M-d', strtotime($order->created_at)),0,0);


$fpdf->SetXY(20,65);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(192,192,192);
$fpdf->Cell(0,5,"Order Status",0,0);

$fpdf->SetXY(50,65);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(0,3,0);
$fpdf->MultiCell(100,5,":".$order->order_status,0,1);




$fpdf->SetXY(140,60);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(192,192,192);
$fpdf->Cell(0,5,"Invoice To",0,0);

$fpdf->SetXY(140,65);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(0,5,$buyer->name,0,0);

$fpdf->SetXY(140,70);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(70,5,$buyer->state_code,0,1);

$fpdf->SetXY(140,75);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(70,5,$buyer->phone_number,0,1);

$fpdf->Ln(10);


$fpdf->SetTextColor(192,192,192);
$fpdf->SetFont("Courier","B", 11);
$fpdf->Cell(80,5,"Product Name",0,0, "L");
$fpdf->Cell(40,5,"Quantity",0,0, "C");
$fpdf->Cell(20,5,"Price",0,0, "C");
$fpdf->Cell(40,5,"Total",0,1, "C");


$total = 0;
        $fpdf->setFillColor(192,192,192);
    $fpdf->SetFont("Courier","B", 11);
        $fpdf->SetTextColor(0,3,0);
        $fpdf->Ln(1);
        $fpdf->Cell(80,8,$product->product_name,0,0, "L", TRUE);
        
        $fpdf->Cell(40,8,$order->quantity,0,0, "C", TRUE);
        
    $fpdf->Cell(20,8,"N".number_format($order->product_price),0,0, "C",TRUE);

    $fpdf->Cell(40,8,"N".number_format($order->quantity * $order->product_price),0,1, "C",TRUE);
    $sub = $order->product_price * $order->quantity;
    $total += $sub;
    

$fpdf->Ln(3);

$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(192,192,192);
$fpdf->Cell(140,5,"Sub Total",0,0,"R");

$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(30,5,"N".number_format($total),0,1, "R");

$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(192,192,192);
$fpdf->Cell(140,5,"Shipping and Handling",0,0,"R");

$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(23,5,"------",0,1, "R");


$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(192,192,192);
$fpdf->Cell(140,5,"Tax",0,0,"R");

$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(24,5,"N0.00",0,1, "R");

$fpdf->SetTextColor(255,255,255);
$fpdf->setFillColor(255,0,255);
$fpdf->SetFont("Courier","B", 11);
$fpdf->Cell(140,10,"Total",0,0,"R", TRUE);
    

$fpdf->setFillColor(255,0,205);
$fpdf->SetFont("Courier","B", 11);
$fpdf->SetTextColor(255,255,255);
$fpdf->Cell(29,10,"N".number_format($total),0,1, "R",TRUE);
$fpdf->Ln(4);


$fpdf->SetFont("Courier","B", 20);
$fpdf->SetTextColor(192,192,192);
$fpdf->Cell(10,5,"Shop Details",0,1,"L");
$fpdf->Ln(3);

$fpdf->SetTextColor(192,192,192);
$fpdf->SetFont("Courier","B", 10);
$fpdf->Cell(40,5,":Name",0,0);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(50,5,$shop->shop_name,0,1);

$fpdf->SetTextColor(192,192,192);
$fpdf->SetFont("Courier","B", 10);
$fpdf->Cell(40,5,":Phone Number ",0,0);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(50,5,$shop->shop_phone_number,0,1);

$fpdf->SetTextColor(192,192,192);
$fpdf->SetFont("Courier","B", 10);
$fpdf->Cell(40,5,":Address",0,0);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(10,5,$shop->shop_address,0,1);

$fpdf->SetTextColor(192,192,192);
$fpdf->SetFont("Courier","B", 10);
$fpdf->Cell(40,5,":Field",0,0);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(50,5,$shop->shop_specialist,0,1);

$fpdf->SetTextColor(192,192,192);
$fpdf->SetFont("Courier","B", 10);
$fpdf->Cell(40,5,":Own By",0,0);
$fpdf->SetTextColor(0,3,0);
$fpdf->Cell(50,5,$seller->name.' '.$seller->state_code,0,1);










              $fpdf->Output();
              exit();
        }else{

            return redirect('/dashboard')->with('error', 'Invalid User');

        }


    }














}
