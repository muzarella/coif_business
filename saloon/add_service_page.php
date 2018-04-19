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


<!-- ending of nav pannel  -->
<!-- begginign of container  -->
<div class="container">

<div>
<p> Add to  categories </p>
<p> Remove from caegories </p>
</div>

 <form method="post" action="add_service.php" enctype="multipart/form-data"> 

  <div class="form-group col-md-6">
  <label for="service"> select categories</label>
  <select  name="categories" class="form-control" id="service">
  <option></option>
  <option>  Male hairstyle </option>
  <option>  female hairstyle </option>
  <option>  Make up  </option>
  <option> Manicure  </option>
  <option>  Predicure </option>
  </select>
</div>


  <div class="form-group col-md-6">
    <label for="style_name"> Enter the style name you wish to add (eg woman-braid, male-punk) </label> 

<input type="text" name="title"    class="form-control" id="style_name" placeholder="enter the style name" required />

      </div>


<div class="form-group col-md-6">
  <label> Amount cost for the  service    </label>
<input  type="text" name="price_cost" class="form-control" placeholder="Enter amount to make this style " required />
</div>


<div class="form-group col-md-6">

  <label> Duration for the service(eg 1 hr)</label>
<input  type="text" name="duration" class="form-control" placeholder="Enter the amount to make this style " required />

</div>
<div>
  <p> select images to display for your style </p>
</div>
<div class="row">

<div class="form-group col-sm-4">

  <label> Select 1 image to display</label>
<input  type="file" name="image1" class="form-control" placeholder="" required />

</div>


<div class="form-group col-sm-4">

  <label> Select 2 image to display </label>
<input  type="file" name="image2" class="form-control" placeholder="" required />

</div>



<div class="form-group col-sm-4">

  <label> Select 3 image to display</label>
<input  type="file" name="image3" class="form-control" placeholder="Enter the amount to make this style " required />

</div>

</div>

<div class="form-group col-md-6">

  <label> Description about hair </label>
<textarea rows="5" name="description" class="form-control" placeholder=" write the description of the hair syle" required > </textarea>

</div>


<input type="submit" name="submit_service" value=" submit" />


</form>

</div>
<!-- ending of container  -->





