<?php 
$country ;
$state;
$lga ;

function test_input ($data_entered) {
$data_entered =trim($data_entered);
$data_entered = stripcslashes($data_entered);
$data_entered = htmlspecialchars($data_entered);


}

?>

<?php 
if (isset($_SESSION['error'])){
$error_msg = $_SESSION['error'];

echo   $error_msg;
}


?>



<?php

include ("connection/header.php" );
 ?>

<div class="container"> 
<div class="w3-card-4">

<div class="w3-greeen"> 

<h2 class="w3-center w3-text-blue-grey"> Select Location </h2>

</div>
</div>
<!-- CLOSE CARD -->
<br />
<!-- starting of  search form  -->
<div class="col-md-6">

<form role="form" action="" method="GET" >
<div class="form-group">
	<label for=coutry> select country</label>
	<select  name="" class="form-control" id="country" onchange="validate_city()" >
	<option></option>
	<option> Nigeria </option>
	<option> Ghana </option>
	<option> Brazil </option>

	</select>
</div>

<div class="form-group">
	<label for=coutry> State </label>
	<select type="text" name="" class="form-control" onchange="validate()" id="location" >
	<option class="city">Please select </option>
	<!--  <option>Abia</option>
     <option>Abuja</option>
     <option>Adamawa</option>
     <option>Akwa</option>
      <option>Ibom</option>
     <option>Anambra</option>
  <option>Bauchi</option>
    <option>Bayelsa</option>
   <option>Benue</option>
  <option>Borno</option>
  <option>Cross</option>
  <option>River</option>
  <option>Delta</option>
  <option>Ebonyi</option>
  <option>Edo</option>
  <option>Ekiti</option>
  <option>Enugu</option>
  <option>Gombe</option>
   <option>Imo</option>
   <option>Jigawa</option>
   <option>Kaduna</option>
   <option>Kano</option>
   <option>Katsina</option>
   <option>Kebbi</option>
   <option>Kogi</option>
   <option>Kwara</option>
   <option>Lagos</option>
   <option>Nasarawa</option>
   <option>Niger</option>
    <option>Ogun</option>
    <option>Ondo</option>
    <option>Osun</option>
    <option>Oyo</option>
   <option>Plateau</option>
   <option>Rivers</option>
   <option>Sokoto</option>
   <option>Taraba</option>
   <option>Yobe</option>
   <option>Zamfara</option>
 -->
</select>
</div>

<div class="form-group">

	<label for=coutry> select area </label>
	<select type="text" name="" class="form-control" id="area">
    <option class="areas" >Please select</option>
     </select>

</div>


<script type="text/javascript">
  
  function call_search() {


   var country = $("#country option:selected").val();
    var location = $("#location option:selected").val();
    var area = $("#area option:selected").val();

var link ;
if (country === "" || country=== "Please select" || country=== "Location Unavailable"){
 alert(" no country ");
link = "";
}else if (location === "" || location=== "Please select" || location=== "Location Unavailable"){
 alert("no city ");
link = "";


}else if (area === "" || area=== "Please select" || area=== "Location Unavailable"){
 alert(" no area ");
link ="";
} else {
 link ='category.php?country='+ country+'&'+'location='+location+'&'+'area='+area;
}

return link ;

  }

</script>




<div class="form-group">
<button type="button" class="btn btn-primary" onclick="window.location = call_search()"> submit </button>

</div>

</form>
</div>
<!-- ending of search form  -->
<hr />

<br />
<br />

<!-- showing all shops  -->
<div>


<!-- the container for the appiontment -->
</div>

<!--  ending of showing all shops  -->

</div>

<?php

include ("connection/footer.php" );
 ?>
