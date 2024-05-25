<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Slide;

class HomeSlideController extends Controller
{
       public function __construct()
    {
        $this->middleware('obs');
    }


    public function index(){

    	$title = "Slide";
    	$slides = Slide::orderBy('slide_id', 'desc')->paginate(15);

    	return view('ObsPages.slide')->with('title', $title)->with('slides', $slides);

    }


    public function create(){

    	$title = "Create Slide";

    	return view('ObsPages.createslide')->with('title', $title);
    }



    public function store(Request $request){

    	if ($request->ajax()) {
    		

    	$image_data = $request->image;
		$image_array_1 = explode(";", $image_data);
		$image_array_2 = explode(",", $image_array_1[1]);
		$data = base64_decode($image_array_2[1]);
		$image_name = 'slidepic'.date('Y-M-D').''.time().'.png';
		$upload_path = 'assets/img/slideimage/'.$image_name;
		file_put_contents($upload_path, $data);

    		$slide = new Slide;
    		$slide->slide = $image_name;
    		$slide->save();

    		return response()->json("Uploded Successfully");
    	}
    }





   public function delete(Request $request){

   	if ($request->ajax()) {
   		
   		$slide = Slide::find($request->slide_id);
   		File::delete('assets/img/slideimage/'.$slide->slide);
   		$slide->delete();

   		return response('Deleted');


   	}

   } 






}
