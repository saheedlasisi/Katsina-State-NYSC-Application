<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/sheet', function () {
 //    $text = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.strtolower('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
 //    $text_shuff = str_shuffle($text);
	// $half = substr($text_shuff, 7, 4);

	// $num = '1234567890';
 //    $num_shuff = str_shuffle($num);
	// $num_half = substr($num_shuff, 7, 4);

	// $date = date('hi');

	//return $ticket = '#'.$half.'-'.$num_half.'-'.$date;
//return bcrypt('opeyemi');
	//return date('is');

});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::post('/updatepassword', 'DashboardController@updatepassword')->name('user.updatepassword');
Route::post('/addviewinformation', 'DashboardController@addviewinformation')->name('user.addviewinformation');
Route::post('/addviewlecture', 'DashboardController@addviewlecture')->name('user.addviewlecture');
Route::post('/addquestion', 'DashboardController@addquestion')->name('user.addquestion');

Route::post('/deletequestion', 'DashboardController@deletequestion')->name('user.deletequestion');
Route::post('/loadquestion', 'DashboardController@loadquestion')->name('user.loadquestion');
Route::post('/countquestion', 'DashboardController@countquestion')->name('user.countquestion');
Route::post('/userstatus', 'DashboardController@userstatus')->name('user.userstatus');
Route::get('/corpsmembers', 'CorpsMembersController@index')->name('user.corpsmembers');
Route::post('/loadcorpsmembers', 'CorpsMembersController@load')->name('user.loadcorpsmembers');
Route::get('/corpsmemberprofile/{name}/{id}', 'CorpsMembersController@profile')->name('user.corpsmemberprofile');
Route::get('/myprofile/{name}/{id}', 'MyProfileController@index')->name('user.myprofile');
Route::get('/editmyprofile/{name}/{id}', 'MyProfileController@editmyprofile')->name('user.editmyprofile');
Route::post('/usersuploadphoto', 'MyProfileController@usersuploadphoto')->name('user.usersuploadphoto');
Route::post('/getonlinestatus', 'CorpsMembersController@getonlinestatus')->name('user.getonlinestatus');
Route::post('/updatemyprofile', 'MyProfileController@updatemyprofile')->name('user.updatemyprofile');
Route::post('/uploadphoto', 'MyProfileController@uploadphoto')->name('user.uploadphoto');
Route::post('/addeducation', 'MyProfileController@addeducation')->name('user.addeducation');
Route::post('/addaward', 'MyProfileController@addaward')->name('user.addaward');
Route::post('/addwork', 'MyProfileController@addwork')->name('user.addwork');
Route::post('/addskill', 'MyProfileController@addskill')->name('user.addskill');
Route::post('/fetcheducation', 'MyProfileController@fetcheducation')->name('user.fetcheducation');
Route::post('/deleteeducation', 'MyProfileController@deleteeducation')->name('user.deleteeducation');
Route::post('/fetchaward', 'MyProfileController@fetchaward')->name('user.fetchaward');
Route::post('/deleteaward', 'MyProfileController@deleteaward')->name('user.deleteaward');
Route::post('/fetchwork', 'MyProfileController@fetchwork')->name('user.fetchwork');
Route::post('/deletework', 'MyProfileController@deletework')->name('user.deletework');
Route::post('/fetchskill', 'MyProfileController@fetchskill')->name('user.fetchskill');
Route::post('/deleteskill', 'MyProfileController@deleteskill')->name('user.deleteskill');
Route::post('/changeimage', 'MyProfileController@changeimage')->name('user.changeimage');
Route::post('/sendrequest', 'CorpsMembersController@sendrequest')->name('user.sendrequest');
Route::post('/cancelrequest', 'CorpsMembersController@cancelrequest')->name('user.cancelrequest');
Route::post('/acceptrequest', 'CorpsMembersController@acceptrequest')->name('user.acceptrequest');Route::post('/acceptrequest2', 'CorpsMembersController@acceptrequest2')->name('user.acceptrequest2');
Route::post('/declinerequest', 'CorpsMembersController@declinerequest')->name('user.declinerequest');
Route::post('/declinerequest2', 'CorpsMembersController@declinerequest2')->name('user.declinerequest2');
Route::post('/fetchrequest', 'CorpsMembersController@fetchrequest')->name('user.fetchrequest');
Route::post('/unfriend', 'CorpsMembersController@unfriend')->name('user.unfriend');
Route::post('/sendmessage', 'CorpsMembersController@sendmessage')->name('user.sendmessage');
Route::post('/fetchmessage', 'CorpsMembersController@fetchmessage')->name('user.fetchmessage');
Route::get('/chats', 'CorpsMembersController@chats')->name('user.chats');
Route::post('/chatusers', 'CorpsMembersController@chatusers')->name('user.chatusers');
Route::post('/getchatuserinfo', 'CorpsMembersController@getchatuserinfo')->name('user.getchatuserinfo');
Route::post('/getourchat', 'CorpsMembersController@getourchat')->name('user.getourchat');
Route::post('/submitourchat', 'CorpsMembersController@submitourchat')->name('user.submitourchat');
Route::post('/deletemychat', 'CorpsMembersController@deletemychat')->name('user.deletemychat');
Route::get('/market', 'MarketController@index')->name('user.market');
Route::post('/createshop', 'MarketController@create')->name('user.createshop');
Route::get('/shop/{name}/{id}', 'MarketController@shop')->name('user.shop');
Route::get('/myshop/{name}/{id}', 'MarketController@myshop')->name('user.myshop');
Route::post('/likeshop', 'MarketController@likeshop')->name('user.likeshop');
Route::post('/unlikeshop', 'MarketController@unlikeshop')->name('user.unlikeshop');
Route::post('/addreview', 'MarketController@addreview')->name('user.addreview');
Route::post('/getreview', 'MarketController@getreview')->name('user.getreview');
Route::post('/loadreply', 'MarketController@loadreply')->name('user.loadreply');
Route::post('/reviewyes', 'MarketController@reviewyes')->name('user.reviewyes');
Route::post('/deletemyshopreview', 'MarketController@deletemyshopreview')->name('user.deletemyshopreview');
Route::post('/reviewno', 'MarketController@reviewno')->name('user.reviewno');
Route::post('/reviewreplyyes', 'MarketController@reviewreplyyes')->name('user.reviewreplyyes');
Route::post('/reviewreplyno', 'MarketController@reviewreplyno')->name('user.reviewreplyno');
Route::post('/addreviewreply', 'MarketController@addreviewreply')->name('user.addreviewreply');
Route::get('/editshop/{name}/{id}', 'MarketController@editshop')->name('user.editshop');
Route::post('/updateshop', 'MarketController@updateshop')->name('user.updateshop');
Route::post('/changeshopimage', 'MarketController@changeshopimage')->name('user.changeshopimage');
Route::post('/addshopaward', 'MarketController@addshopaward')->name('user.addshopaward');
Route::post('/fetchshopaward', 'MarketController@fetchshopaward')->name('user.fetchshopaward');
Route::post('/deleteshopaward', 'MarketController@deleteshopaward')->name('user.deleteshopaward');
Route::post('/deleteshop', 'MarketController@deleteshop')->name('user.deleteshop');
Route::post('/addsendshopmessage', 'MarketController@addsendshopmessage')->name('user.addsendshopmessage');
Route::post('/addshopcall', 'MarketController@addshopcall')->name('user.addshopcall');
Route::post('/addusercall', 'MarketController@addusercall')->name('user.addusercall');
Route::post('/adduserwhatsapp', 'MarketController@adduserwhatsapp')->name('user.adduserwhatsapp');
Route::post('/replyshopmessage', 'MarketController@replyshopmessage')->name('user.replyshopmessage');
Route::post('/clearcallstatus', 'MyProfileController@clearcallstatus')->name('user.clearcallstatus');
Route::post('/clearwhatsappstatus', 'MyProfileController@clearwhatsappstatus')->name('user.clearwhatsappstatus');
Route::post('/deletemyphoto', 'MyProfileController@deletemyphoto')->name('user.deletemyphoto');

