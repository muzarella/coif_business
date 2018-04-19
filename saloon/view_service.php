<?php
session_start();

if (!isset( $_SESSION['saloon_users'])){
header("location:saloon.php");


}

$saloon_user = $_SESSION['saloon_users'];

 ?>

 
 
<?php

include ("connection/header.php" );
 ?>


<!-- beginning of container  -->
<!-- <div class="container">


<div class="jumbotron" style=" background-color: #f4511e;">

<h1 style="text-align: center;">WELCOME TO COIF </h1>
<h2 style="text-align: center;"> BEUTY SALON SERVICE CARE </h2>
<p  style="text-align: center;"><span class="label label-primary"> <sample>  We provide full service to care for you </sample> </span> </p>
</div>

</div> -->
<!-- container  end   -->

 
<!-- creatin the nav panel  -->

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
  <ul class="nav navbar-nav">
    <li class="active"><a href="#">Service navigation </a></li>
    <li><a href="view_service.php">View service </a></li>
    <li><a href="add_service_page.php">Add service</a></li>
    <li><a href="#"> Edit service</a>

    </li>
  </ul>
</nav>

<div class="container">

<h1> ALL CONTENT </h1>

<div class="col-sm-12">
	<div class="well well-lg">
<p> search by category </p>
<form>
  <div class="input-group">

    <input type="text" class="form-control" placeholder="Search">
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit">Search 
        <span class="glyphicon glyphicon-search"></span>
      </button>
    </div>
  </div>
</form>

	</div>


</div>

<!-- beggining of the table  -->
<div  id="show_table">

  <table class="table table-striped" id= "table">
    <thead>
      <tr>
        <th>#</th>
         <th>Category id</th>
        <th>Category</th>
        <th>Style Name</th>
        <th>cost </th>
        <th> Duration </th>
        <th> Action </th>
         <th> Action </th>
      </tr>
    </thead>
    <tbody class="show_row" >
     
    </tbody>
  </table>



</div>
<!-- ending of the table  -->




<!-- beginnning of modal class  -->

<div id="full_view" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
<div class="modal-content">
 <div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"> Style information </h4>
</div>
<div class="modal-body">

<div class="">
<div class="col-sm-12">

<!-- style="background-image: url('uploads/img1.jpg');" -->
<div class="style_image1">
<div class="col-sm-4 style_img" style="">
<img  id="image1" class="img-responsive" src="uploads/img1.jpg" alt="Chania" width="350" height="550" />
</div>

</div>

<div class="style_image2">
<div class="col-sm-4 style_img" style="">
	
	<img class="img-responsive" id="image2" src="uploads/img1.jpg" alt="Chania" width="350" height="550" /> 
</div>
 
</div>


<div class="style_image3">
<div class="col-sm-4 style_img" >
	<img class="img-responsive" id="image3" src="uploads/img1.jpg" alt="Chania" width="350" height="550" />
</div>

</div>


</div>



</div>
<br />
<div class="row">
<div class="col-sm-12">
<div class="details-cont">
<label> style Details</label>

<h4 class='style_title'><b> Category id: </b> <span class="category_id">Fetching...</span>
<!--Male hairstyle -->
</h4>

<h4 class='style_title'><b>Style Category: </b> <span class="category">Fetching...</span>
<!--Male hairstyle -->
</h4>

<h4 class='style_title'><b>Style Name: </b> <span class="title">Fetching...</span>
<!--ghana weaving -->
</h4>


<h4 class='style_title'><b>Style Duration: </b> <span class="duration">Fetching...</span>
<!--ghana weaving -->
</h4>


<h4 class='style_title'><b>Style Amount: </b> <span class="amount">Fetching...</span>
<!--ghana weaving -->
</h4>


<p><b>Style Description: </b> <span class="descr">Fetching...</span>

</p>

<span class="glyphicon glyphicon-star" style="color:gold"></span>
<span class="glyphicon glyphicon-star" style="color:gold"></span>
<span class="glyphicon glyphicon-star" style="color:gold"></span>
<span class="glyphicon glyphicon-star" style="color:gold"></span>
<span class="glyphicon glyphicon-star" style="color:gold"></span>
</div>

</div>


	
</div>




</div>

      <div class="modal-footer">
      	<button class="btn btn-default"> <a href="" id="edit"> Edit </a> </button>


      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>

  </div>
</div>




</div>
<!-- ending of modal class   -->

</div>







<script type="text/javascript">
	
$(document).ready(function (){

init();

})



