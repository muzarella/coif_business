

<?php

include ("connection/dbconnect.php" );
 ?>


<?php

include ("connection/header.php" );
 ?>

<?php 

print_r($_GET);

$error_msg = "" ;

if (isset($_GET["country"]) && isset($_GET["location"]) && isset($_GET["area"])  ){

$country = $_GET["country"];
$location = $_GET["location"];
$area = $_GET["area"];


echo "<br />".$country."<br />";
echo $location."<br />";

echo $area."<br />";

 
//////

$sql = "SELECT * FROM salon_owners WHERE  country LIKE'%$country%' AND state LIKE '%$location%' AND local_government LIKE '%$area%' ";
$query = mysqli_query($conn, $sql) or die("ERROR".mysqli_error()) ;
if ($query){


if(mysqli_num_rows($query) > 0) {
while ($output_detail= mysqli_fetch_assoc($query)) {

	$salon_id = $output_detail['saloon_id'];
	$salon_name = $output_detail['saloon_name'];
$salon_country = $output_detail['country'];
$salon_state = $output_detail['state'];
$lcda = $output_detail['local_government'];
$area = $output_detail['area'];
$street = $output_detail['street'];
$service = $output_detail['services'];
$full_address = $output_detail['full_address'];

$shop_image = $output_detail['shop_image'] ;


$link = "window.location='service.php?salon_name = $salon_name '";


	$sql = " SELECT * FROM services WHERE saloon_name = '$salon_name'";
$service_query =mysqli_query($conn, $sql);

?>



<!-- beggining of saloon views -->

  <div class="col-sm-12">

<!-- the beiginning of row of the stylist shop  -->
<div class="row">

<div class="col-sm-4">
<h3> <?php echo $salon_name;  ?> </h3>
<div class="">
  <img src="<?php if($shop !=null || ""){
  	echo '$shop' ;

  }else {
  	echo 'images/images (6).jpg';
  }?>" class="img-responsive" alt="my shop" height="100" />
</div>
<br />
<p><button class="w3-btn w3-purple" onclick="<?php $link; ?>">View service & booking </button></p>
</div>

<div class="col-sm-8">
<br />
<ul class="nav nav-tabs">

 <li class="active"><a data-toggle="tab" href="#description" >Description</a></li>

</ul>
<div class="tab-content">

<div id="description" class="tab-pane fade in active" >
<div class="col-sm-4"> 

<h3> location</h3>
<p>country: <span> <?php echo $salon_country; ?></span> </p>
<p>state: <span> <?php echo $salon_state; ?></span> </p>
<p>local-goverment: <span> <?php echo $lcda; ?> </span> </p>
<p>bus-stop: <span><?php echo $area; ?></span> </p>
<p>street: <span><?php echo $street; ?></span> </p>

</div>

<div class="col-sm-4">
  <h3> Description </h3>
<p> <?php echo $full_address; ?>
<!-- 
our professional team is currently with all the latest styles to provide you with your look 

we specialize for the highest quality service while maintaining a fun, frienjdly, non-pretentous environment. -->


 </p> 

</div>

</div>



</div>
</div>

</div>
<!-- end of row handling the stylist shop -->
  </div>
 <!-- ending  of saloon views -->




<?php 

}


}else {
	echo " there is no data in database " ;
}



}else {
	 die("Error".mysqli_error($conn));
	 echo "no action carried out ";
}

//////


}else {


$error_msg = " no valid city , location or area ";
$_SESSION['error'] = $error_msg;
header("location:location.php");
exit();

}






?>


 <!--  container for stylist shop and their description -->
<div class="container">

	<!-- start of search bus stop and street  -->
<div class="col-sm-12">

    <form role="form" class="form-inline">
    
<div class="input-group">

<span class="input-group-addon">Bus-stop: </span>
<input type="text" name="" class="form-control" placeholder="search for your bus-stop" required="required" />
</div>

<div class="input-group">
	
<span class="input-group-addon"> street: </span>
<input type="text" name="" class="form-control" placeholder="search for your street " >
</div>

<button type="submit" class="btn btn-default" onclick="  "> search</button>      


    </form>
</div>
<!-- end of search stylist shop  -- >
<br />
<br />
<div style="height: 30px;"></div>



<?php

?>



<!-- beggining of saloon views -->

  <div class="col-sm-12">

<!-- the beiginning of row of the stylist shop  -->
<div class="row">

<div class="col-sm-4">
<h3> Shop Name </h3>
<div class="">
  <img src="images/images (6).jpg" class="img-responsive" alt="my shop" height="100" />
</div>
<br />
<p><button class="w3-btn w3-purple">View service & booking </button></p>
</div>

<div class="col-sm-8">
<br />
<ul class="nav nav-tabs">

 <li class="active"><a data-toggle="tab" href="#description" >Description</a></li>

</ul>
<div class="tab-content">

<div id="description" class="tab-pane fade in active" >
<div class="col-sm-4"> 

<h3> location:</h3>
<p>city: <span> Lagos state </span> </p>
<p>local-goverment: <span> Ikorodu </span> </p>
<p>bus-stop: <span> odungunyan </span> </p>
<p>street: <span> community street </span> </p>

</div>

<div class="col-sm-4">
  <h3> Description </h3>
<p>mop hair salon is a full service for men and woman's hair salon located in lagos Nigeria 
<!-- 
our professional team is currently with all the latest styles to provide you with your look 

we specialize for the highest quality service while maintaining a fun, frienjdly, non-pretentous environment. -->


 </p> 

</div>

</div>



</div>
</div>

</div>
<!-- end of row handling the stylist shop -->
  </div>
 <!-- ending  of saloon views -->

</div>
<!-- end ofstylist container  -->


<script type="text/javascript">
	
	
</script>

<?php

include ("connection/footer.php" );
 ?>