Route::post('/clearshopcallstatus', 'MarketController@clearshopcallstatus')->name('user.clearshopcallstatus');
Route::post('/clearshopmessagestatus', 'MarketController@clearshopmessagestatus')->name('user.clearshopmessagestatus');
Route::get('/shops', 'MarketController@shops')->name('user.shops');
Route::post('/fetchshops', 'MarketController@fetchshops')->name('user.fetchshops');
Route::post('/createproduct', 'ShopProductController@store')->name('user.createproduct');
Route::post('/fetchproducts', 'ShopProductController@fetch')->name('user.fetchproducts');
Route::get('/product/{name}/{id}', 'ShopProductController@product')->name('user.product');
Route::get('/myproduct/{name}/{id}', 'ShopProductController@myproduct')->name('user.myproduct');
Route::post('/ckeditorupload', 'ShopProductController@ckeditorupload')->name('user.ckeditorupload');
Route::get('/editproduct/{name}/{id}', 'ShopProductController@editproduct')->name('user.editproduct');
Route::get('/deleteproduct/{pid}/{sid}', 'ShopProductController@deleteproduct')->name('user.deleteproduct');
Route::get('/orderreceipt/{id}/{seller}/{product}/{shop}/{buyer}', 'ShopProductController@orderreceipt')->name('user.orderreceipt');
Route::get('/myorderreceipt/{id}/{seller}/{product}/{shop}/{buyer}', 'ShopProductController@myorderreceipt	')->name('user.myorderreceipt	');
Route::post('/updateproduct', 'ShopProductController@updateproduct')->name('user.updateproduct');
Route::post('/changeproductimage', 'ShopProductController@changeproductimage')->name('user.changeproductimage');
Route::post('/loveproduct', 'ShopProductController@loveproduct')->name('user.loveproduct');
Route::post('/unloveproduct', 'ShopProductController@unloveproduct')->name('user.unloveproduct');
Route::post('/placeorder', 'ShopProductController@placeorder')->name('user.placeorder');
Route::post('/ordercomplete', 'MarketController@ordercomplete')->name('user.ordercomplete');
Route::post('/orderyes', 'MarketController@orderyes')->name('user.orderyes');
Route::post('/clearcompletenotify', 'MarketController@clearcompletenotify')->name('user.clearcompletenotify');




