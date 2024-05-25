<!DOCTYPE html> 
<html lang="{{ app()->getLocale() }}">
    

<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        
    <title>{{ config('app.name', 'KatsinaStateNysc') }} | {{$title}}</title>

          <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- Favicons -->
        <link type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}" rel="icon">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
<!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.css') }}">
        <!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
           <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">
          <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
          <link rel="stylesheet" href="{{ asset('css/overlay.css') }}">
                <style type="text/css">
            #button_filter{

      display: flex;
      flex-flow: wrap;
      flex-direction: row;

    }

           .modal-body{
    height: 300px;

    overflow-y: auto;
}

@media (min-height: 500px) {
    .modal-body { height: 400px; }
}

@media (min-height: 800px) {
    .modal-body { height: 600px; }
}


.chat-now {
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
}
.chat-now .chat-header {
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
    background-color: #fff;
    border-bottom: 1px solid #f0f0f0;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
    height: 72px;
  justify-content: space-between;
  -webkit-justify-content: space-between;
  -ms-flex-pack: space-between;
    padding: 0 15px;
}
.chat-now .chat-header .back-user-list {
    display: none;
    margin-right: 5px;
    margin-left: -7px;
}
.chat-now .chat-header .media {
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.chat-now .chat-header .media .media-img-wrap {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  margin-right: 15px;
}
.chat-now .chat-header .media .media-img-wrap .avatar {
  height: 50px;
  width: 50px;
}
.chat-now .chat-header .media .media-img-wrap .status {
    border: 2px solid #fff;
    bottom: 0;
    height: 10px;
    position: absolute;
    right: 3px;
    width: 10px;
}
.chat-now .chat-header .media .media-body .user-name {
    color: #272b41;
    font-size: 16px;
    font-weight: 500;
    text-transform: capitalize;
}
.chat-now .chat-header .media .media-body .user-status {
    color: #666;
    font-size: 14px;
}
.chat-now .chat-header .chat-options {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}
.chat-now .chat-header .chat-options > a {
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
    border-radius: 50%;
    color: #8a8a8a;
  display: -webkit-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
    height: 30px;
  justify-content: center;
  -webkit-justify-content: center;
  -ms-flex-pack: center;
    margin-left: 10px;
    width: 30px;
}
.chat-now .chat-body {
    background-color: #f5f5f6;
}
.chat-now .chat-body ul.list-unstyled {
    margin: 0 auto;
    padding: 15px;
    width: 100%;
}
.chat-now .chat-body .media .avatar {
    height: 30px;
    width: 30px;
}
.chat-now .chat-body .media .media-body {
  margin-left: 20px;
}
.chat-now .chat-body .media .media-body .msg-box > div {
  padding: 10px 15px;
  border-radius: .25rem;
  display: inline-block;
  position: relative;
}
.chat-now .chat-body .media .media-body .msg-box > div p {
    color: #272b41;
    margin-bottom: 0;
}
.chat-now .chat-body .media .media-body .msg-box + .msg-box {
  margin-top: 5px;
}
.chat-now .chat-body .media.received {
  margin-bottom: 20px;
}
.chat-now .chat-body .media:last-child {
  margin-bottom: 0;
}
.chat-now .chat-body .media.received .media-body .msg-box > div {
  background-color: #fff;
}
.chat-now .chat-body .media.sent {
    margin-bottom: 20px;
}
.chat-now .chat-body .media.sent .media-body {
  -webkit-box-align: flex-end;
  -ms-flex-align: flex-end;
  align-items: flex-end;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  justify-content: flex-end;
  -webkit-justify-content: flex-end;
  -ms-flex-pack: flex-end;
    margin-left: 0;
}
.chat-now .chat-body .media.sent .media-body .msg-box > div {
    background-color: #e3e3e3;
}
.chat-now .chat-body .media.sent .media-body .msg-box > div p {
    color: #272b41;
}
.chat-now .chat-body .chat-date {
    font-size: 14px;
    margin: 1.875rem 0;
    overflow: hidden;
    position: relative;
    text-align: center;
    text-transform: capitalize;
}
.chat-now .chat-body .chat-date:before {
    background-color: #e0e3e4;
    content: "";
    height: 1px;
    margin-right: 28px;
    position: absolute;
    right: 50%;
    top: 50%;
    width: 100%;
}
.chat-now .chat-body .chat-date:after {
    background-color: #e0e3e4;
    content: "";
    height: 1px;
    left: 50%;
    margin-left: 28px;
    position: absolute;
    top: 50%;
    width: 100%;
}
.chat-now .chat-footer {
    background-color: #fff;
    border-top: 1px solid #f0f0f0;
    padding: 10px 15px;
    position: relative;
}
.chat-now .chat-footer .input-group {
    width: 100%;
}
.chat-now .chat-footer .input-group .form-control {
    background-color: #f5f5f6;
    border: none;
    border-radius: 50px;
}
.chat-now .chat-footer .input-group .form-control:focus {
    background-color: #f5f5f6;
    border: none;
    box-shadow: none;
}
.chat-now .chat-footer .input-group .input-group-prepend .btn, 
.chat-now .chat-footer .input-group .input-group-append .btn {
    background-color: transparent;
    border: none;
    color: #9f9f9f;
}
.chat-now .chat-footer .input-group .input-group-append .btn.msg-send-btn {
    background-color: #0de0fe;
    border-color: #0de0fe;
    border-radius: 50%;
    color: #fff;
    margin-left: 10px;
    min-width: 46px;
    font-size: 20px;
}
.msg-typing {
  width: auto;
  height: 24px;
  padding-top: 8px
}
.msg-typing span {
  height: 8px;
  width: 8px;
  float: left;
  margin: 0 1px;
  background-color: #a0a0a0;
  display: block;
  border-radius: 50%;
  opacity: .4
}
.msg-typing span:nth-of-type(1) {
  animation: 1s blink infinite .33333s
}
.msg-typing span:nth-of-type(2) {
  animation: 1s blink infinite .66666s
}
.msg-typing span:nth-of-type(3) {
  animation: 1s blink infinite .99999s
}
.chat-now .chat-body .media.received .media-body .msg-box {
  position: relative;
}
.chat-now .chat-body .media.received .media-body .msg-box:first-child:before {
    border-bottom: 6px solid transparent;
    border-right: 6px solid #fff;
    border-top: 6px solid transparent;
    content: "";
    height: 0;
    left: -6px;
    position: absolute;
    right: auto;
    top: 8px;
    width: 0;
}
.chat-now .chat-body .media.sent .media-body .msg-box {
    padding-left: 50px;
    position: relative;
}
.chat-now .chat-body .media.sent .media-body .msg-box:first-child:before {
  border-bottom: 6px solid transparent;
  border-left: 6px solid #e3e3e3;
  border-top: 6px solid transparent;
    content: "";
    height: 0;
    left: auto;
    position: absolute;
    right: -6px;
    top: 8px;
    width: 0;
}
.chat-msg-info {
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
    clear: both;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    list-style: none;
    padding: 0;
    margin: 5px 0 0;
}
.chat-msg-info li {
    font-size: 13px;
    padding-right: 16px;
    position: relative;
}
.chat-msg-info li:not(:last-child):after {
  position: absolute;
  right: 8px;
  top: 50%;
  content: '';
  height: 4px;
  width: 4px;
  background: #d2dde9;
  border-radius: 50%;
  transform: translate(50%, -50%)
}
.chat-now .chat-body .media.sent .media-body .msg-box .chat-msg-info li:not(:last-child)::after {
    right: auto;
    left: 8px;
    transform: translate(-50%, -50%);
    background: #aaa;
}
.chat-now .chat-body .media.received .media-body .msg-box > div .chat-time {
    color: rgba(50, 65, 72, 0.4);
}
.chat-now .chat-body .media.sent .media-body .msg-box > div .chat-time {
    color: rgba(50, 65, 72, 0.4);
}
.chat-msg-info li a {
  color: #777;
}
.chat-msg-info li a:hover {
  color: #2c80ff
}
.chat-seen i {
  color: #00d285;
  font-size: 16px;
}
.chat-msg-attachments {
  padding: 4px 0;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  width: 100%;
  margin: 0 -1px
}
.chat-msg-attachments > div {
  margin: 0 1px
}
.chat-now .chat-body .media.sent .media-body .msg-box > div .chat-msg-info {
    flex-direction: row-reverse;
}
.chat-now .chat-body .media.sent .media-body .msg-box > div .chat-msg-attachments {
  flex-direction: row-reverse
}
.chat-now .chat-body .media.sent .media-body .msg-box > div .chat-msg-info li {
    padding-left: 16px;
    padding-right: 0;
    position: relative;
}

        </style>
      
    </head>
    <body>
<!-- Main Wrapper -->

@if($title == 'Chats')
  <body class="chat-page">

<div class="overlay"><div class="loader"></div></div>
@else
<div class="main-wrapper">

<div class="overlay"><div class="loader"></div></div>
@endif
        
@include('inc.header')

     @yield('content')



               </div>
       <!-- /Main Wrapper -->
      
        <!-- jQuery -->
             <script src="{{ asset('js/jquery.js') }}"></script>
             <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        
        <!-- Bootstrap Core JS -->
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

            <!-- Sticky Sidebar JS -->
        <script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
        <script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
        
        <!-- Slick JS -->
        <script src="{{ asset('assets/js/slick.js') }}"></script>
      <!-- Fancybox JS -->
    <script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
        <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        
        <!-- Custom JS -->
        <script src="{{ asset('assets/js/script.js') }}"></script>  

        <script src="{{ asset('assets/js/moment.js') }}"></script>
        <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
         <script src="{{ asset('DataTables/datatables.js') }}" defer ></script>
          <script type="text/javascript" src="{{ asset('js/croppie.js') }}"></script>
          <script type="text/javascript" src="{{ asset('css/timeago.js') }}"></script>


    
          <script>
    CKEDITOR.replace('about_me', {
        filebrowserUploadUrl: "{{route('main.ckeditorupload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
  
</script>

          <script>
    CKEDITOR.replace('award_detail');
  
</script>

        <script>
    CKEDITOR.replace('shopaward_detail');
  
</script>


     <script>
    CKEDITOR.replace('about_shop', {
        filebrowserUploadUrl: "{{route('main.ckeditorupload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
  
</script>

<script>
    CKEDITOR.replace('edit_about_shop', {
        filebrowserUploadUrl: "{{route('main.ckeditorupload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
  
</script>

<script>
    CKEDITOR.replace('product_description', {
        filebrowserUploadUrl: "{{route('main.ckeditorupload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

<script>
    CKEDITOR.replace('edit_product_description', {
        filebrowserUploadUrl: "{{route('main.ckeditorupload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

<script>
    CKEDITOR.replace('edit_product_specification');
</script>

<script>
    CKEDITOR.replace('edit_product_keyfeature');
</script>
  


        <script type="text/javascript">
            
            $(document).ready(function(){

//               function function1(){
//   console.log({} + [] + " = {} + []");
// }



//User Status Updated
    setInterval(function(){ UserStatus() }, 1000);
var _tokens = $('input[name=_token]').val();
UserStatus();
  function UserStatus(){
    //function1();
    var _token = $('input[name=_token]').val();

        $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('user.userstatus')}}",
        method:"POST",
        data:{_token:_token},
        success:function(data){

        //console.log(data)
       
            
        }


    })



  }


//View Information

    $('body').delegate('#view_information', 'click', function(e){

        e.preventDefault();
        var info_id = $(this).data('id');
          var info_title = $(this).data('title');
          var info_from = $(this).data('from');
           var info_signed = $(this).data('signed');
           var info_info = $(this).data('info');
           var info_date = $(this).data('date');
          $('#info_modal_title').html(info_title);
            $('#info_title').html(info_title);
             $('#info_from').html(info_from);
              $('#info_signed').html(info_signed);
              $('#info_info').html(info_info);
               $('#info_date').html(moment(info_date).format('DD-MM-YYYY'));
        $('#infoModal').show();

        //views
        // setInterval(function(){ AddandFetchView() }, 5000);

      AddandFetchView();
        function AddandFetchView(){
           var _token = $('input[name=_token]').val();
             $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('user.addviewinformation')}}",
        method:"POST",
        data:{info_id:info_id, _token:_token},
        success:function(data){

        //console.log(data)
         if (data == 0) {
        $('#total_view').html(data+' view');
        
      }else if(data == 1){
        $('#total_view').html(data+' view');
        
      }else{

        $('#total_view').html(data+' views');
        

      }
            
        }


    })
        }

           
  


    });



    $('#infoup').click(function(){
        $('#infoModal').hide();
    });
  
   $('#infodown').click(function(){
        $('#infoModal').hide();
    });





//View Lecture

    $('body').delegate('#view_lecture', 'click', function(e){

  e.preventDefault();
        var lecture_id = $(this).data('id');
        var lecture_topic = $(this).data('topic');
          var lecturer_name = $(this).data('name');
           var lecture_content = $(this).data('content');
           var lecture_date = $(this).data('date');
           var lecture_obs = $(this).data('obs');
          $('#lecture_modal_topic').html(lecture_topic);
            $('#lecture_topic').html(lecture_topic);
             $('#lecturer_name').html(lecturer_name);
              $('#lecture_obs_id').val(lecture_obs);
              $('#lecture_content').html(lecture_content);
              $('#lecture_id').val(lecture_id);
               $('#lecture_date').html(moment(lecture_date).format('DD-MM-YYYY'));
         
        $('#lectureModal').show();


        //views
        // setInterval(function(){ AddandFetchLectureView(), LoadQuestions(), CountQuestion() }, 5000);

        AddandFetchLectureView();
        LoadQuestions();
        CountQuestion();
      
        function AddandFetchLectureView(){
             $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('user.addviewlecture')}}",
        method:"POST",
        data:{lecture_id:lecture_id, _tokens:_tokens},
        success:function(data){

        //console.log(data)
         if (data == 0) {
        $('#lecture_view').html(data+' view');
        
      }else if(data == 1){
        $('#lecture_view').html(data+' view');
        
      }else{

        $('#lecture_view').html(data+' views');
        

      }
            
        }


    })
        }



          //Count Question
     
        function CountQuestion(){
             $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('user.countquestion')}}",
        method:"POST",
        data:{lecture_id:lecture_id,_tokens:_tokens},
        success:function(data){

        //console.log(data)
         if (data == 0) {
        $('#count_question').html(data+' Question');
        
      }else if(data == 1){
        $('#count_question').html(data+' Question');
        
      }else{

        $('#count_question').html(data+' Questions');
        

      }
            
        }


    })
        }



