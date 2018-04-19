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
 


<div>

  <br />
<div class="container">

<div class="well well-lg"> Account information <span class="label label-warning" >settings</span>
<button style="float: right;" type="button" class="btn btn-info" data-toggle="modal" data-target="#editmodal<?php echo $saloon_user ; ?>" > Edit Account  </button>

</div>

<!-- showing profile  -->
<div>
  

  <div class="col-sm-12">

<?php
include("../connection/dbconnect.php");


$sql = "SELECT * FROM salon_owners WHERE saloon_name = '$saloon_user' " ;
$query =  mysqli_query($conn, $sql);

$row = mysqli_fetch_array($query);

/*
$id = $row["id"] ;
$firstname = $row["first_name"] ;
$lastname = $row["last_name"] ;
$saloon_name = $row["saloon_name"] ;
$email = $row[" email "] ;
$password1 = $row["password"] ;
$phone_number = $row["phone_number"] ;
$country =  $row["country"] ;
$city = $row["state"] ;
$lcda = $row["local_government"] ;
$area = $row["area"] ;
$street = $row["street"] ;
$full_address = $row["full_address"] ;
$service = $row["service"] ;
// $image = $row["image"] ;
// $user_image = $row ["user image" ] ;
*/
?>
 

<!-- the beiginning of row of the stylist shop  -->
<br />

<div class="row">

<div class="col-sm-6">
<h3> Shop Name: <?php echo $row["saloon_name"] ;  ?> </h3>
<div class="">
  <img src="../images/images (6).jpg" class="img-responsive" alt="my shop" height="100" />
</div>

</div>

<div class="col-sm-6">
<h3> Shop Name: <?php  echo $row["first_name"]." ". $row["last_name"] ?></h3>
<div class="">
  <img src="../images/images (6).jpg" class="img-responsive" alt="my shop" height="100" />
</div>

</div>


</div>
<br />
<br />
<!-- start of deails  -->
<div class="row">
  <div class="col-sm-6">
    <h1>User information </h1>
<p> Saloon name: </p>
<p>owners Name:  </p>
<p> email: </p>
<p> phone number </p>


  </div>

  <div class="col-sm-6">
    <h1> Saloon location </h1>
    <p> country:  </p>
    <p> city located: </p>
    <p> local government area: </p>
    <p> Area located: </p>
    <p> street: </p>
    <p> full contact address </p>
</div>

</div>
<!-- ending of details  -->


<!-- start of description  -->
<div class="row">
  

<div class="col-sm-8">

<div id="description" class="tab-pane fade in active" >
<h3> My Description </h3>
<p>mop hair salon is a full service for men and woman's hair salon located in lagos Nigeria 

our professional team is currently with all the latest styles to provide you with your look 

we specialize for the highest quality service while maintaining a fun, frienjdly, non-pretentous environment.


 </p> 
</div>

<div id="service" class="" >
  <p> we provide you with special sevice </p>
  <p> Salon Hours</p>
  

</div>

</div>


</div>
<!-- end of description  -->





<!-- end of row handling the stylist shop -->




<?php 


?>
  </div>




</div>
<!-- ending of showing profile  -->

</div>


<?php

include ("edit_profile_page.php" );
 ?>


<?php

include ("connection/footer.php" );
 ?>

