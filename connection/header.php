<?php 
session_start();
?>

<!--- header page  -->
<!DOCTYPE html>
<html>
<head>
	<title> COIF CARE </title>
 <link rel="stylesheet" href="bootstrap/3.3.6/css/bootstrap.css" />
 <link rel="stylesheet" type="text/css" href="style/w3.css">

  <script src="jquery-3.1.1.js"></script>
   <script src="bootstrap/3.3.6/js/bootstrap.min.js" ></script>
   <script type="text/javascript" src="js/script.js"></script>

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
#img-big {
 max-width: 100%;
    max-height: 50%;
}

</style>
</head>

<body>
<div>
<nav class="navbar navbar-inverse">
<div class="">

<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> 
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
 <a class="navbar-brand" href="welcome.php">COIF </a> 
</div>

<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav">
  <li class="active"><a href="beutycare.php">Product</a></li>
  <li> <a href="service.php">Service</a></li>
  <li><a href="location.php"> locations</a></li>
  <li><a href="gallery.php"> Gallery </a></li>
  <li><a href="contact.php"> contact </a></li>

</ul>
  
</div>

</div>
  
</nav>
</div>
<!-- end of navigation bar    -->