//Questions
        //setInterval(function(){ LoadQuestions() }, 1000);

      
        function LoadQuestions(){
             $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('user.loadquestion')}}",
        method:"POST",
        data:{lecture_id:lecture_id,_tokens:_tokens},
        success:function(data){

        //console.log(data)
         $('#question_list').empty();
         if (data == '') {
            $('#question_list').empty();
            var question_list ='<center><h6>NO RECORD FOUND</h6></center>';
            $('#question_list').append(question_list);
         }else {

    $('#question_list').empty();
     $.each(data, function(i, value){

var my_id = <?php echo auth()->user()->id?>;

   if (value.user_id == my_id) {
var tool = 'data-id="'+value.l_q_id+'" id="delete_my_question" ';
          }else{

            var tool = '';
            
          }


        if (value.reply == '') {


            var question_list = '<li '+tool+'><div class="comment"><div class="comment-author"><img class="avatar" alt="" src="/assets/img/corperimage/'+value.profile_pic+'" ></div><div class="comment-block"><span class="comment-by"><span class="blog-author-name">'+value.user_name+'</span></span><p>'+value.question+'</p><p class="blog-date">'+moment(value.created_at).format('DD-MM-YYYY')+'</p></div></div><ul class="comments-list reply"></ul></li>';

    $('#question_list').append(question_list);

        }else{

            var question_list = '<li '+tool+'><div class="comment"><div class="comment-author"><img class="avatar" alt="" src="/assets/img/corperimage/'+value.profile_pic+'" ></div><div class="comment-block"><span class="comment-by"><span class="blog-author-name">'+value.user_name+'</span></span><p>'+value.question+'</p><p class="blog-date">'+moment(value.created_at).format('DD-MM-YYYY')+'</p><a class="comment-btn" href="javascript:void(0)"><i class="fas fa-reply"></i> Reply</a></div></div><ul class="comments-list reply"><li><div class="comment"><div class="comment-author"><img class="avatar" alt="" src="/assets/img/obsimage/'+value.image+'"></div><div class="comment-block"><span class="comment-by"><span class="blog-author-name">'+value.obs_name+'</span></span><p>'+value.reply+'</p><p class="blog-date">'+moment(value.updated_at).format('DD-MM-YYYY')+'</p></div></div></li></ul></li>';

$('#question_list').append(question_list);


        }



     });


         }
            
        }


    })
        }