function init(){

$.ajax({

url:"config/config.php",
method: "POST",
data: {

action:'proL'

},
success: function(e){
/*data =  JSON.parse(data);
$("#show_table").html(e);
*/
	try {


e = JSON.parse(e)

if (e.response === 200 ) {
	$.each(e.data , function(key , value){
var exports = '<tr><td>'+ (key +1 ) + '</td>'
exports += '<td>' + value.category_id + '</td>'
exports += '<td>' + value.category + '</td>'
exports += '<td>' +value.style_name+ '</td> '
	//exports += '<td><img src="' + value.image1+ '" style= width="'10px'",heigth="'6px'"  /></td>'
exports += '<td>' + value.style_cost + '</td>'
exports += '<td>' + value.style_duration+ '</td> '
exports += '<td> <button class="btn btn-danger delete" data-id="' + value.category_id + '"> Delete</button></td>'

exports += '<td>  <button class="btn btn-info " > <span class="show_modal" data-target ="#full_view" data-id="'+ value.category_id +'" data-toggle="modal" >Full view </span> </button> </td></tr>'

	$('.show_row').append(exports)
	})
}else {
$('#table').css("display", "none")
$('#show_table').css("background", "transparent")
$('#show_table').append('<div style="margin: 0 auto; text-align: center;">' + e.message + '</div>')

	  }

	}catch(e1) {

	alert(e)
	alert(e1)
}

},
 error: function(e){
alert(e.statusCode + ": " + e.statusText)

alert(" not successfull")
}


})/*.complete(function() {

			})
*/
}

// delete button from  loaded table 

$(document).on("click", ".delete", function(){
//var loaddiv = $(this).html("loaddiv")
var uid = $(".delete").attr('data-id')

  
   $.confirm({
   columnClass: 'col-sm-4 col-md-offset-4',
icon: 'fa fa-question',
theme: 'material',
closeIcon: true,
animation: 'scale',
type: 'orange',
    buttons: {
        YES: {
    text : " delete ",
    action: function () {
            // here the button key 'hey' will be used as the text.
         
    $(".show_row").html(" ")      
del(uid)
init()
        }
        },
        NO: {
            text: 'cancle!', // With spaces and symbols
            action: function () {
                $.alert('your action has been cancled ');
            }
        }
    }
});



//$("#message").slideToggle("slow");


} )


function del(uid) {

$.ajax({
url: "config/config.php",
method: "POST",
data:{
	action: "delete",
	uid : uid 
},
success: function(e){

try {
e =  JSON.parse(e)
if (e.response === 200 ){
e.message
alert ("deleted successfully")
}else {

	alert(e.message)
	alert("content not deleted")
}

}catch(e1) {
alert (e)

}

},
error: function(e) {
alert(e.message+ "not successfull")
}

})

}


// view  button from  loaded table 

$(document).on("click", ".show_modal", function(){
//var loaddiv = $(this).html("loaddiv")
var view_id = $(this).data('id')


view(view_id)


} )

function view(cusid){
$.ajax({
url:"config/config.php",
method: 'POST',
data: {
action: 'refresh',
id: cusid
},
beforeSend: function () {
$('#myModal .details-cont').css('display', 'block')
//$("#myModal").on('shown.bs.modal', function() {});
	},
cache: false,
success: function (e) {
try {
e = JSON.parse(e)
if (e.response == 200) {
setTimeout(function () {

$('#full_view').find('.category_id').html(e.data[0].category_id)

$('#full_view').find('.category').html(e.data[0].style_category)
$('#full_view').find('.title').html(e.data[0].style_name)
$('#full_view').find('.descr').html(e.data[0].style_desc)
$('#full_view').find('.amount').html(e.data[0].style_amount)
$('#full_view').find('.duration').html(e.data[0].style_duration)
/*
$('#full_view').find('#image1').attr('src', 'uploads/img1.jpg' ); 
*/
$('#full_view').find('.style_image1').html('<img class="col-sm-4 img-responsive style_img" src ="' + e.data[0].style_image1 + '" alt="show_img">')


$('#full_view').find('.style_image2').html('<img class="col-sm-4 img-responsive style_img" src ="' + e.data[0].style_image2 + '" alt="show_img">')

$('#full_view').find('.style_image3').html('<img class="col-sm-4 img-responsive style_img" src ="' + e.data[0].style_image3 + '" alt="show_img" >')


var url = 'edit_view_service_page.php? id="'+ e.data[0].category_id +'" '

$("#full_view").find("#edit").attr('href', url)
	}, 2000)


} else if (e.response == 409) {
alert(e.message)
} else if (e.response == 405) {
alert(e.message)
}
} catch (e1) {
alert(e)
}
},
error: function (e) {
	alert("this no work at all")
}
})

}

function redirect () {

var url = "edit_view_service_page.php? id='"+ e.data[0].category_id +"' " 
	return url ;  
}

/*
 show error message 
<div id="message" style></div>

  $("#message").html("delete message  was successful").css({"background-color":"pink","font-size":"150%"});
    $("#message").fadeOut(2000);

   */


</script>
