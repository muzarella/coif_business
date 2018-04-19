<?php session_start(); ?>

<?php 
include("../connection/dbconnect.php");

$firstname = $lastname = $saloon_name = $email = $password1 = $password2 = $phone_number = $country = $city = $state = $lcda = $street = $full_address = $service =$image = $area = "";

if (isset($_POST["submit_reg"])) {

$firstname = check_input( $_POST["first_name"]) ;
$lastname = check_input($_POST["last_name"]) ;
$saloon_name = check_input( $_POST["saloon_name"]) ;
$email = check_input($_POST["email"]) ;
$password1 = check_input($_POST["password1"]) ;
$password2 = check_input( $_POST["password2"] ) ;
$phone_number = $_POST["phone_number"] ;
$country = check_input( $_POST["country"]) ;
$state = check_input( $_POST["state"]) ;
$area = check_input( $_POST["area"] ) ;
$street = check_input( $_POST["street"] ) ;
$full_address = check_input( $_POST["full_address"] ) ;
$lcda = check_input( $_POST["lcda"] ) ;
$date = date("Y-m-d");


// validating our form
$sql_user_check = "SELECT saloon_name FROM salon_owners WHERE saloon_name='$saloon_name' " ;
$query_user = mysqli_query($conn , $sql_user_check);

// $check
$user_check = mysqli_num_rows($query_user);

$sql_email = "SELECT email FROM salon_owners WHERE email='$email'";

$query_email =  mysqli_query($conn,$sql_email); 
$email_check = mysqli_num_rows($query_email);

if ($user_check ==0 ){

if ($email_check==0){

if( $password1 == $password2 ){
	// first check the maximum length of username , firstname and lastname
	if(strlen($saloon_name) > 20 || strlen($firstname) > 20 || strlen($lastname) > 20 ){
			echo "you exceed maximum limit which is 25 chaacters";
	}else {
		// check if password exceed 25 or less than 5 charcters
 	if(strlen($password1) >15 || strlen($password1) <5){
 	echo "your password must be betwen 5 and 15 character long!";
 	}else {
 		//$pswd = md5($password1);
 		// $pswd2 = md5($password1);

$sql = "INSERT INTO salon_owners(first_name,last_name, saloon_name, email, password, phone_number, country, state, local_government , area, street, full_address) VALUES ('$firstname','$lastname','$saloon_name','$email','$password1','$phone_number','$country','$state','$lcda','$area','$street','$full_address')
";
if( mysqli_query($conn , $sql) ){

echo " alert('logged in sucessfull ')" ;

header("location:saloon.php");
}else {
	echo "error:".$sql."<br />".mysqli_error($conn);
}

 	}
	}
}else {
echo "your password dosn't match ";
}


}else {
	  echo "email has been used already please use a new mail! ";
}


}else {
	echo "saloon name  already exist please choose a new saloon name thank you. ";
}



mysqli_close($conn) ;
}




if (isset($_POST["submit_login"])) {

$saloon_name = check_input( $_POST["saloon_name"]) ;
//$email = check_input($_POST["email"]) ;
$password = check_input($_POST["password"]) ;
// $password_md5 = md5($password);


//check for existence if in database zz
$query1 = "SELECT * FROM salon_owners WHERE saloon_name='$saloon_name' AND password='$password' LIMIT 1 ";
$sql = mysqli_query($conn, $query1);
// count the number of rows afected
$userCount = mysqli_num_rows($sql);

if ($sql) {


if ( $userCount > 0 ) {
	while ($row= mysqli_fetch_assoc($sql)) { 
$id = $row["id"];
}

//$_SESSION["id"] = $id;
$_SESSION['saloon_users'] = $saloon_name;
header("location:index.php");
exit();

}else{
	echo " that information is incorrrect, try again";
	exit();
}
}else {
	echo mysqli_error($conn) ;
}

}



function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}




?>