$('body').delegate('#delete_my_question', 'click', function(e){

    e.preventDefault();
    var q_id = $(this).data('id');
   

      if (confirm('Are you sure of this?')) {

      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.deletequestion')}}",
    method:"POST",
    data:{q_id:q_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    //alert(data);
    LoadQuestions();
    
      
    }


  })

  }


});



$('body').delegate('#add_question_btn', 'click', function(e){

        e.preventDefault()

        var lecture_question =  $('#lecture_question').val();
        var lecture_obs_id =  $('#lecture_obs_id').val();
         var lecture_id =  $('#lecture_id').val();

        if (lecture_question == '') {

            alert('Opps, The question Box is empty');
        }else{

            if (confirm("Are you sure?")) {

              $('.overlay').show();

                $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('user.addquestion')}}",
        method:"POST",
        data:{lecture_question:lecture_question,lecture_obs_id:lecture_obs_id, lecture_id:lecture_id,_tokens:_tokens},
        success:function(data){

        //console.log(data)
        $('.overlay').hide();
        alert(data);

        $('#lecture_question').val('');
        LoadQuestions();
            
        }


    })

    

            }
        }


    });











    });

      $('#lectureup').click(function(){
        $('#lectureModal').hide();
    });
  
   $('#lecturedown').click(function(){
        $('#lectureModal').hide();
    });



   



   //Loading and Searching Corps Members
   LoadCorpsMembers();
   function LoadCorpsMembers(corpsmember_name=''){



    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('user.loadcorpsmembers')}}",
        method:"POST",
        data:{corpsmember_name:corpsmember_name,_tokens:_tokens},
        success:function(data){

        //console.log(data)
$('#total_corps').html(data.total);
$('#corpsmembers_list').empty();
        if (data.corps == '') {
$('#corpsmembers_list').empty();
          var corpsmembers_list = '<center><h6>NO RECORD FOUND</h6></center>';

    $('#corpsmembers_list').append(corpsmembers_list);

        }else{

             $('#corpsmembers_list').empty();
     $.each(data.corps, function(i, value){


var corpsmembers_list = '<div class="card"><div class="card-body"><div class="doctor-widget"><div class="doc-info-left"><div class="doctor-img"><a href="/corpsmemberprofile/'+value.name+'/'+value.id+'"><img src="/assets/img/corperimage/'+value.profile_pic+'" class="img-fluid" alt="User Image" style="border-radius: 20px;"></a></div><div class="doc-info-cont"><h4 class="doc-name"><a href="/corpsmemberprofile/'+value.name+'/'+value.id+'">'+value.name+'</a></h4><p class="doc-speciality">Batch: '+value.batch+', Stream: '+value.stream+', Year: '+value.year+'</p><div class="clinic-details"><p class="doc-location"><i class="fas fa-map-marker-alt"></i> From: '+value.state+'</p></div></div></div><div class="doc-info-right"><div class="clinic-booking"><a class="view-pro-btn" href="/corpsmemberprofile/'+value.name+'/'+value.id+'">View Profile</a></div></div></div></div></div>';

    $('#corpsmembers_list').append(corpsmembers_list);



      });


        }


      
        
            
        }


    })




   }




$("#search_corps").keyup(function(){
    var search_corps = $(this).val();
   
   LoadCorpsMembers(search_corps);

 });



$("#search_corps").bind("change keyup", function(event){
    var search_corps = $(this).val();
   
   LoadCorpsMembers(search_corps);

 });




  
  
setInterval(function(){ GetOnlineStatus()}, 5000);

   GetOnlineStatus();
  function GetOnlineStatus(){
var corper_id =  $('#corper_id').val();
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('user.getonlinestatus')}}",
        method:"POST",
        data:{corper_id:corper_id,_tokens:_tokens},
        success:function(data){
    
    //console.log(data);

  $.each(data.status, function(i, value){

    if ((value.status + 5) >= data.date) {

      var status = '<i class="fas fa-user" style="color: lightgreen"></i> <font color="lightgreen">online</font>';
      $('#online_status').html(status);

    }else{

        var status = '<i class="fas fa-user" style="color: red"></i> <font color="red">offline</font>';
      $('#online_status').html(status);


    }

  });
        
            
        }


    })
  


  }




//Edit Profile Pic


var var_gender = $('#var_gender').val();
var var_religion = $('#var_religion').val();
var var_marital_status = $('#var_marital_status').val();
var var_platoon = $('#var_platoon').val();
var var_state_of_origin = $('#var_state_of_origin').val();
var var_serving_lga = $('#var_serving_lga').val();

$('#gender').val(var_gender);
$('#religion').val(var_religion);
 $('#marital_status').val(var_marital_status);
$('#platoon').val(var_platoon);
$('#state_of_origin').val(var_state_of_origin);
$('#serving_lga').val(var_serving_lga);



$('#update_profile_btn').click(function(e){

   for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}


e.preventDefault();

var gender = $('#gender').val();
var religion = $('#religion').val();
var marital_status = $('#marital_status').val();
var platoon = $('#platoon').val();
var state_of_origin = $('#state_of_origin').val();
var serving_lga = $('#serving_lga').val();
var phone_number = $('#phone_number').val();
var whatsapp_number = $('#whatsapp_number').val();
var facebook_id = $('#facebook_id').val();
var about_me = $('#about_me').val();


if (phone_number == '') {
  alert('Phone Number Field Cannot be Empty');
}else if (whatsapp_number == '' ) {
  alert('Whatsapp Number Field Cannot be Empty');

}else if (facebook_id == '') {
alert('Facebook Name Field Cannot be Empty');


}else if (about_me == "") {
alert('About me Field Cannot be Empty');


}else if (gender == '') {
alert('Gender Field Cannot be Empty');


}else if (religion == '') {
alert('Religion Field Cannot be Empty');


}else if (marital_status == '') {
alert('Marital Status Field Cannot be Empty');


}else if (platoon == '') {
alert('Platoon Field Cannot be Empty');


}else if (state_of_origin == '') {
alert('State of Origin Field Cannot be Empty');


}else if (serving_lga == '') {
alert('Serving or Served LGA Field Cannot be Empty');


}else{

  if (confirm("Are you sure?")) {
    $('.overlay').show();

          $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    url:"{{route('user.updatemyprofile')}}",
    type:"POST",
    data: {serving_lga:serving_lga, state_of_origin:state_of_origin, platoon:platoon, marital_status:marital_status, religion:religion, gender:gender, about_me:about_me, facebook_id:facebook_id, whatsapp_number:whatsapp_number, phone_number:phone_number,_tokens:_tokens},
    success: function(data){

    //console.log(data);

    alert(data);
    window.location.reload();
    $('.overlay').hide();

    }
})
  }

}
  
});



$('#add_education_btn').click(function(){
$('#educationModal').show();
});

$('#educationup').click(function(){
$('#educationModal').hide();
});


$('#educationdown').click(function(){
$('#educationModal').hide();
});


$('#add_education_form').on('submit', function(e){
e.preventDefault();
 var data = $(this).serialize();
      var url = $(this).attr('action');
      var post = $(this).attr('method');

var school_name = $('#school_name').val();
var degree_type = $('#degree_type').val();
var education_from_date = $('#education_from_date').val();
var education_to_date = $('#education_to_date').val();

if (school_name == '') {
 alert('Enter School Name'); 
}else if (degree_type == '') {
  alert('Enter Degree Type');
}else if (education_from_date == '') {
  alert('Enter From Date');
}else if (education_to_date == '') {
  alert('Enter To date');
}else{

  if (confirm("Are you sure?")) {
    $('.overlay').show();
    $('#educationModal').hide();
            $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: post,
    url: url,
    data: data,
    success: function(data){

    //console.log(data);
  $('#add_education_form').trigger('reset');
    alert(data);
  fetchEducation();
  $('.overlay').hide();
  $('#educationModal').show();

    }


  })
   

  }
}


});



