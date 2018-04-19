<?php
session_start();

include ("../connection/dbconnect.php") ;


if (!isset( $_SESSION['saloon_users'])){
header("location:saloon.php");


}

$saloon_user = $_SESSION['saloon_users'];


//echo $id ;
$id = $_GET['id'] ; 
 ?>

 
 
<?php

include ("connection/header.php" );
 ?>

<?php 



if (isset($_POST["update"])) {

if (isset($_SESSION['saloon_users'])){

  $saloon_name = $_SESSION['saloon_users'];
//$category = $_POST['categories'] ; 
$style_name = $_POST['title'] ;
$style_duration =$_POST['duration'];
$style_amount = $_POST['price_cost'];
$style_description = $_POST['description'];
/*$style_image_1 = $_POST['image1'];
$style_image_2 = $_POST['image2'];
$style_image_3 = $_POST['image3'];*/
//$upload = false; 
$style_image_1 = $_FILES['image1'];
$style_image_2 = $_FILES['image2'];
$style_image_3 = $_FILES['image3'];

//$image1 = ($_FILES['image1']['name']);
 $saveto1 = ("uploads/$category/".basename($_FILES['image1']['name']));


 // $image2 = ($_FILES['image2']['name']);
  $saveto2 = ("uploads/$category/".basename($_FILES['image2']['name']));


 // $image3 = ($_FILES['image3']['name']);
  $saveto3 = ("uploads/$category/".basename($_FILES['image3']['name']));

  //$pfn1 = move_uploaded_file($_FILES['image1']['tmp_name'], $saveto);

if (isset($style_image_1) && isset($style_image_2) && isset($style_image_3) ){
  
$save_image1 =  upload_image1($saveto1) ;
$save_image2 =  upload_image2($saveto2) ;
$save_image3 =  upload_image3($saveto3) ;

if (($save_image1) && ($save_image2) && ($save_image3) ){
  //category = '$category',
   $sql = "UPDATE services SET  saloon_name='$saloon_name', style_name= '$style_name',  style_desc= '$style_description',  style_image_1= '$saveto1', style_image_2='$saveto2', style_image_3= '$saveto3', style_cost = '$style_amount', Style_duration = '$style_duration' WHERE category_id = '$id' AND saloon_name = '$saloon_name'" ;

$query = mysqli_query($conn, $sql );
if ($query){

echo "data updated Successfully";

}else{

echo "data cannot be updated";
die();

}

}else {
  echo " image cannot be uploaded try again " ;
}

}else {
  echo " images not set or selected please ensure you select an image " ;
}

}else {
  echo " unauthorized user not permitted " ;
}

}





  function upload_image1($path){
//print_r($_FILES);
$fileError = $_FILES['image1']['error'];

if(empty($_FILES['image1']['name'])){
//trigger_error("Please select at least one image to continue");
echo " your file is empty".$fileError;
 return false;
}else{

 $check = (getimagesize($_FILES['image1']['tmp_name']));
 if(!$check){
 //trigger_error("File is not an image");
  echo "cannot get file size" .$fileError;
   return false;
   }else{
    //$fileNameNew = uniqid('', true).".".$fileActualExt ;
   $image = $_FILES['image1']['name'];
   $saveto = $path;
    //$saveto = $path.$image ;

   $pfn1 = move_uploaded_file($_FILES['image1']['tmp_name'], $saveto);
  return true;
      }
         }
/*}else {
  echo " you cannot upload this kind of file";
}*/


       }

//end uploading file 


function upload_image2($path){
//print_r($_FILES);
$fileError = $_FILES['image2']['error'];

if(empty($_FILES['image2']['name'])){
//trigger_error("Please select at least one image to continue");
echo " your file is empty".$fileError;
 return false;
}else{

 $check = (getimagesize($_FILES['image2']['tmp_name']));
 if(!$check){
 //trigger_error("File is not an image");
  echo "cannot get file size" .$fileError;
   return false;
   }else{
    //$fileNameNew = uniqid('', true).".".$fileActualExt ;
   $image = $_FILES['image2']['name'];
   $saveto = $path;
    //$saveto = $path.$image ;

   $pfn1 = move_uploaded_file($_FILES['image2']['tmp_name'], $saveto);
  return true;
      }
         }
/*}else {
  echo " you cannot upload this kind of file";
}*/


       }

//end uploading file 


  function upload_image3($path){
//print_r($_FILES);
$fileError = $_FILES['image3']['error'];

if(empty($_FILES['image3']['name'])){
//trigger_error("Please select at least one image to continue");
echo " your file is empty".$fileError;
 return false;
}else{

 $check = (getimagesize($_FILES['image3']['tmp_name']));
 if(!$check){
 //trigger_error("File is not an image");
  echo "cannot get file size" .$fileError;
   return false;
   }else{
    //$fileNameNew = uniqid('', true).".".$fileActualExt ;
   $image = $_FILES['image3']['name'];
   $saveto = $path;
    //$saveto = $path.$image ;

   $pfn1 = move_uploaded_file($_FILES['image3']['tmp_name'], $saveto);
  return true;
      }
         }
/*}else {
  echo " you cannot upload this kind of file";
}*/


       }

//end uploading file 


?>

<?php 

$sql = " SELECT * FROM services WHERE category_id = '$id' " ; 
$edit = mysqli_query($conn , $sql )  or die ("Error".mysqli_error());
$row = mysqli_fetch_array($edit);

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
    <li class="active"><a href="#">Service navigation </a> </li>
    <li><a href="view_service.php">View service </a></li>
    <li><a href="add_service_page.php">Add service</a> </li>
    <li><a href="#"> Edit service</a> </li>
  </ul>
</nav>

<!-- ending of nav pannel  -->
<!-- begginign of container  -->
<div class="container">

<!-- <div>
<p> Add to  categories </p>
<p> Remove from caegories </p>
</div> -->

 <form method="post" action="add_service.php" enctype="multipart/form-data"> 

 <!--  <div class="form-group col-m d-6">
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
 -->

  <div class="form-group col-md-6">
    <label for="style_name"> Enter the style name you wish to add (eg woman-braid, male-punk) </label> 

<input type="text" name="title"    class="form-control" id="style_name" value="<?php echo $row['style_name']; ?>" required />

      </div>


<div class="form-group col-md-6">
  <label> Amount cost for the  service    </label>
<input  type="text" name="price_cost" class="form-control" value="<?php echo $row['style_amount']; ?>"  required />
</div>


<div class="form-group col-md-6">

  <label> Duration for the service(eg 1 hr)</label>
<input  type="text" name="duration" class="form-control" value="<?php echo $row['style_duration']; ?>"  required />

</div>

<div>
  <p> select images to display for your style </p>
</div>
<div class="row">

<div class="form-group col-sm-4">

  <label> Select 1 image to display</label>
<input  type="file" name="image1" class="form-control" required />

</div>


<div class="form-group col-sm-4">

  <label> Select 2 image to display </label>
<input  type="file" name="image2" class="form-control" required />

</div>



<div class="form-group col-sm-4">

  <label> Select 3 image to display</label>
<input  type="file" name="image3" class="form-control" required />

</div>

</div>

<div class="form-group col-md-6">

  <label> Description about hair </label>
<textarea rows="5" name="description" class="form-control" value="<?php echo $row['style_description']; ?>"  required > </textarea>

</div>


<input type="submit" name="update" value=" update " />


</form>

</div>
<!-- ending of container  -->





