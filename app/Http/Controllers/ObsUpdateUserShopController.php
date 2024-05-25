<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserShop;

class ObsUpdateUserShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('obs');
    }


    public function index(){

    	$title = "Shops";

    	return view('ObsPages.shops')->with('title', $title);
    }



public function fetch(Request $request){

	if ($request->ajax()) {
		
		if ($request->shop_name != '') {
	$shops = UserShop::orderBy('shop_account_status', 'desc')->join('users', 'users.id', '=', 'shop.user_id')->where('shop_name','LIKE',"%{$request->shop_name}%")->orWhere('shop_auth_id','LIKE',"%{$request->shop_name}%")->get();
		}else{

		$shops = UserShop::orderBy('shop_account_status', 'desc')->join('users', 'users.id', '=', 'shop.user_id')->get();	

		}

		return response($shops);
	}
}


public function activate(Request $request){

	if ($request->ajax()) {

		$shop = UserShop::find($request->shop_id);
		$shop->amount_paid = 1000;
		$shop->shop_account_status = 'active';
		$shop->account_activator_name = auth()->guard('obs')->user()->name;
		$shop->save();

		return response('Now Active');
	}
}




public function deactivate(Request $request){

	if ($request->ajax()) {

		$shop = UserShop::find($request->shop_id);
		$shop->shop_account_status = 'inactive';
		$shop->save();

		return response('Deactivated');
	}
}








}