fetchEducation();
  function fetchEducation(){

  $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('user.fetcheducation')}}",
        method:"POST",
        data:{_tokens:_tokens},
        success:function(data){
    
    //console.log(data);
$('#fetcheducation').empty();
        if (data == '') {
$('#fetcheducation').empty();
          var fetcheducation = '<center><h6>NO RECORD FOUND</h6></center>';

    $('#fetcheducation').append(fetcheducation);
        }else{
$('#fetcheducation').empty();
            $.each(data, function(i, value){
    var fetcheducation = '  <li><div class="experience-user"><div class="before-circle"></div></div> <div class="experience-content"> <div class="timeline-content"><a href="javascript:void(0)" class="name">'+value.school_name+'</a><div>'+value.type+'</div><span class="time">'+moment(value.from_date).format('YYYY')+' - '+moment(value.to_date).format('YYYY')+'  <i class="fa fa-trash" id="delete_education" data-id="'+value.e_id+'" style="color: red"></i></span></div></div></li>';

    $('#fetcheducation').append(fetcheducation);

        });

        }
        
            
        }


    })



  }



//Remove Education

$('body').delegate('#delete_education', 'click', function(e){

    e.preventDefault();
    var e_id = $(this).data('id');

      if (confirm('Are you sure of this?')) {
  $('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.deleteeducation')}}",
    method:"POST",
    data:{e_id:e_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    fetchEducation();
      $('.overlay').hide();
      
    }


  })

  }


});





$('#add_award_btn').click(function(){
$('#awardModal').show();
});

$('#awardup').click(function(){
$('#awardModal').hide();
});


$('#awarddown').click(function(){
$('#awardModal').hide();
});





$('#add_award_form').on('submit', function(e){

   for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}

e.preventDefault();
 var data = $(this).serialize();
      var url = $(this).attr('action');
      var post = $(this).attr('method');

var award_name = $('#award_name').val();
var award_date = $('#award_date').val();
var award_detail = $('#award_detail').val();


if (award_name == '') {
 alert('Enter Award Name'); 
}else if (award_date == '') {
  alert('Enter Award Date');
}else if (award_detail == '') {
  alert('Enter Award Detail');
}else{

  if (confirm("Are you sure?")) {
      $('.overlay').show();
      $('#awardModal').hide();
            $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: post,
    url: url,
    data: data,
    success: function(data){

    //console.log(data);
  $('#add_award_form').trigger('reset');
  CKEDITOR.instances['award_detail'].setData('');
    alert(data);
    $('#awardModal').show();
    fetchAward();
      $('.overlay').hide();
  

    }


  })
   

  }
}


});




fetchAward();
  function fetchAward(){

  $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('user.fetchaward')}}",
        method:"POST",
        data:{_tokens:_tokens},
        success:function(data){
    
    //console.log(data);
$('#fetchaward').empty();
        if (data == '') {
$('#fetchaward').empty();
          var fetchaward = '<center><h6>NO RECORD FOUND</h6></center>';

    $('#fetchaward').append(fetchaward);
        }else{
$('#fetchaward').empty();
            $.each(data, function(i, value){
    var fetchaward = '<li><div class="experience-user"><div class="before-circle"></div></div><div class="experience-content"><div class="timeline-content"><p class="exp-year">'+moment(value.award_date).format('MM YYYY')+'</p><h4 class="exp-title">'+value.award_name+'</h4><p>'+value.award_detail+' </p><i class="fa fa-trash-alt" style="color: red" id="deleteaward" data-id="'+value.a_id+'" ></i></div></div></li> ';

    $('#fetchaward').append(fetchaward);

        });

        }
        
            
        }


    })



  }



//Remove Award

$('body').delegate('#deleteaward', 'click', function(e){

    e.preventDefault();
    var a_id = $(this).data('id');

      if (confirm('Are you sure of this?')) {
 $('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.deleteaward')}}",
    method:"POST",
    data:{a_id:a_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    fetchAward();
     $('.overlay').hide();
    
      
    }


  })

  }


});






$('#add_work_btn').click(function(){
$('#workModal').show();
});

$('#workup').click(function(){
$('#workModal').hide();
});


$('#workdown').click(function(){
$('#workModal').hide();
});



$('#add_work_form').on('submit', function(e){

e.preventDefault();
 var data = $(this).serialize();
  var url = $(this).attr('action');
  var post = $(this).attr('method');

var w_title = $('#w_title').val();
var w_from_date = $('#w_from_date').val();
var w_to_date = $('#w_to_date').val();


if (w_title == '') {
 alert('Enter Work Exprience Title'); 
}else if (w_from_date == '') {
  alert('Enter Work Exprience From Date');
}else if (w_to_date == '') {
  alert('Enter Work Exprience To Date');
}else{

  if (confirm("Are you sure?")) {

     $('.overlay').show();
     $('#workModal').hide();
            $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: post,
    url: url,
    data: data,
    success: function(data){

    //console.log(data);
  $('#add_work_form').trigger('reset');
    alert(data);
  $('#workModal').show();
  $('.overlay').hide();
fetchWork();
    }


  })
   

  }
}


});



fetchWork();
  function fetchWork(){

  $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('user.fetchwork')}}",
        method:"POST",
        data:{_tokens:_tokens},
        success:function(data){
    
    //console.log(data);
$('#fetchwork').empty();
        if (data == '') {
$('#fetchwork').empty();
          var fetchwork = '<center><h6>NO RECORD FOUND</h6></center>';

    $('#fetchwork').append(fetchwork);
        }else{
$('#fetchwork').empty();
            $.each(data, function(i, value){
    var fetchwork = '<li><div class="experience-user"><div class="before-circle"></div></div><div class="experience-content"><div class="timeline-content"><a href="javascript:void(0)" class="name">'+value.w_title+'</a><span class="time">'+moment(value._w_from_date).format('YYYY')+' - '+moment(value.w_to_date).format('YYYY')+'</span><i class="fa fa-trash-alt" id="deletework" data-id="'+value.w_id+'" style="color: red" ></i></div></div></li> ';

    $('#fetchwork').append(fetchwork);

        });

        }
        
            
        }


    })



  }





//Remove Work

$('body').delegate('#deletework', 'click', function(e){

    e.preventDefault();
    var w_id = $(this).data('id');

      if (confirm('Are you sure of this?')) {
$('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.deletework')}}",
    method:"POST",
    data:{w_id:w_id,_tokens:_tokens},
    success:function(data){
$('.overlay').hide();
    //console.log(data)
    alert(data);
    fetchWork();
    
      
    }


  })

  }


});





$('#add_skill_btn').click(function(){
$('#skillModal').show();
});

$('#skillup').click(function(){
$('#skillModal').hide();
});


$('#skilldown').click(function(){
$('#skillModal').hide();
});




$('#add_skill_form').on('submit', function(e){

e.preventDefault();
 var data = $(this).serialize();
  var url = $(this).attr('action');
  var post = $(this).attr('method');

var skill_name = $('#skill_name').val();



if (skill_name == '') {
 alert('Enter Work Exprience Title'); 
}else{

  if (confirm("Are you sure?")) {
    $('.overlay').show();
    $('#skillModal').hide();
            $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: post,
    url: url,
    data: data,
    success: function(data){
$('.overlay').hide();
$('#skillModal').show();
    //console.log(data);
  $('#add_skill_form').trigger('reset');
    alert(data);
  fetchSkill();

    }


  })
   

  }
}


});




fetchSkill();
  function fetchSkill(){

  $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('user.fetchskill')}}",
        method:"POST",
        data:{_tokens:_tokens},
        success:function(data){
    
    //console.log(data);
$('#fetchskill').empty();
        if (data == '') {
$('#fetchskill').empty();
          var fetchskill = '<center><h6>NO RECORD FOUND</h6></center>';

    $('#fetchskill').append(fetchskill);
        }else{
$('#fetchskill').empty();
            $.each(data, function(i, value){
    var fetchskill = '<li>'+value.skill_name+' <span><i class="fa fa-trash-alt" style="color: red" id="deleteskill" data-id="'+value.skill_id+'"></i></span></li>';

    $('#fetchskill').append(fetchskill);

        });

        }
        
            
        }


    })



  }





//Remove Work

$('body').delegate('#deleteskill', 'click', function(e){

    e.preventDefault();
    var s_id = $(this).data('id');

      if (confirm('Are you sure of this?')) {
$('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.deleteskill')}}",
    method:"POST",
    data:{s_id:s_id},
    success:function(data){
$('.overlay').hide();
    //console.log(data)
    alert(data);
    fetchSkill();
    
      
    }


  })

  }


});





