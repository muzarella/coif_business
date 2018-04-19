
<?php
session_start();

if (!isset( $_SESSION['saloon_users'])){
header("location:saloon.php");

}

$saloon_user = $_SESSION['saloon_users'];

 ?>

<?php 
include ("connection/dbconnect.php") ;


if (isset($_POST['submit_service'])){

  if(isset($_SESSION['saloon_users'])){
          /*  $saloon_name = $_SESSION['saloon_name']; //$_SESSION['isLogged'];
            $title = $_POST['title'];
			$cat = $_POST['cat'];
            $desc = $_POST['desc'];
            //$image = $_FILES['image'];
            $price = $_POST['price'];
			$upload = false;*/

$saloon_name = $_SESSION['saloon_users'];
$category = $_POST['categories'] ; 
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
   $sql = "INSERT INTO services ( saloon_name,category ,style_name, style_desc, style_image_1, style_image_2, style_image_3,style_cost,Style_duration) VALUES ('$saloon_name','$category' ,'$style_name', '$style_description', '$saveto1', '$saveto2', '$saveto3', '$style_amount', '$style_duration') ";

$query = mysqli_query($conn, $sql );
if ($query){

echo "data inserted Successfully";

}else{

echo "data cannot be inserted";
die();

}

}else {
	echo " image cannot be uploaded try again " ;
}

}else {
	echo " images not set or selected please ensure you select an image " ;
}

}else {
  echo " Unauthorized users not permitted";
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

 /*
			if(empty($_FILES['image1']['name'])){
				//trigger_error("Please select at least one image to continue");
                trigger_error($_FILES['image1']["error"]);
                $upload = false;
			}else{
                $check = (getimagesize($_FILES['image1']['tmp_name']));
                if(!$check){
                 //trigger_error("File is not an image");
                  trigger_error($_FILES['image1']["error"]);
                  $upload =  false;
                }else{
                    $image1 = $_FILES['image1']['name'];
                    $saveto1 = "uploads/$category/".basename($_FILES['image1']['name']);
                    //$pfn1 = move_uploaded_file($_FILES['image1']['tmp_name'], $saveto);


                    $upload =  true;
                  }
                }
            if($upload){
               $request = $mysql->query("INSERT INTO products (seller_id , item_title , item_desc , item_image , item_price , category) VALUES('$seller' , '$title' , '$desc' , '$saveto' , '$price' , '$cat')");
                if(!$request->isError()){
                    echo json_encode(array(
                        "response" => 200,
                        "message" => "Product Added Successfully"
                    ));
					echo "<script>window.location.href='ad'</script>";
                }
            }else{
				echo " could not insert into the database"
                echo json_encode(array(
                    "response" => 405,
                    "message" => "Upload Error"
                ));
            }
           
        }else{

        	echo " image cannot be uploaded try again " ;
            /*echo json_encode(array(
                "response" => 409,
                "message" => "Unauthorized"
            ));
        }
**/

?>







<?php 
/*
CREATE TABLE services
(

category_id int NOT NULL AUTO_INCREMENT,
Saloon_name varchar (50) NOT NULL,
style_name varchar(255) NOT NULL,
style_desc varchar (255) NOT NULL,
style_image_1 varchar(255) NOT NULL,
style_image_2 varchar(255) NOT NULL,
style_image_3 varchar(255) NOT NULL,
style_cost int NOT NULL,
Style_duration Varchar(255) NOT NULL, 


PRIMARY KEY (category_id),
FOREIGN KEY (saloon_name) REFERENCES salon_owners(saloon_name)

);




CREATE TABLE `stock`.`stockk` ( `id` INT NOT NULL AUTO_INCREMENT , `category_id` INT NOT NULL , `saloon name` VARCHAR(255) NOT NULL , `images` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;*/
?>