Route::get('/saeds', 'UserSaedSessionController@index')->name('user.saeds');
Route::post('/fetchsession', 'UserSaedSessionController@fetchsession')->name('user.fetchsession');
Route::get('/saed/{name}/{id}', 'UserSaedSessionController@saed')->name('user.saed');
Route::post('/saedenroll', 'UserSaedSessionController@saedenroll')->name('user.saedenroll');
Route::post('/saedunenroll', 'UserSaedSessionController@saedunenroll')->name('user.saedunenroll');
Route::post('/addsaedreview', 'UserSaedSessionController@addsaedreview')->name('user.addsaedreview');
Route::post('/fetchsaedreview', 'UserSaedSessionController@fetchsaedreview')->name('user.fetchsaedreview');
Route::post('/deletesaedreview', 'UserSaedSessionController@deletesaedreview')->name('user.deletesaedreview');
Route::post('/bringsaedlecture', 'UserSaedSessionController@bringsaedlecture')->name('user.bringsaedlecture');
Route::post('/addsaedlecturequestion', 'UserSaedSessionController@addsaedlecturequestion')->name('user.addsaedlecturequestion');
Route::post('/bringsaedlecturequestion', 'UserSaedSessionController@bringsaedlecturequestion')->name('user.bringsaedlecturequestion');
Route::post('/deletesaedlecturequestion', 'UserSaedSessionController@deletesaedlecturequestion')->name('user.deletesaedlecturequestion');
Route::post('/addebookview', 'UserSaedSessionController@addebookview')->name('user.addebookview');
Route::post('/sendsessionchat', 'UserSaedSessionController@sendsessionchat')->name('user.sendsessionchat');
Route::post('/fetchsessionchat', 'UserSaedSessionController@fetchsessionchat')->name('user.fetchsessionchat');
Route::post('/deletesessionchat', 'UserSaedSessionController@deletesessionchat')->name('user.deletesessionchat');






