$('#change_image').click(function(){
$('#change_imageModal').show();
});

$('#change_imageup').click(function(){
$('#change_imageModal').hide();
});


$('#change_imagedown').click(function(){
$('#change_imageModal').hide();
});



$image_crop = $('#image-preview').croppie({

  enableExif:true,
  viewport:{
    width:400,
    height:400,
    type: 'square'

  },

  boundary:{

    width: 400,
    height: 400
  }


});



$('#upload_image').change(function(){

  var reader = new FileReader();
  reader.onload = function(event){

    $image_crop.croppie('bind', {

      url:event.target.result

    }).then(function(){

      console.log('Jquery bind complete');
    });
  }

  reader.readAsDataURL(this.files[0]);

});



$('#upload_crop_image').click(function(event){

  event.preventDefault();

if ($('#upload_image').val() == '') {
  alert("No picture selected Yet");

}else{

  if (confirm("Are you sure?")) {
    $('.overlay').show();
      $image_crop.croppie('result', {

    type: 'canvas',
    size: 'viewport'
  } ).then(function(response){


    var _token = $('input[name=_token]').val();
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      url:'{{ route("user.changeimage")}}',
      type: "POST",
      data: {"image":response, _token:_token},
      dataType: "json",
      success:function(data){

        // console.log(data);
        $('.overlay').hide();
        $('#change_imageModal').show();
        alert(data);
        window.location.reload();
       
      }

    });

  });
  }
}

});



//Sending Request

$('body').delegate('#send_request_btn', 'click', function(e){

    e.preventDefault();
    var r_id = $(this).data('id');

      if (confirm('Are you sure of this?')) {
   $('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.sendrequest')}}",
    method:"POST",
    data:{r_id:r_id,_tokens:_tokens},
    success:function(data){


      if (data == 'Sent') {
        alert(data);
    window.location.reload();
       $('.overlay').hide();

      }else{
alert(data);
   $('.overlay').hide();

      }
    //console.log(data)
    
       
    
      
    }


  })

  }

  });



$('body').delegate('#cancel_request_btn', 'click', function(e){

    e.preventDefault();
    var c_id = $(this).data('id');

      if (confirm('Are you sure of this?')) {
   $('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.cancelrequest')}}",
    method:"POST",
    data:{c_id:c_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    window.location.reload();
          $('.overlay').hide();
    
      
    }


  })

  }

  });





$('body').delegate('#accept_request_btn', 'click', function(e){

    e.preventDefault();
    var a_id = $(this).data('id');

      if (confirm('Are you sure of this?')) {
   $('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.acceptrequest')}}",
    method:"POST",
    data:{a_id:a_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    window.location.reload();
          $('.overlay').hide();
    
      
    }


  })

  }

  });

$('body').delegate('#accept2_request_btn', 'click', function(e){

    e.preventDefault();
    var a2_id = $(this).data('id');

      if (confirm('Are you sure of this?')) {
   $('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.acceptrequest2')}}",
    method:"POST",
    data:{a2_id:a2_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    fetchRequest();
          $('.overlay').hide();
    
      
    }


  })

  }

  });



$('body').delegate('#decline_request_btn', 'click', function(e){

    e.preventDefault();
    var d_id = $(this).data('id');

      if (confirm('Are you sure of this?')) {
   $('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.declinerequest')}}",
    method:"POST",
    data:{d_id:d_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    window.location.reload();
          $('.overlay').hide();
    
      
    }


  })

  }

  });

$('body').delegate('#decline2_request_btn', 'click', function(e){

    e.preventDefault();
    var d2_id = $(this).data('id');

      if (confirm('Are you sure of this?')) {
   $('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.declinerequest2')}}",
    method:"POST",
    data:{d2_id:d2_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    fetchRequest();
          $('.overlay').hide();
    
      
    }


  })

  }

  });



$('body').delegate('#unfriend_btn', 'click', function(e){

    e.preventDefault();
    var u_id = $(this).data('id');

      if (confirm('Are you sure of this?')) {
   $('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.unfriend')}}",
    method:"POST",
    data:{u_id:u_id,_tokens:_tokens},
    success:function(data){
   $('.overlay').hide();
    //console.log(data)
    alert(data);
    window.location.reload();
       
    
      
    }


  })

  }

  });


fetchRequest();
function fetchRequest(){

$.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('user.fetchrequest')}}",
        method:"POST",
        data:{_tokens:_tokens},
        success:function(data){

        //console.log(data)
        $('#total_request').html(data.total);
        
$('#request_list').empty();
        if (data.users == '') {
$('#request_list').empty();
          var request_list = '<center><h6>NO RECORD FOUND</h6></center>';

    $('#request_list').append(request_list);

        }else{

             $('#request_list').empty();
     $.each(data.users, function(i, value){


var request_list = '<div class="card"><div class="card-body"><div class="doctor-widget"><div class="doc-info-left"><div class="doctor-img"><a href="/corpsmemberprofile/'+value.name+'/'+value.id+'"><img src="/assets/img/corperimage/'+value.profile_pic+'" class="img-fluid" alt="User Image" style="border-radius: 20px;"></a></div><div class="doc-info-cont"><h4 class="doc-name"><a href="/corpsmemberprofile/'+value.name+'/'+value.id+'">'+value.name+'</a></h4><p class="doc-speciality">Batch: '+value.batch+', Stream: '+value.stream+', Year: '+value.year+'</p><div class="clinic-details"><p class="doc-location"><i class="fas fa-map-marker-alt"></i> From: '+value.state+'</p></div></div></div><div class="doc-info-right"><div class="clinic-booking"><a class="view-pro-btn" href="javascript:void(0)" style="color: lightgreen" data-id="'+value.f_r_id+'" id="accept2_request_btn">Accept</a><a class="btn btn-danger" href="javascript:void(0)" style="color: red" data-id="'+value.f_r_id+'" id="decline2_request_btn">Decline</a></div></div></div</div></div>';

    $('#request_list').append(request_list);



      });


        }


      
        
            
        }


    })




}





$('body').delegate('#chatuser', 'click', function(e){

    e.preventDefault();
    var chatuser_user_id = $(this).data('id');
      var chatuser_user_name = $(this).data('name');
      var receiver_image = $(this).data('image');

      $('#chatuserModal').show();
      $('#chatusertitle').html(chatuser_user_name);
 setInterval(function(){ fetchMessage() }, 1000);

fetchMessage();
      function fetchMessage(){
  
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.fetchmessage')}}",
    method:"POST",
    data:{chatuser_user_id:chatuser_user_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
$('#userchat_box').empty();
    if (data == '') {

    }else{

$('#userchat_box').empty();
     $.each(data, function(i, value){


  if (value.sender_id == $('#sender_id').val()) {


         var userchat_box = '<li class="media sent"><div class="media-body"><div class="msg-box"><div><p>'+value.message+'</p><ul class="chat-msg-info"><li><div class="chat-time"><span>'+value.time_sent+'</span></div></li> </ul></div></div></div></li>';

    $('#userchat_box').append(userchat_box);


      }else{
        

 var userchat_box = '<li class="media received"><div class="avatar"><img src="/assets/img/corperimage/'+receiver_image+'" alt="User Image" class="avatar-img rounded-circle"></div><div class="media-body"><div class="msg-box"><div><p>'+value.message+'</p><ul class="chat-msg-info"><li><div class="chat-time"><span>'+value.time_sent+'</span></div></li>';

    $('#userchat_box').append(userchat_box);

      }



      });

    }
 
       
     }


  })
      }


     

  });

$('#chatuserup').click(function(){
$('#chatuserModal').hide();
});


$('#chatuserdown').click(function(){
$('#chatuserModal').hide();
});



$('body').delegate('#chatuser_msg_button', 'click', function(e){

    e.preventDefault();
    var chatuser_id = $('#chatuser_id').val();
    var chatuser_msg = $('#chatuser_msg').val();

    $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.sendmessage')}}",
    method:"POST",
    data:{chatuser_id:chatuser_id, chatuser_msg:chatuser_msg,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    $('#chatuser_msg').val('');
       
     }


  })



  });









//CreateShop

$('#create_a_shop').click(function(){

$('#createshopModal').show();

});
$('#createshopup').click(function(){
$('#createshopModal').hide();
});


