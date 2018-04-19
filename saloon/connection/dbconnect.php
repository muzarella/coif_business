
<?php 
$localhost = "localhost";
$password="";
$user = "root";
$dbname = "coif_salon";

$conn = mysqli_connect($localhost, $user,$password,$dbname );
if (!$conn){
	die(  "problem connecting to database".mysqli_error() );

}

$selectdb = mysqli_select_db($conn,$dbname);
if(!$selectdb) {

	die("unable to connect to mysql:".mysqli_error($conn)) ;
}

?>

