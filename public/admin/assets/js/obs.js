// $(document).ready(function(){


// $('#register_obs').click(function(){
// 	$('#obsModal').show();
// 		$('#wait_obs').hide();

// 	// FetchCorps();
// });


// $('#obsup').click(function(){
// 	$('#obsModal').hide();
// });

// $('#obsdown').click(function(){
// 	$('#obsModal').hide();
// });



// // function FetchCorps(){

// // //fetching corpers 

// //   $.ajax({
// //      headers: {
// //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// //         },
// //     type: 'POST',
// //     url: "./fetchcorps",
// //     success: function(data){

// //     var obs_user_id_empty = '<option value="">Select</option>';
    
// //      //console.log(data);
   
// //     $('#obs_user_id').empty();
// //      $('#obs_user_id').append(obs_user_id_empty);
// // $.each(data, function(i, value){
// // var obs_user_id_reg = '<option value="'+value.id+'">'+value.name+', '+value.phone_number+', '+value.state_code+'</option>';
// // $('#obs_user_id').append(obs_user_id_reg);

// // });

// //     }


// //   })



// // }





// ObsTable();
// function ObsTable(){

// $.ajax({
//      headers: {
//       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//     type: 'POST',
//     url: "./obstable",
//     success: function(data){

//     //console.log(data);

//     if (data == '') {

//     	$('#obs_table').empty()
//           var tr = $("<tr/>");
//           tr.append($("<td/>", {
//                 text : ''
//               })).append($("<td/>", {
//                 text : ''
//               })).append($("<td/>", {
//                 text : ''
//               })).append($("<td/>", {
//                 text : ''
//               }))
//           $('#obs_table').append(tr);

//     }else{

//     	var no = 1;
//             $('#obs_table').empty()
//         $.each(data, function(i, value){


//        if (value.state_code == '') {

//        	var tr = $("<tr/>");
//               tr.append($("<td/>", {
//                 text : no
//               })).append($("<td/>", {
//                 html : '<h2 class="table-avatar"><a href="/assets/img/corperimage/'+value.image+'" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="/assets/img/corperimage/'+value.image+'" alt="User Image"></a><a href="/assets/img/corperimage/'+value.image+'">'+value.name+'</a></h2>'
//               })).append($("<td/>", {
//                 text : value.email
//               })).append($("<td/>", {
//                 html: '<a href="javascript:void(0);" class="btn btn-danger btn-sm" data-id="'+value.obs_user_id+'" id="remove_obs_user"> remove</a>'
//               }))


//  			no++
//           $('#obs_table').append(tr);
//        }else{

// var tr = $("<tr/>");
//               tr.append($("<td/>", {
//                 text : no
//               })).append($("<td/>", {
//                 html : '<h2 class="table-avatar"><a href="/assets/img/corperimage/'+value.image+'" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="/assets/img/corperimage/'+value.image+'" alt="User Image"></a><a href="/assets/img/corperimage/'+value.image+'">'+value.name+'</a></h2>'
//               })).append($("<td/>", {
//                 text : value.state_code
//               })).append($("<td/>", {
//                 text : value.batch
//               })).append($("<td/>", {
//                 text : value.stream
//               })).append($("<td/>", {
//                 text : value.year
//               })).append($("<td/>", {
//                 html: '<a href="javascript:void(0);" class="btn btn-danger btn-sm" data-id="'+value.obs_user_id+'" id="remove_obs_user"> remove</a>'
//               }))


//  			no++
//           $('#obs_table').append(tr);


//        } 	




//         });	


//     }
   
    

//     }


//   })



// }




// $('body').delegate('#remove_obs_user', 'click', function(e){

// 		e.preventDefault();
// 		var obs_user_id = $(this).data('id');

// 	if (confirm("Are you sure?")) {



// 			$.ajax({
// 		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
// 		url:"./revomeobsuser",
// 		method:"POST",
// 		data:{obs_user_id:obs_user_id},
// 		success:function(data){

// 		//console.log(data)
// 		alert(data);
// 		ObsTable();
// 		}


// 	})


// 	}	


//  });	










// });