$('#createshopdown').click(function(){
$('#createshopModal').hide();
});



$shop_image_crop = $('#shop_image_preview').croppie({

  enableExif:true,
  viewport:{
    width:500,
    height:300,
    type: 'rectangle'

  },

  boundary:{

    width: 500,
    height: 300
  }


});



$('#shop_image').change(function(){

  var reader = new FileReader();
  reader.onload = function(event){

    $shop_image_crop.croppie('bind', {

      url:event.target.result

    }).then(function(){

      console.log('Jquery bind complete');
    });
  }

  reader.readAsDataURL(this.files[0]);

});

$('#shop_create_process').hide();

$('#create_shop_btn').click(function(event){
  
     for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}

  event.preventDefault();

  var shop_image = $('#shop_image').val();
  var shop_name = $('#shop_name').val();
  var shop_phone_number = $('#shop_phone_number').val();
  var shop_address = $('#shop_address').val();
  var shop_specialist = $('#shop_specialist').val();
  var shop_open_hour = $('#shop_open_hour').val();
  var shop_closing_hour = $('#shop_closing_hour').val();
  var shop_working_days = $('#shop_working_days').val();
  var about_shop = $('#about_shop').val();
  var shop_email = $('#shop_email').val();

if (shop_name == '') {
  alert("Please Enter Shop Name");

}else if(shop_address == ''){
  alert("Please Enter Shop Address");
}else if(shop_phone_number == ''){
  alert("Please Enter Shop Phone Number");
}else if(shop_specialist == ''){
  alert("Please Enter Shop Specialization");
}else if(shop_open_hour == ''){
  alert("Please Enter Shop Open Hour");
}else if(shop_closing_hour == ''){
  alert("Please Enter Shop Closing Hour");
}else if(shop_working_days == ''){
  alert("Please Enter Shop Working Days");
}else if(about_shop == ''){
  alert("Please Enter About Shop");
}else if(shop_image == ''){
  alert("Please Enter Shop Image");
}else if(shop_email == ''){
  alert("Please Enter Shop Email Address");
}else{

  if (confirm("Clicking ok means you agreed to one of the terms guarding this website, which says, Activation of Shop involve payment of #500 which is maintainace fee. ?")) {
    $('#shop_create_process').show();
    $('.overlay').show();
    
      $shop_image_crop.croppie('result', {

    type: 'canvas',
    size: 'viewport'
  } ).then(function(response){


    var _token = $('input[name=_token]').val();
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      url:'{{ route("user.createshop")}}',
      type: "POST",
      data: {"image":response, _token:_token,shop_name:shop_name,shop_phone_number:shop_phone_number,shop_address:shop_address,shop_specialist:shop_specialist,shop_open_hour:shop_open_hour,shop_closing_hour:shop_closing_hour,shop_working_days:shop_working_days,about_shop:about_shop, shop_email:shop_email},
      dataType: "json",
      success:function(data){

        //console.log(data);
        // alert(data);
        // window.location.reload();

        if (data == 'Created Successfully') {
          alert(data);
        window.location.reload();
        $('#shop_create_process').hide();
        $('.overlay').hide();
        $('#createshopModal').show();
        }else{
       alert(data);
       $('#shop_create_process').hide();
       $('.overlay').hide();
       $('#createshopModal').show();
        }
       
      }

    });

  });
  }
}

});











$('body').delegate('#shop_update_btn', 'click', function(e){

    e.preventDefault();
    var edit_shop_id = $(this).data('id'); 
     for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}


  var edit_shop_name = $('#edit_shop_name').val();
  var edit_shop_phone_number = $('#edit_shop_phone_number').val();
  var edit_shop_address = $('#edit_shop_address').val();
  var edit_shop_specialist = $('#edit_shop_specialist').val();
  var edit_shop_open_hour = $('#edit_shop_open_hour').val();
  var edit_shop_closing_hour = $('#edit_shop_closing_hour').val();
  var edit_shop_working_days = $('#edit_shop_working_days').val();
  var edit_about_shop = $('#edit_about_shop').val();
  var edit_shop_email = $('#edit_shop_email').val();

if (edit_shop_name == '') {
  alert("Please Enter Shop Name");

}else if(edit_shop_address == ''){
  alert("Please Enter Shop Address");
}else if(edit_shop_phone_number == ''){
  alert("Please Enter Shop Phone Number");
}else if(edit_shop_specialist == ''){
  alert("Please Enter Shop Specialization");
}else if(edit_shop_open_hour == ''){
  alert("Please Enter Shop Open Hour");
}else if(edit_shop_closing_hour == ''){
  alert("Please Enter Shop Closing Hour");
}else if(edit_shop_working_days == ''){
  alert("Please Enter Shop Working Days");
}else if(edit_about_shop == ''){
  alert("Please Enter About Shop");
}else if(edit_shop_email == ''){
  alert("Please Enter Shop Email Address");
}else{

      if (confirm("Are you sure?")) {

$('.overlay').show();
    $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.updateshop')}}",
    method:"POST",
    data:{edit_shop_id:edit_shop_id,edit_shop_name:edit_shop_name,edit_shop_phone_number:edit_shop_phone_number,edit_shop_address:edit_shop_address,edit_shop_specialist:edit_shop_specialist,edit_shop_open_hour:edit_shop_open_hour,edit_shop_closing_hour:edit_shop_closing_hour,edit_shop_working_days:edit_shop_working_days,edit_about_shop:edit_about_shop, edit_shop_email:edit_shop_email,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
        window.location.reload();
        $('.overlay').hide();
       
     }


  })

      }

 }

});







$('#change_shop_image').click(function(){
$('#change_shopimageModal').show();
});

$('#change_shopimageup').click(function(){
$('#change_shopimageModal').hide();
});


$('#change_shopimagedown').click(function(){
$('#change_shopimageModal').hide();
});



$change_shop_image_crop = $('#change_shop_image-preview').croppie({

 enableExif:true,
  viewport:{
    width:500,
    height:300,
    type: 'rectangle'

  },

  boundary:{

    width: 500,
    height: 300
  }



});



$('#change_shop_upload_image').change(function(){

  var reader = new FileReader();
  reader.onload = function(event){

    $change_shop_image_crop.croppie('bind', {

      url:event.target.result

    }).then(function(){

      console.log('Jquery bind complete');
    });
  }

  reader.readAsDataURL(this.files[0]);

});



$('#change_shop_upload_crop_image').click(function(event){

  event.preventDefault();
var change_shop_image_id = $('#change_shop_image_id').val();
var changing_image = $('#changing_image').val();

if ($('#change_shop_upload_image').val() == '') {
  alert("No picture selected Yet");

}else{

  if (confirm("Are you sure?")) {

    
    $('.overlay').show();
      $change_shop_image_crop.croppie('result', {

    type: 'canvas',
    size: 'viewport'
  } ).then(function(response){


    var _token = $('input[name=_token]').val();
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      url:'{{ route("user.changeshopimage")}}',
      type: "POST",
      data: {"image":response, _token:_token,change_shop_image_id:change_shop_image_id,changing_image:changing_image},
      dataType: "json",
      success:function(data){

        //console.log(data);
        alert(data);
        window.location.reload();
        $('#change_shopimageModal').show();
        $('.overlay').hide();
       
      }

    });

  });
  }
}

});







$('#add_shopaward_btn').click(function(){
$('#shopawardModal').show();
});

$('#shopawardup').click(function(){
$('#shopawardModal').hide();
});


$('#shopawarddown').click(function(){
$('#shopawardModal').hide();
});





$('#add_shopaward_form').on('submit', function(e){

   for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}

e.preventDefault();
 var data = $(this).serialize();
      var url = $(this).attr('action');
      var post = $(this).attr('method');


var shopaward_name = $('#shopaward_name').val();
var shopaward_date = $('#shopaward_date').val();
var shopaward_detail = $('#shopaward_detail').val();


if (shopaward_name == '') {
 alert('Enter Award Name'); 
}else if (shopaward_date == '') {
  alert('Enter Award Date');
}else if (shopaward_detail == '') {
  alert('Enter Award Detail');
}else{

  if (confirm("Are you sure?")) {
    $('#shopawardModal').hide();
    $('.overlay').show();
            $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: post,
    url: url,
    data: data,
    success: function(data){

    //console.log(data);
  $('#add_shopaward_form').trigger('reset');
  CKEDITOR.instances['shopaward_detail'].setData('');
    alert(data);
    fetchShopAward();
    $('#shopawardModal').show();
    $('.overlay').hide();
  

    }


  })
   

  }
}


});




