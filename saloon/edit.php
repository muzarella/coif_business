<?php
session_start();

if (!isset( $_SESSION['saloon_users'])){
header("location: saloon.php");


}

$saloon_user = $_SESSION['saloon_users'];

 ?>

<?php

include ("connection/dbconnect.php") ;
//$id = $_GET['id'] ;

$saloon_name =  $_GET["saloon_name"];





if (isset($_POST["submit_reg"])) {

if (isset($_SESSION['saloon_users'])){

$firstname = $_POST["first_name"] ;
$lastname =$_POST["last_name"] ;
//$saloon_name = $row["saloon_name "] ;
$email = $_POST["email"] ;
//$password1 = $row[" password "] ;
$phone_number = $_POST["phone_number"] ;
$country =  $_POST["country"] ;
$city = $_POST["state"] ;
$lcda =$_POST["lcda"] ;
$area = $_POST["area"] ;
$street =$_POST["street"] ;
$full_address =$_POST["full_address"] ;



$sql = "UPDATE salon_owners  SET first_name = '$firstname', last_name ='$lastname', phone_number ='$phone_number', country = '$country', state  ='$city' , local_government='$lcda', area = '$area', street= '$street', full_address = '$full_address' WHERE saloon_name = '$saloon_name'  " ;


$query = mysqli_query($conn, $sql) or die("ERROR:".mysqli_error($conn));

if ($query){

echo " was succesfully updated ";
header("location:profile.php") ;
}else{
	echo "could not update records " ;
}

}else {
	echo " unauthorised users "; 
}


}else {
	echo " server could not submit request ";
}



?>