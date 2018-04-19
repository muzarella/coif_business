<?php
session_start();

if (!isset( $_SESSION['saloon_users'])){
header("location: saloon.php");


}

$saloon_user = $_SESSION['saloon_users'];

 ?>

 
 
<?php

include ("connection/header.php" );
 ?>


<!-- beginning of container  -->
<div class="container">


<div class="jumbotron" style=" background-color: #f4511e;">

<h1 style="text-align: center;">WELCOME TO COIF </h1>
<h2 style="text-align: center;"> BEUTY SALON SERVICE CARE </h2>
<p  style="text-align: center;"><span class="label label-primary"> <sample>  We provide full service to care for you </sample> </span> </p>
</div>

</div>
<!-- container  end   -->

 
<!-- creatin the nav panel  -->

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
  <ul class="nav navbar-nav">
    <li class="active"><a href="#">Service navigation </a></li>
    <li><a href="view_service.php">View service </a></li>
    <li><a href="add_service_page.php">Add service</a></li>
    <li><a href="#"> Edit service</a></li>
  </ul>
</nav>


<!-- ending of nav pannel  -->

<div class="container-fluid" style="height:1000px">
  <h1>Some text to enable scrolling</h1>
  <h1>Some text to enable scrolling</h1>
  <h1>Some text to enable scrolling</h1>
  <h1>Some text to enable scrolling</h1>
  <h1>Some text to enable scrolling</h1>
  <h1>Some text to enable scrolling</h1>
  <h1>Some text to enable scrolling</h1>
  <h1>Some text to enable scrolling</h1>
  <h1>Some text to enable scrolling</h1>
  <h1>Some text to enable scrolling</h1>
  <h1>Some text to enable scrolling</h1>

</div>