fetchShopAward();
  function fetchShopAward(){

    var shop_id = $('#shop_id').val();

  $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('user.fetchshopaward')}}",
        method:"POST",
        data:{_tokens:_tokens, shop_id:shop_id},
        success:function(data){
    
    //console.log(data);
$('#fetchshopaward').empty();
        if (data == '') {
$('#fetchshopaward').empty();
          var fetchshopaward = '<center><h6>NO RECORD FOUND</h6></center>';

    $('#fetchshopaward').append(fetchshopaward);
        }else{
$('#fetchshopaward').empty();
            $.each(data, function(i, value){
    var fetchshopaward = '<li><div class="experience-user"><div class="before-circle"></div></div><div class="experience-content"><div class="timeline-content"><p class="exp-year">'+moment(value.shopaward_date).format('MM YYYY')+'</p><h4 class="exp-title">'+value.shopaward_name+'</h4><p>'+value.shopaward_detail+' </p><i class="fa fa-trash-alt" style="color: red" id="deleteshopaward" data-id="'+value.shopaward_id+'" ></i></div></div></li> ';

    $('#fetchshopaward').append(fetchshopaward);

        });

        }
        
            
        }


    })



  }



//Remove Award

$('body').delegate('#deleteshopaward', 'click', function(e){

    e.preventDefault();
    var as_id = $(this).data('id');

      if (confirm('Are you sure of this?')) {
$('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.deleteshopaward')}}",
    method:"POST",
    data:{as_id:as_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    fetchShopAward();
    $('.overlay').hide();
      
    }


  })

  }


});




$('body').delegate('#delete_shop_btn', 'click', function(e){

    e.preventDefault();
    var shop_id = $(this).data('id');

      if (confirm('Are you sure of this?')) {
$('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.deleteshop')}}",
    method:"POST",
    data:{shop_id:shop_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)

    window.location.href = '/market';
    alert(data);
   
    $('.overlay').hide();
      
    }


  })

  }


});




$('#send_shop_message_btn').click(function(){
$('#sendshopmessageModal').show();
});

$('#sendshopmessageup').click(function(){
$('#sendshopmessageModal').hide();
});


$('#sendshopmessagedown').click(function(){
$('#sendshopmessageModal').hide();
});


$('#shop_message_process').hide();
$('#send_shop_message_form').on('submit', function(e){

e.preventDefault();
 var data = $(this).serialize();
  var url = $(this).attr('action');
  var post = $(this).attr('method');

var shop_message_name = $('#shop_message_name').val();
var shop_message_email = $('#shop_message_email').val();
var shop_message_subject = $('#shop_message_subject').val();
var shop_message_content = $('#shop_message_content').val();

if (shop_message_name == '') {
 alert('Enter Your Name'); 
}else if(shop_message_email == ''){
alert('Enter Your Email'); 
}else if(shop_message_subject == ''){
  alert('Enter Message Subject'); 
}else if(shop_message_content == ''){
  alert('Enter Message Content'); 
}else{

  if (confirm("Are you sure?")) {

$('#shop_message_process').show();
$('#sendshopmessageModal').hide();
$('.overlay').show();
            $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: post,
    url: url,
    data: data,
    success: function(data){

    //console.log(data);
  $('#send_shop_message_form').trigger('reset');
    alert(data);
    $('.overlay').hide();
  $('#sendshopmessageModal').show();
$('#shop_message_process').hide();

    }


  })
   

  }
}


});


 

$('body').delegate('#call_user_btn', 'click', function(e){

   // e.preventDefault();
    var user_id = $(this).data('id');

  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.addusercall')}}",
    method:"POST",
    data:{user_id:user_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    
      
    }


  })



  });


$('body').delegate('#call_whatsapp_btn', 'click', function(e){

   // e.preventDefault();
    var user_id = $(this).data('id');

  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.adduserwhatsapp')}}",
    method:"POST",
    data:{user_id:user_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    
      
    }


  })



  });






$('body').delegate('#reply_shop_message_btn', 'click', function(e){

   // e.preventDefault();
    var sender_name = $(this).data('name');
    var sender_email = $(this).data('email');
    var subject = $(this).data('subject');
    
  $('#reply_shop_message_name').val(sender_name);
   $('#reply_shop_message_email').val(sender_email);
    $('#reply_shop_message_subject').val(subject);


$('#replyshopmessageModal').show();
});

$('#replyshopmessageup').click(function(){
$('#replyshopmessageModal').hide();
});


$('#replyshopmessagedown').click(function(){
$('#replyshopmessageModal').hide();
});




$('#reply_shop_message_process').hide();
$('#reply_shop_message_form').on('submit', function(e){

e.preventDefault();
 var data = $(this).serialize();
  var url = $(this).attr('action');
  var post = $(this).attr('method');


var reply_shop_message_subject = $('#reply_shop_message_subject').val();
var reply_shop_message_content = $('#reply_shop_message_content').val();

 if(reply_shop_message_subject == ''){
  alert('Enter Message Subject'); 
}else if(reply_shop_message_content == ''){
  alert('Enter Message Content'); 
}else{

  if (confirm("Are you sure?")) {
 $('.overlay').show();
$('#reply_shop_message_process').show();
$('#replyshopmessageModal').hide();
            $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: post,
    url: url,
    data: data,
    success: function(data){

    //console.log(data);
  $('#reply_shop_message_form').trigger('reset');
    alert(data);
   $('.overlay').hide();
   $('#replyshopmessageModal').show();
$('#reply_shop_message_process').hide();

    }


  })
   

  }
}


});




$('body').delegate('#clear_call_status_btn', 'click', function(e){

   // e.preventDefault();
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.clearcallstatus')}}",
    method:"POST",
    data:{_tokens:_tokens},
    success:function(data){

    console.log(data)
    
      
    }


  })



  });

$('body').delegate('#clear_whatsapp_status_btn', 'click', function(e){

   // e.preventDefault();
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.clearwhatsappstatus')}}",
    method:"POST",
    data:{_tokens:_tokens},
    success:function(data){

    console.log(data)
    
      
    }


  })



  });




$('body').delegate('#create_product_btn', 'click', function(e){

    e.preventDefault();
    var shop_id = $(this).data('id');
    $('#product_shop_id').val(shop_id);
 $('#createproductModal').show();
});


$('#createproductup').click(function(){
$('#createproductModal').hide();
});


$('#createproductdown').click(function(){
$('#createproductModal').hide();
});









$product_image_crop = $('#product_image_preview').croppie({

  enableExif:true,
  viewport:{
    width:400,
    height:400,
    type: 'square'

  },

  boundary:{

    width: 400,
    height: 400
  }


});



$('#product_image').change(function(){

  var reader = new FileReader();
  reader.onload = function(event){

    $product_image_crop.croppie('bind', {

      url:event.target.result

    }).then(function(){

      console.log('Jquery bind complete');
    });
  }

  reader.readAsDataURL(this.files[0]);

});



$('#product_create_process').hide();

$('#create_product_submit_btn').click(function(event){
  
     for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}

  event.preventDefault();

  var product_image = $('#product_image').val();
  var product_name = $('#product_name').val();
  var product_shop_id = $('#product_shop_id').val();
  var product_price = $('#product_price').val();
  var product_old_price = $('#product_old_price').val();
  var product_description = $('#product_description').val();
   var product_qty = $('#product_qty').val();
 

if (product_name == '') {
  alert("Please Enter Product Name");
}else if(product_price == ''){
  alert("Please Enter Product Price");
}else if(product_old_price == ''){
  alert("Please Enter Product Old Price");
}else if(product_description == ''){
  alert("Please Enter Product Description");
}else if(product_image == ''){
  alert("Please Enter Product Image");
}else if(product_qty == ''){
  alert("Please Enter Product Stock");
}else if(product_qty == 0){
  alert("Please Enter Valid Product Stock");
}else{

  if (confirm("Are You Sure?")) {
    $('#product_create_process').show();
    
     $('.overlay').show();
      $product_image_crop.croppie('result', {

    type: 'canvas',
    size: 'viewport'
  } ).then(function(response){


    var _token = $('input[name=_token]').val();
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      url:'{{ route("user.createproduct")}}',
      type: "POST",
      data: {"image":response, _token:_token,product_shop_id:product_shop_id,product_name:product_name, product_price:product_price,product_old_price:product_old_price, product_description:product_description,product_qty,product_qty},
      dataType: "json",
      success:function(data){

        //console.log(data);
        

        if (data == 'Uploaded Successfully') {
        alert(data);
        window.location.reload();
         $('.overlay').hide();
        $('#product_create_process').hide();
        $('#createproductModal').ahow();
        }else{
       alert(data);
        $('.overlay').hide();
       $('#product_create_process').show();
       $('#createproductModal').ahow();
        }
       
      }

    });

  });
  }
}

});





