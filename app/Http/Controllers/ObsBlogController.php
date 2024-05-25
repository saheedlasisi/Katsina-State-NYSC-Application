<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Blog;
use response;
use App\Http\Requests;

class ObsBlogController extends Controller
{
      public function __construct()
    {
        $this->middleware('obs');
    }


    public function index(){

    	$title = "Blog";

    	$blogs = Blog::orderBy('b_id', 'desc')->paginate(10);

    	return view('ObsPages.blog')->with('title', $title)->with('blogs', $blogs);

    }


//Category
    public function category(){

    	$title = "Category";

    	return view('ObsPages.category')->with('title', $title);

    }


    public function addcategory(Request $request){
		if ($request->ajax()) {


			$check = Category::where('category_name', $request->category_name)->get();

			if (count($check) > 0 ) {
				return response('This category name you are trying to upload is existing, go on add blog to confirm that, Thanks.');
			}else{

			$cat = new Category;
    	
    		$cat->category_name = $request->category_name;
    		$cat->save();
    		return response('Inserted Successfully');

			}





			
    	}
	}




public function getcategory(Request $request){

if ($request->ajax()) {

$cat = Category::orderBy('c_id', 'desc')->get();

	return response($cat);

}


}



public function removecategory(Request $request){

if ($request->ajax()) {

	$cats = Category::find($request->c_id);
	$cats->delete();

	return response('removed successfully');

}

}


public function updatecategory(Request $request){

if ($request->ajax()) {

			$check = Category::where('category_name', $request->update_category_name)->get();

			if (count($check) > 1 ) {
				return response('This category name you are trying to upload is existing, go on add blog to confirm that, Thanks.');
			}else{

			$cat = Category::find($request->update_c_id);
    		$cat->category_name = $request->update_category_name;
    		$cat->save();
    		return response('Updated Successfully');

			}

}

}


//Category ends here


public function addblog(){


	$title = "Add Blog";

	return view('ObsPages.addblog')->with('title', $title);
}





public function postblog(Request $request){

	if ($request->ajax()) {

		$image_data = $request->image;
		$image_array_1 = explode(";", $image_data);
		$image_array_2 = explode(",", $image_array_1[1]);
		$data = base64_decode($image_array_2[1]);
		$image_name = rand().''.date('YMD').''.time().'.png';
		$upload_path = 'assets/img/blog/'.$image_name;
		file_put_contents($upload_path, $data);

		$blog = new Blog;
		$blog->b_obs_id = auth()->guard('obs')->user()->id;
		$blog->b_image = $image_name;
		$blog->b_title = $request->blog_title;
		$blog->b_content = $request->blog_content;
		$blog->b_c_id = $request->blog_category;
		$blog->user_blog_status = 'active';
		$blog->admin_blog_status = 'active';
		$blog->b_comment = 0;
		
		$blog->save();
		

		// $blog = new Blog;
		// $blog->b_user_id = auth()->guard('obs')->user()->id;
		// $blog->b_image = 'saheed';
		// $blog->b_title = 'saheed';
		// $blog->b_content = 'saheed';
		// $blog->b_c_id = 1;
		// $blog->user_blog_status = 'active';
		// $blog->admin_blog_status = 'active';
		// $blog->save();

		//return response()->json('success');
		return response()->json("Inserted Successfully");


		
		
		
	}


}



public function getblogcategories(Request $request){

if ($request->ajax()) {

$cat = Category::all();

	return response($cat);

}


}

 

public function inactiveblog(Request $request){

if ($request->ajax()) {

Blog::where('b_id',$request->inactive_id)->update(['user_blog_status' => 'inactive']);
return response('success');

}


}




public function activateblog(Request $request){

if ($request->ajax()) {

Blog::where('b_id',$request->activate_id)->update(['user_blog_status' => 'active']);
return response('success');

}


}




public function deleteblog(Request $request){

if ($request->ajax()) {

	$blog = Blog::find($request->delete_id);
	$blog->delete();

return response('success');

}


}




public function editblog($blog_title){

	$title = "Edit Blog";

	$blogs = Blog::where('b_title', $blog_title)->get();

	if (count($blogs) > 0) {
		return view('ObsPages.editblog')->with('title', $title)->with('blogs', $blogs);
	}else {

		return redirect(route('obs.blog'))->with('error', 'Opps!!!, Only Authorized use can edit this post '.$blog_title);
	}

	
}




public function updateblog(Request $request){

	if ($request->ajax()) {
		
		
		$blog = Blog::find($request->edit_blog_id);
		$blog->b_title = $request->edit_blog_title;
		$blog->b_c_id = $request->edit_blog_category;
		$blog->b_content = $request->edit_blog_content;
		$blog->save(); 

		return response(['status'=> 'Updated Successfully', 'title' => $request->edit_blog_title]);
	}
}



public function updateblogimage(Request $request){
	if ($request->ajax()) {

	$blog = Blog::find($request->edit_blog_id);
	 File::delete('assets/img/blog/'.$blog->b_image);

		$image_data = $request->image;
		$image_array_1 = explode(";", $image_data);
		$image_array_2 = explode(",", $image_array_1[1]);
		$data = base64_decode($image_array_2[1]);
		$image_name = rand().''.auth()->guard('obs')->user()->name.''.time().'.png';
		$upload_path = 'assets/img/blog/'.$image_name;
		file_put_contents($upload_path, $data);

		
		$blog->b_image = $image_name;
		$blog->save();
		
		return response()->json("Updated Successfully");
	}
}




}
