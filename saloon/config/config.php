<?php 
session_start();

include ("../connection/dbconnect.php") ;


include 'MySQL.php';
$mysql = new MySQL("localhost" , "root" , "" , "coif_salon");

if($mysql->isError()){
	trigger_error("Sorry an Error Occurred");
}


if (!isset( $_SESSION['saloon_users'])){
header("location:saloon.php");

}

 ?>

<?php 



$action = $_POST['action'];

// display in table for service 
if ($action =="proL"){

if(isset($_SESSION['saloon_users'])){
$saloon_owner = $_SESSION['saloon_users'];


$sql = " SELECT * FROM services WHERE saloon_name ='$saloon_owner' " ;
$result = mysqli_query($conn, $sql) or die ("Error");
//$result = $mysql-> query();

if($result){
if (mysqli_num_rows($result) > 0){
$data =[];

while($row = mysqli_fetch_array($result)){

array_push($data , array(
"category_id"=>$row['category_id'],
"category" => $row['category'],
"style_name" => $row['style_name'],
"style_desc" => $row['style_desc'],
"style_cost" => $row['style_cost'],
//"image1" => $row['style_image_1'],
"style_duration" => $row['style_duration'],
"saloon_name" => $row['saloon_name']
                    ));

                    }


          
echo json_encode(array(
"response" => 200,
"message" => "Connected Successfuly",
"data" => $data
    ));

}else {
 echo json_encode(array(
"response" => 201,
"message" => "No content Posted yet",
"data" => []
        ));

}




}else {
  
echo json_encode(array(
  "response" => 405,
"message" => "We Encountered an Error trying to process your request. Please try again",
    "data" => []
                )); 

}


}else {
   
echo json_encode(array(
 "response" => 409,
"message" => "Unauthorized"
            ));

}
// end of session 
  
}
// end of prol  if statement 

// beggining of delete 

if ( $action == "delete"){

if (isset($_SESSION['saloon_users'])) {
$saloon_owner = $_SESSION['saloon_users'];
$uid = $_POST['uid'] ;

$sql = " DELETE FROM services WHERE category_id = '$uid'  && saloon_name='$saloon_owner'" ;
$result = mysqli_query($conn, $sql) or die ("Error in connecting ".mysqli_error($conn));

if ($result) {

echo json_encode( array(
"response" => 200,
"message" =>"Delete item successfully",
"data" =>[]

));


}else {

//echo mysqli_error($conn) ;
echo json_encode(array(
"response"=>405,
"message" =>"We encountered an error delecting this file ",
"data" =>[]


));

}

}else {

echo json_encode(array(
"response" => 409 ,
"message" => "unauthorised to delete "

    ));
}




}

// ending of delete 


// begging of full view modal 

// display in table for service 
if ($action =='refresh'){
$id = $_POST["id"];

if(isset($_SESSION['saloon_users'])){
$saloon_owner = $_SESSION['saloon_users'];


$sql = " SELECT * FROM services where category_id= '$id' && saloon_name ='$saloon_owner'" ;
$result = mysqli_query($conn, $sql) or die ("Error");
//$result = $mysql-> query();

if($result){
$data =[];

while($row = mysqli_fetch_array($result)){

array_push($data , array(
"category_id"=>$row['category_id'],
"style_category" => $row['category'],
"style_name" => $row['style_name'],
"style_desc" => $row['style_desc'],
"style_amount" => $row['style_cost'],
"style_duration" => $row['style_duration'],
"saloon_name" => $row['saloon_name'],
"style_image1" =>$row['style_image_1'],
"style_image2" =>$row['style_image_2'],
"style_image3" =>$row['style_image_3']

));

                    }


          
echo json_encode(array(
"response" => 200,
"message" => "Connected Successfuly",
"data" => $data
    ));



}else {
  
echo json_encode(array(
  "response" => 405,
"message" => "We Encountered an Error trying to process your request. Please try again",
    "data" => []
                )); 

}


}else {
   
echo json_encode(array(
 "response" => 409,
"message" => "Unauthorized"
            ));

}
// end of session 
  
}
// end of prol  if statement 


// endiing of view modal 



switch($action){

	case 'proL_llll':




/*if(isset($_SESSION['saloon_users'])){

$saloon_owner = $_SESSION['saloon_users'];

$sql = " SELECT * FROM services" ;
$result = mysqli_query($conn, $sql);
//$result = $mysql-> query();
if($result){
$data = array();

if (mysqli_affected_rows($result) > 0){


while($row = mysqli_fetch_array($result){

array_push($data , array(

"category" => $row['category'],
"style_name" => $row['style_name'],
"style_desc" => $row['style_desc'],
"style_cost" => $row['style_cost'],
//"image1" => $row['style_image_1'],
"style_duration" => $row['style_duration'],
"saloon_name" => $row['saloon_name']
                    ));

                    }
            
echo json_encode(array(
"response" => 200,
"message" => "Connected Successfuly",
"data" => $data
    ));



echo " value output ".$saloon_owner ;

}else {

    echo json_encode(array(
"response" => 201,
"message" => "No content Posted yet",
"data" => []
        ));
}

}else{
echo json_encode(array(
  "response" => 405,
"message" => "We Encountered an Error trying to process your request. Please try again",
    "data" => []
                )); 
        }


}else{
echo json_encode(array(
 "response" => 409,
"message" => "Unauthorized"
            ));
        }*/
//echo " value output ".$saloon_owner ;

break;

	case "search":
		$search = $_POST['param'];
		$result = $mysql->query("SELECT * FROM products WHERE item_title LIKE '%$search%'");
    if(!$result->isError()){
        if($result->size() > 0){
            $data = [];
            while($row = $result->fetch()){
                array_push($data , array(
                    "item_id" => $row['item_id'],
                    "item_title" => $row['item_title'],
                    "item_desc" => $row['item_desc'],
                    "item_price" => $row['item_price'],
                    "item_image" => $row['item_image'],
                    "date_added" => $row['date_added']
                ));
            }
            echo json_encode(array(
                "response" => 200,
                "message" => "Connected Successfuly",
                "data" => $data
            ));
        }else{
            echo json_encode(array(
                "response" => 201,
                "message" => "No results found",
                "data" => []
            )); 
        }
        
    }else{
        echo json_encode(array(
            "response" => 409,
            "message" => "Unable to Establish Connection. Please Check your Internet"
        ));
    }
	break;
       
	case "logout":
		if(isset($_SESSION['seller'])){
			session_unset();
			echo json_encode(array(
				"response" => 200,
				"message" => "You've been logged out successfully",
				"data" => []
			));
		}else{
			echo json_encode(array(
				"response" => 409,
				"message" => "User not logged in",
				"data" => []
			));
		}
		break;
    default:
    break;
}
?>