Route::get('/test', 'MainController@Test');
Route::get('/about', 'MainController@About');
Route::get('/cdsproject', 'MainController@CdsList');
Route::get('/cds/{name}/{id}', 'MainController@Cds');
Route::get('/transportation', 'MainController@transportation');
Route::get('/', 'MainController@index');
Route::get('/browseticket', 'MainController@OpenTicket');
Route::get('/helpdesk', 'MainController@HelpDesk');
Route::post('/deliverticket', 'MainController@DeliverTIcket');
Route::post('/trackticket', 'MainController@TrackTicket');
Route::get('/showticket/{id}', 'MainController@ShowTicket');
Route::post('/getchats', 'MainController@GetChats');
Route::post('/sendhelp', 'MainController@SendHelp');
Route::post('/closeticket', 'MainController@CloseTicket');
Route::post('/getstates', 'MainController@GetStates');
Route::post('/getadmindetails', 'MainController@GetAdminDetails');
Route::get('/bloglist', 'MainController@BlogList');
Route::get('/blog/{title}', 'MainController@Blog');
Route::post('/guestcomment', 'MainController@QuestComment')->name('guestcomment');
Route::post('/getcomment', 'MainController@GetComment')->name('getcomment');
Route::post('/countcomment', 'MainController@CountComment')->name('countcomment');
Route::post('/usercomment', 'MainController@UserComment')->name('usercomment');
Route::post('/ckeditorupload', 'MainController@ckeditorupload')->name('main.ckeditorupload');
Route::post('/getyear', 'MainController@getYear');
Route::post('/contactme', 'MainController@ContactMe');
Route::post('/searchblog', 'MainController@SearchBlog')->name('main.searchblog');
Route::post('/searchcds', 'MainController@SearchCds')->name('main.searchcds');





//StaffAuth

Route::group(['prefix'=>'staff'], function() {


// Login Routes...
Route::get('login', ['as' => 'staff.login', 'uses' => 'StaffAuth\LoginController@showLoginForm']);
 Route::post('login', ['uses' => 'StaffAuth\LoginController@login']);
 Route::post('logout', ['as' => 'staff.logout', 'uses' => 'StaffAuth\LoginController@logout']);


// Password Reset Routes...
Route::get('password/reset', ['as' => 'staff.password.request', 'uses' => 'StaffAuth\ForgotPasswordController@showLinkRequestForm']);


Route::post('password/email', ['as' => 'staff.password.email', 'uses' => 'StaffAuth\ForgotPasswordController@sendResetLinkEmail']);


Route::get('password/reset/{token}', ['as' => 'staff.password.reset', 'uses' => 'StaffAuth\ResetPasswordController@showResetForm']);


Route::post('password/reset', ['uses' => 'StaffAuth\ResetPasswordController@reset']);


//Dashnoard
Route::get('dashboard', ['as' => 'staff.dashboard', 'uses' => 'StaffDashboardController@index']);


Route::get('profilesettings', ['as' => 'staff.profilesettings', 'uses' => 'StaffDashboardController@profilesettings']);

Route::post('updateprofile', ['as' => 'staff.updateprofile', 'uses' => 'StaffDashboardController@updateprofile']);

Route::post('updatepassword', ['as' => 'staff.updatepassword', 'uses' => 'StaffDashboardController@updatepassword']);
Route::post('updateprofilepicture', ['as' => 'staff.updateprofilepicture', 'uses' => 'StaffDashboardController@updateprofilepicture']);










//Entering Helpdesk Chat
Route::post('starthelpdeskchat', ['as' => 'staff.starthelpdeskchat', 'uses' => 'StaffDashboardController@StartHelpDeskChat']);

//Showing Helpdesk Chat
Route::get('showhelpdeskchat/{id}', ['as' => 'staff.showhelpdeskchat', 'uses' => 'StaffDashboardController@ShowHelpDeskChat']);


//Loading Ticket Chats
Route::post('loadhelpdeskchat', ['as' => 'staff.loadhelpdeskchat', 'uses' => 'StaffDashboardController@LoadHelpDeskChat']);

//Sending Ticket Chats
Route::post('replyticket', ['as' => 'staff.replyticket', 'uses' => 'StaffDashboardController@ReplyTicket']);

//Hostel Allocation
Route::get('hostelallocation', ['as' => 'staff.hostelallocation', 'uses' => 'HostelAllocationController@index']);

//Hostel Allocation Insertion
Route::post('hostelallocationinsertion', ['as' => 'staff.hostelallocationinsertion', 'uses' => 'HostelAllocationController@store']);

//Geting adminInfo
Route::post('getadmininfo', ['as' => 'staff.getadmininfo', 'uses' => 'HostelAllocationController@getadmininfo']);


//fetching corpers for hostel allocation
Route::post('fetchcorperforallocation', ['as' => 'staff.fetchcorperforallocation', 'uses' => 'HostelAllocationController@fetchcorperforallocation']);

//fetching  male corpers allocated
Route::post('fetchmalecorperallocated', ['as' => 'staff.fetchmalecorperallocated', 'uses' => 'HostelAllocationController@fetchmalecorperallocated']);

//fetching  male corpers allocated
Route::post('fetchfemalecorperallocated', ['as' => 'staff.fetchfemalecorperallocated', 'uses' => 'HostelAllocationController@fetchfemalecorperallocated']);

//removing male corpers allocated
Route::post('removemalecorperallocated', ['as' => 'staff.removemalecorperallocated', 'uses' => 'HostelAllocationController@removemalecorperallocated']);

//removing female corpers allocated
Route::post('removefemalecorperallocated', ['as' => 'staff.removefemalecorperallocated', 'uses' => 'HostelAllocationController@removefemalecorperallocated']);




});


