var deleteproduct = document.getElementsByClassName('confirmproductdeletebtn');
    var confirmIt = function (e) {
        if (!confirm('Are you sure you want to delete this product?')) e.preventDefault();
    };
    for (var i = 0, l = deleteproduct.length; i < l; i++) {
        deleteproduct[i].addEventListener('click', confirmIt, false);
    }





$('body').delegate('#love_product_btn', 'click', function(e){

    e.preventDefault();
    var product_id = $(this).data('id');

      if (confirm('Are you sure of this?')) {
   $('.overlay').show();
      $.ajax({

    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.loveproduct')}}",
    method:"POST",
    data:{product_id:product_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    window.location.reload();
       $('.overlay').hide();
    
      
    }


  })

  }


});



$('body').delegate('#unlove_product_btn', 'click', function(e){

    e.preventDefault();
    var product_id = $(this).data('id');

      if (confirm('Are you sure of this?')) {
   $('.overlay').show();
      $.ajax({

    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.unloveproduct')}}",
    method:"POST",
    data:{product_id:product_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    window.location.reload();
       $('.overlay').hide();
    
      
    }


  })

  }


});






$('body').delegate('#cart_btn', 'click', function(e){

    e.preventDefault();
    var product_id = $(this).data('id');
    var current = $(this).data('current');
    var status = $(this).data('status');
    var old = $(this).data('old');
    var name = $(this).data('name');
    var pqty = $(this).data('qty');
    $('#quantity').val(pqty);
    var qty = $('#quantity').val();

    $('#cart_product_name').html(name);
 // $('#cart_product_status').html(status);
      $('#cart_current_price').html('<s>N</s>'+addCommas(current));
       $('#cart_old_price').html('<s>N'+addCommas(old)+'</s>');

      var per = old - current; 
      var echo = (per / old) * 100;
      var echos = Math.round(echo);

      var x = current * qty;

      $('#cart_unit_price').html('<s>N</s>'+addCommas(current));
 $('#cart_total').html('<s>N</s>'+addCommas(x));
 $('#cart_qty').html(qty);
 
$('#cart_discount').html(echos+'% off');
$('#cart_product_price').val(current);
$('#cart_product_id').val(product_id);
$('#cartModal').show();


});

$('#cartup').click(function(){
$('#cartModal').hide();
});


$('#cartdown').click(function(){
$('#cartModal').hide();
});

function addCommas(nStr){

    nStr +='';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while(rgx.test(x1)){
      x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
  }



$("#cart_plus").click(function(){

var current = $('#cart_product_price').val();
var qty = $('#quantity').val();
var x = current * qty;

$('#cart_unit_price').html('<s>N</s>'+addCommas(current));
 $('#cart_total').html('<s>N</s>'+addCommas(x));
 $('#cart_qty').html(qty);



});


$("#cart_minus").click(function(){

var current = $('#cart_product_price').val();
var qty = $('#quantity').val();
var x = current * qty;

$('#cart_unit_price').html('<s>N</s>'+addCommas(current));
 $('#cart_total').html('<s>N</s>'+addCommas(x));
 $('#cart_qty').html(qty);



});



$("#quantity").keyup(function(){
 var current = $('#cart_product_price').val();
var qty = $('#quantity').val();
var x = current * qty;

$('#cart_unit_price').html('<s>N</s>'+addCommas(current));
 $('#cart_total').html('<s>N</s>'+addCommas(x));
 $('#cart_qty').html(qty);
    

  });

$("#quantity").bind("change keyup", function(event){ 

   
var current = $('#cart_product_price').val();
var qty = $('#quantity').val();
var x = current * qty;

$('#cart_unit_price').html('<s>N</s>'+addCommas(current));
 $('#cart_total').html('<s>N</s>'+addCommas(x));
 $('#cart_qty').html(qty);
});



$('#place_order_btn').click(function(event){

  event.preventDefault();

  var quantity = $('#quantity').val();
  var product_price = $('#cart_product_price').val();
   var product_id = $('#cart_product_id').val();
    var product_destination = $('#cart_product_destination').val();
    var product_period = $('#cart_product_period').val();


    if (quantity == '') {
      alert('Quantity Field is Empty');
    }else if (quantity == 0) {
  alert('Quantity Field is 0');

    }else if (product_destination == '') {
  alert('Destination Field is Empty');

    }else if (product_period == '') {
  alert('Period Field is Empty');

    }else{

      if (confirm("Are you sure?")) {

    $('.overlay').show();

var _token = $('input[name=_token]').val();
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      url:'{{ route("user.placeorder")}}',
      type: "POST",
      data: { _token:_token,quantity:quantity,product_price:product_price, product_id:product_id,product_destination:product_destination, product_period:product_period},
      success:function(data){

        //console.log(data);
        
alert(data);
    window.location.reload();
    $('.overlay').hide();
    
       
      }

    })

      }

    }


});



$('body').delegate('#order_yes_btn', 'click', function(e){

    e.preventDefault();
    var product_id = $(this).data('product');
    var order_id = $(this).data('id');
        var shop_id = $(this).data('shop');

      if (confirm('Are you sure of this?')) {
        $('.overlay').show();
      $.ajax({

    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.orderyes')}}",
    method:"POST",
    data:{product_id:product_id,order_id:order_id,shop_id:shop_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    window.location.reload();
    $('.overlay').hide();
    
      
    }

})

}


});



$('#change_password_btn').click(function(){
$('#changepasswordModal').show();
});

$('#changepasswordup').click(function(){
$('#changepasswordModal').hide();
});


$('#changepassworddown').click(function(){
$('#changepasswordModal').hide();
});




$('#update_password_btn').click(function(e){

e.preventDefault();

var edit_password = $('#edit_password').val();
var edit_password_again = $('#edit_password_again').val();

if (edit_password == '') {
  alert('Password field is empty');
}else if(edit_password_again == ''){
  alert('Password Again field is empy');
}else if(edit_password_again != edit_password){
  alert('Password Not Match');
}else {

  if (confirm("Are you sure?")) {
$('.overlay').show();
$('#changepasswordModal').hide();
    $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.updatepassword')}}",
    method:"POST",
    data:{edit_password:edit_password,_tokens:_tokens},
    success:function(data){

  //console.log(data);
  alert(data);
       window.location.reload();
       $('#changepasswordModal').show();
    $('.overlay').hide();

    }


  })
  }
}

}); 







$('#upload_image_form').on('submit', function(event){

  event.preventDefault();

  var usersphoto = $('#usersphoto').val();

  if (usersphoto == '') {

$('#message').css('display', 'block');
$('#message').html('Selet a picture first');
$('#message').addClass('alert-danger');


  }else{

$.ajax({
    url:"{{ route('user.usersuploadphoto') }}",
    method:"POST",
    data:new FormData(this),
    dataType:'JSON',
    contentType:false,
    cache:false,
    processData:false,
    success:function(data){

      

if (data.message == 'Image Uploaded Successfully') {

  // console.log(data);
  $('#message').css('display', 'block');
      $('#message').html(data.message);
      $('#message').addClass(data.class_name);
     window.location.reload();
}else{

  $('#message').css('display', 'block');
      $('#message').html(data.message);
      $('#message').addClass(data.class_name);

}
     

    }


  });

  }


});





$('body').delegate('#delete_my_photo', 'click', function(e){

    e.preventDefault();
    var photo_id = $(this).data('id');

      if (confirm('Are you sure of this?')) {
    $('.overlay').show();
      $.ajax({

    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.deletemyphoto')}}",
    method:"POST",
    data:{photo_id:photo_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    window.location.reload();
        $('.overlay').hide();
    }

})

  }


});













    });
        </script>

        
    </body>


</html>