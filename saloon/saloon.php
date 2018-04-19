<?php

// include ("connection/header.php" );
 ?>
 <!DOCTYPE html>
 <html>
 <head>
  <title> Log in </title>
 <link rel="stylesheet" href="../bootstrap/3.3.6/css/bootstrap.css" />
 <link rel="stylesheet" type="text/css" href="../style/w3.css">

  <script src="../jquery-3.1.1.js"></script>
   <script src="../bootstrap/3.3.6/js/bootstrap.min.js" ></script>
   
<style>
 footer {
      background-color: #555;
      color: white;
      padding: 15px; 
    }
  #bg {
    /**background-image:url(images/banner.jpg); **/
background-repeat: no-repeat;

background: transparent url(images/banner.jpg) no-repeat scroll 0% 0% / cover;
min-height: 564px;


  }

  #submit_id{

    background-color:blue;
    color: white ;
  }


  .modal-header, h4 {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .close {

     background-color: red !important;
      color:white !important;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }

</style>
</head>


 <body>
 

<div class="container">
<div class="jumbotron" style=" background-color: #f4511e;">

<h1 style="text-align: center;">WELCOME TO COIF </h1>
<h2 style="text-align: center;"> BEUTY SALON SERVICE CARE </h2>
<p  style="text-align: center;"><span class="label label-primary"> <sample>  We provide full service to care for you </sample> </span> </p>
</div>
</div>
<!-- container  end   -->

<!-- container  start for form    -->
 <div class="container">
<div class="w3-card-4" style="margin: auto;  width:60%;">

<form method="POST" action="add_users.php">
  
<fieldset>
  <div class="w3-container w3-red">
  <p style="text-align: center; font-size: 24px;"> Log in </p>
</div>
  <br />
<div class="form-group col-md-12">
  <label> <span class="glyphicon glyphicon-user"></span> saloon name</label>
<input  type="text" name="saloon_name" class="form-control col-sm-6" placeholder="Enter your username here... " required />
</div>

<div class="form-group col-md-12">
<label> <span class="glyphicon glyphicon-eye-open"></span> password </label>
<input type="password" name="password" class="form-control col-sm-6"   placeholder="Enter your passwod here.." required />

</div>
  
  <div class="form-group col-md-4">
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="submit" class="form-control" id="submit_id" name="submit_login" value=" Submit ">
</div>

</fieldset>


</form>

<br />
<!-- div for register  -->
 <div>
<p> &nbsp; &nbsp; &nbsp; &nbsp; If not a member please register here... <button type="button" class="btn btn-primary" data-toggle="modal" data-target= "#myRegister"><span class="glyphicon glyphicon-off"></span> Register here  </button> </p>

 </div>
<!-- end of register  -->
<br />
</div>
<!-- end of card  -->
 </div>
<!--  container ends here  -->

<!-- creating a modal class  -->
<div id="myRegister" class="modal fade" role="dialog"> 

  <div class="modal-dialog">

 <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="btn btn-danger close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-header">  Registar </h4>
      </div>
      <br />
      <div class="modal-body">
<div class="row">


<form method="POST" action="add_users.php">

<div class="form-group col-md-12">
  <label>First Name</label>
<input  type="text" name="first_name" class="form-control col-sm-6" placeholder="Enter your firstname here... " required />
</div>


<div class="form-group col-md-12">
  <label>Last Name</label>
<input  type="text" name="last_name" class="form-control col-sm-6" placeholder="Enter your lastname here... " required />
</div>


<div class="form-group col-md-12">
  <label>Saloon Name</label>
<input  type="text" name="saloon_name" class="form-control col-sm-6" placeholder="Enter your username here... " required />
</div>


<div class="form-group col-md-12">
  <label>Email</label>
<input  type="email"  name="email" class="form-control col-sm-6" placeholder="Enter your email here... " required />
</div>


<div class="form-group col-md-12">
  <label>Password</label>
<input  type="password" name="password1" class="form-control col-sm-6" placeholder="Enter your password here... " required />
</div>


<div class="form-group col-md-12">
  <label>Confirm-Password</label>
<input  type="password" name= "password2" class="form-control col-sm-6" placeholder="Enter your password again " required />
</div>



<div class="form-group col-md-12">
  <label>Phone number </label>
<input  type="text" name="phone_number" class="form-control col-sm-6" placeholder="Enter your phone number here... " min="1" max="11" required />
</div>



<div class="form-group col-md-12">
  <label> country </label>
<input  type="text" name="country" class="form-control col-sm-6" placeholder="Enter your country here... " required />
</div>



<div class="form-group col-md-12">
  <label> state </label>
<input  type="text" name="state" class="form-control col-sm-6" placeholder="Enter your city here... " required />
</div>

<div class="form-group col-md-12">
  <label> local-goverment area </label>
<input  type="text" name="lcda" class="form-control col-sm-6" placeholder="Enter your area here... " required />
</div>


<div class="form-group col-md-12">
  <label> Area Bus-stop</label>
<input  type="text" name="area" class="form-control col-sm-6" placeholder="Enter your bus-stop name here... " required />
</div>


<div class="form-group col-md-12">
  <label> street </label>
<input  type="text" name="street" class="form-control col-sm-6" placeholder="Enter your shop street name here... " required />
</div>

<div class="form-group col-md-12">
  <label> shop-full address location </label>
<input  type="text" name="full_address" class="form-control col-sm-6" placeholder="Enter your city here... " required />
</div>


<div class="form-group col-md-4">
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="submit" name="submit_reg" class="form-control" id="submit_id" value=" Submit ">
</div>

</form>

</div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"> <span class="glyphicon glyphicon-remove"></span>Close</button>
      </div>

    </div>
<!-- modal content close  -->



  </div>

</div>


<!-- end of modal class  -->

<?php

include ("../connection/footer.php" );
 ?>