//ObsAuth

Route::group(['prefix'=>'obs'], function() {


// Login Routes...
Route::get('login', ['as' => 'obs.login', 'uses' => 'ObsAuth\LoginController@showLoginForm']);

 Route::post('login', ['uses' => 'ObsAuth\LoginController@login']);

 Route::post('logout', ['as' => 'obs.logout', 'uses' => 'ObsAuth\LoginController@logout']);


// Password Reset Routes...
Route::get('password/reset', ['as' => 'obs.password.request', 'uses' => 'ObsAuth\ForgotPasswordController@showLinkRequestForm']);


Route::post('password/email', ['as' => 'obs.password.email', 'uses' => 'ObsAuth\ForgotPasswordController@sendResetLinkEmail']);


Route::get('password/reset/{token}', ['as' => 'obs.password.reset', 'uses' => 'ObsAuth\ResetPasswordController@showResetForm']);


Route::post('password/reset', ['uses' => 'ObsAuth\ResetPasswordController@reset']);

//Dashboard
Route::get('dashboard', ['as' => 'obs.dashboard', 'uses' => 'ObsDashboardController@index']);
Route::get('registersaedmaster', ['as' => 'obs.registersaedmaster', 'uses' => 'ObsDashboardController@registersaedmaster']);
Route::post('storesaedmaster', ['as' => 'obs.storesaedmaster', 'uses' => 'ObsDashboardController@storesaedmaster']);
Route::post('deletesaedmaster', ['as' => 'obs.deletesaedmaster', 'uses' => 'ObsDashboardController@deletesaedmaster']);
Route::get('profilesetting', ['as' => 'obs.profilesetting', 'uses' => 'ObsDashboardController@profilesetting']);
Route::post('updateprofile', ['as' => 'obs.updateprofile', 'uses' => 'ObsDashboardController@updateprofile']);
Route::post('changeimage', ['as' => 'obs.changeimage', 'uses' => 'ObsDashboardController@changeimage']);
Route::post('updatepassword', ['as' => 'obs.updatepassword', 'uses' => 'ObsDashboardController@updatepassword']);

Route::post('ckeditorupload', ['as' => 'obs.ckeditorupload', 'uses' => 'ObsDashboardController@ckeditorupload']);




//Obs Blog System
Route::get('blog', ['as' => 'obs.blog', 'uses' => 'ObsBlogController@index']);
Route::get('category', ['as' => 'obs.category', 'uses' => 'ObsBlogController@category']);
Route::post('addcategory', ['as' => 'obs.addcategory', 'uses' => 'ObsBlogController@addcategory']);
Route::post('getcategory', ['as' => 'obs.getcategory', 'uses' => 'ObsBlogController@getcategory']);
Route::post('removecategory', ['as' => 'obs.removecategory', 'uses' => 'ObsBlogController@removecategory']);
Route::post('updatecategory', ['as' => 'obs.updatecategory', 'uses' => 'ObsBlogController@updatecategory']);
Route::get('addblog', ['as' => 'obs.addblog', 'uses' => 'ObsBlogController@addblog']);
Route::post('postblog', ['as' => 'obs.postblog', 'uses' => 'ObsBlogController@postblog']);
Route::post('getblogcategories', ['as' => 'obs.getblogcategories', 'uses' => 'ObsBlogController@getblogcategories']);
Route::post('inactiveblog', ['as' => 'obs.inactiveblog', 'uses' => 'ObsBlogController@inactiveblog']);
Route::post('activateblog', ['as' => 'obs.activateblog', 'uses' => 'ObsBlogController@activateblog']);
Route::post('deleteblog', ['as' => 'obs.deleteblog', 'uses' => 'ObsBlogController@deleteblog']);
Route::get('editblog/{title}', ['as' => 'obs.editblog', 'uses' => 'ObsBlogController@editblog']);
Route::post('updateblog', ['as' => 'obs.updateblog', 'uses' => 'ObsBlogController@updateblog']);
Route::post('updateblogimage', ['as' => 'obs.updateblogimage', 'uses' => 'ObsBlogController@updateblogimage']);

//End of blog

//Information
Route::get('information', ['as' => 'obs.information', 'uses' => 'ObsInformationController@index']);

Route::post('getdetailsforinfo', ['as' => 'obs.getdetailsforinfo', 'uses' => 'ObsInformationController@getdetailsforinfo']);

Route::post('storeinformation', ['as' => 'obs.storeinformation', 'uses' => 'ObsInformationController@store']);

Route::post('getinformation', ['as' => 'obs.getinformation', 'uses' => 'ObsInformationController@getinformation']);


Route::post('deleteinformation', ['as' => 'obs.deleteinformation', 'uses' => 'ObsInformationController@delete']);



Route::post('updateinformation', ['as' => 'obs.updateinformation', 'uses' => 'ObsInformationController@update']);



//Lectures
Route::get('lectures', ['as' => 'obs.lectures', 'uses' => 'ObsLectureController@index']);
Route::get('addlecture', ['as' => 'obs.addlecture', 'uses' => 'ObsLectureController@create']);
Route::post('storelecture', ['as' => 'obs.storelecture', 'uses' => 'ObsLectureController@store']);
Route::post('fetchlecture', ['as' => 'obs.fetchlecture', 'uses' => 'ObsLectureController@fetch']);
Route::get('showlecture/{id}', ['as' => 'obs.showlecture', 'uses' => 'ObsLectureController@show']);
Route::post('updatelecture', ['as' => 'obs.updatelecture', 'uses' => 'ObsLectureController@update']);
Route::post('replylecturequestion', ['as' => 'obs.replylecturequestion', 'uses' => 'ObsLectureController@reply']);
Route::post('removelecture', ['as' => 'obs.removelecture', 'uses' => 'ObsLectureController@delete']);



//Cds Project
Route::get('cds', ['as' => 'obs.cds', 'uses' => 'ObsCdsProjectController@index']);
Route::get('createcds', ['as' => 'obs.createcds', 'uses' => 'ObsCdsProjectController@create']);
Route::post('storecds', ['as' => 'obs.storecds', 'uses' => 'ObsCdsProjectController@store']);
Route::get('editcds/{id}', ['as' => 'obs.editcds', 'uses' => 'ObsCdsProjectController@edit']);
Route::post('updatecds', ['as' => 'obs.updatecds', 'uses' => 'ObsCdsProjectController@update']);
Route::post('updatecdsimage', ['as' => 'obs.updatecdsimage', 'uses' => 'ObsCdsProjectController@updateimage']);
Route::post('uploadcdsslideimage', ['as' => 'obs.uploadcdsslideimage', 'uses' => 'ObsCdsProjectController@uploadcdsslideimage']);
Route::post('deletecdsslideimage', ['as' => 'obs.deletecdsslideimage', 'uses' => 'ObsCdsProjectController@deletecdsslideimage']);
Route::post('deletecds', ['as' => 'obs.deletecds', 'uses' => 'ObsCdsProjectController@deletecds']);


//Corpsmember
Route::get('corpsmembers', ['as' => 'obs.corpsmembers', 'uses' => 'ObsUpdateUserController@index']);
Route::post('fetchcorpsmembers', ['as' => 'obs.fetchcorpsmembers', 'uses' => 'ObsUpdateUserController@fetch']);
Route::post('updatecorpsmember', ['as' => 'obs.updatecorpsmember', 'uses' => 'ObsUpdateUserController@update']);

//Slide

Route::get('slide', ['as' => 'obs.slide', 'uses' => 'HomeSlideController@index']);
Route::get('createslide', ['as' => 'obs.createslide', 'uses' => 'HomeSlideController@create']);
Route::post('storeslide', ['as' => 'obs.storeslide', 'uses' => 'HomeSlideController@store']);
Route::post('deleteslide', ['as' => 'obs.deleteslide', 'uses' => 'HomeSlideController@delete']);


//Shop
Route::get('shops', ['as' => 'obs.shops', 'uses' => 'ObsUpdateUserShopController@index']);
Route::post('fetchshops', ['as' => 'obs.fetchshops', 'uses' => 'ObsUpdateUserShopController@fetch']);
Route::post('activateshop', ['as' => 'obs.activateshop', 'uses' => 'ObsUpdateUserShopController@activate']);

Route::post('deactivateshop', ['as' => 'obs.deactivateshop', 'uses' => 'ObsUpdateUserShopController@deactivate']);


//Session
Route::get('session', ['as' => 'obs.session', 'uses' => 'ObsUpdateSessionController@index']);
Route::post('fetchsession', ['as' => 'obs.fetchsession', 'uses' => 'ObsUpdateSessionController@fetch']);

Route::post('activatesession', ['as' => 'obs.activatesession', 'uses' => 'ObsUpdateSessionController@activate']);

Route::post('deactivatesession', ['as' => 'obs.deactivatesession', 'uses' => 'ObsUpdateSessionController@deactivate']);












});



































//AdminAuth

Route::group(['prefix'=>'admin'], function() {


// Login Routes...
Route::get('login', ['as' => 'admin.login', 'uses' => 'AdminAuth\LoginController@showLoginForm']);

 Route::post('login', ['uses' => 'AdminAuth\LoginController@login']);

 Route::post('logout', ['as' => 'admin.logout', 'uses' => 'AdminAuth\LoginController@logout']);


// Password Reset Routes...
Route::get('password/reset', ['as' => 'admin.password.request', 'uses' => 'AdminAuth\ForgotPasswordController@showLinkRequestForm']);


Route::post('password/email', ['as' => 'admin.password.email', 'uses' => 'AdminAuth\ForgotPasswordController@sendResetLinkEmail']);


Route::get('password/reset/{token}', ['as' => 'admin.password.reset', 'uses' => 'AdminAuth\ResetPasswordController@showResetForm']);


Route::post('password/reset', ['uses' => 'AdminAuth\ResetPasswordController@reset']);



//Dashboard
Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'AdminDashboardController@index']);

//Obs System
Route::get('obs', ['as' => 'admin.obs', 'uses' => 'AdminObsSystemController@index']);

Route::post('fetchcorps', ['as' => 'admin.fetchcorps', 'uses' => 'AdminObsSystemController@fetch']);

Route::post('storeobs', ['as' => 'admin.storeobs', 'uses' => 'AdminObsSystemController@store']);
Route::post('obstable', ['as' => 'admin.obstable', 'uses' => 'AdminObsSystemController@obstable']);

Route::post('revomeobsuser', ['as' => 'admin.revomeobsuser', 'uses' => 'AdminObsSystemController@destroy']);




});





















//SaedMasterAuth

Route::group(['prefix'=>'saedmaster'], function() {


// Login Routes...
Route::get('login', ['as' => 'saedmaster.login', 'uses' => 'SaedMasterAuth\LoginController@showLoginForm']);

 Route::post('login', ['uses' => 'SaedMasterAuth\LoginController@login']);

 Route::post('logout', ['as' => 'saedmaster.logout', 'uses' => 'SaedMasterAuth\LoginController@logout']);


// Password Reset Routes...
Route::get('password/reset', ['as' => 'saedmaster.password.request', 'uses' => 'SaedMasterAuth\ForgotPasswordController@showLinkRequestForm']);


Route::post('password/email', ['as' => 'saedmaster.password.email', 'uses' => 'SaedMasterAuth\ForgotPasswordController@sendResetLinkEmail']);


Route::get('password/reset/{token}', ['as' => 'saedmaster.password.reset', 'uses' => 'SaedMasterAuth\ResetPasswordController@showResetForm']);


Route::post('password/reset', ['uses' => 'SaedMasterAuth\ResetPasswordController@reset']);

//Dashnoard
Route::get('dashboard', ['as' => 'saedmaster.dashboard', 'uses' => 'SaedMasterDashboardController@index']);
Route::get('profilesetting', ['as' => 'saedmaster.profilesetting', 'uses' => 'SaedMasterDashboardController@profilesetting']);
Route::post('updateprofile', ['as' => 'saedmaster.updateprofile', 'uses' => 'SaedMasterDashboardController@updateprofile']);

Route::post('changeimage', ['as' => 'saedmaster.changeimage', 'uses' => 'SaedMasterDashboardController@changeimage']);
Route::post('updatepassword', ['as' => 'saedmaster.updatepassword', 'uses' => 'SaedMasterDashboardController@updatepassword']);



//Session
Route::get('session', ['as' => 'saedmaster.session', 'uses' => 'SaedSessionController@index']);
Route::post('getadminsession', ['as' => 'saedmaster.getadminsession', 'uses' => 'SaedSessionController@getAdminSession']);
Route::post('sessionupload', ['as' => 'saedmaster.sessionupload', 'uses' => 'SaedSessionController@sessionupload']);
Route::post('deletesession', ['as' => 'saedmaster.deletesession', 'uses' => 'SaedSessionController@deletesession']);

Route::get('saedsession/{name}/{id}', ['as' => 'saedmaster.saedsession', 'uses' => 'SaedSessionController@saedsession']);
Route::post('fetchsaedsessionreview', ['as' => 'saedmaster.fetchsaedsessionreview', 'uses' => 'SaedSessionController@fetchsaedsessionreview']);
Route::post('addsaedlecture', ['as' => 'saedmaster.addsaedlecture', 'uses' => 'SaedSessionController@addsaedlecture']);
Route::post('updatesaedlecture', ['as' => 'saedmaster.updatesaedlecture', 'uses' => 'SaedSessionController@updatesaedlecture']);
Route::post('deletesaedlecture', ['as' => 'saedmaster.deletesaedlecture', 'uses' => 'SaedSessionController@deletesaedlecture']);
Route::post('bringsaedlecturequestion', ['as' => 'saedmaster.bringsaedlecturequestion', 'uses' => 'SaedSessionController@bringsaedlecturequestion']);
Route::post('replysaedlecturequestion', ['as' => 'saedmaster.replysaedlecturequestion', 'uses' => 'SaedSessionController@replysaedlecturequestion']);

Route::post('uploadebook', ['as' => 'saedmaster.uploadebook', 'uses' => 'SaedSessionController@uploadebook']);
Route::post('deletebook', ['as' => 'saedmaster.deletebook', 'uses' => 'SaedSessionController@deletebook']);
Route::post('denyuseraccess', ['as' => 'saedmaster.denyuseraccess', 'uses' => 'SaedSessionController@denyuseraccess']);
Route::post('grantuseraccess', ['as' => 'saedmaster.grantuseraccess', 'uses' => 'SaedSessionController@grantuseraccess']);

Route::post('submitsessionchat', ['as' => 'saedmaster.submitsessionchat', 'uses' => 'SaedSessionController@submitsessionchat']);
Route::post('loadsessionchat', ['as' => 'saedmaster.loadsessionchat', 'uses' => 'SaedSessionController@loadsessionchat']);

Route::post('deletemysessionmsg', ['as' => 'saedmaster.deletemysessionmsg', 'uses' => 'SaedSessionController@deletemysessionmsg']);
Route::post('locksessiongroup', ['as' => 'saedmaster.locksessiongroup', 'uses' => 'SaedSessionController@locksessiongroup']);
Route::post('unlocksessiongroup', ['as' => 'saedmaster.unlocksessiongroup', 'uses' => 'SaedSessionController@unlocksessiongroup']);
Route::post('clearsessionchat', ['as' => 'saedmaster.clearsessionchat', 'uses' => 'SaedSessionController@clearsessionchat']);







});









































