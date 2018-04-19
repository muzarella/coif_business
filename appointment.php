
<?php

include ("connection/header.php" );
 ?>

 <div class="container"> 
  <div class="col-sm-12">
<!-- the beiginning of row of the stylist shop  -->
<div class="row">

<div class="col-lg-12" style="background: url('images/images (6).jpg') no-repeat  center;
  background-size: 100%; height: 350px;">
 <!--  <img src="images/images (6).jpg" class="img-rounded" alt="my shop" id="#img-big" /> -->
  
</div>

</div>
height="300" width="1024" 
<h3> Shop Name </h3>
<br />




<!-- end of row handling the stylist shop -->
  </div>


<!-- show all hair style -->
<div>
<div class="row col-sm-12">
  <div class="col-sm-4">

<img class="img-responsive img-circle" src="images/images (5).jpg" alt="My hair style" />


</div>
 <div class="col-sm-4">

<img class="img-responsive img-circle" src="images/images (5).jpg" alt="My hair style" />


</div>
 <div class="col-sm-4">

<img class="img-responsive img-circle" src="images/images (5).jpg" alt="My hair style" />


</div>

</div>


<div class="col-sm-12">

<br />

<p> <input type="text" name="" placeholder="hair style Name"> </p>

  <h5> Style information </h5>

<p> we provide you with special sevice </p>
  <p> Salon Hours:</p>
  


</div>

<p> <button class="w3-btn w3-teal" id="click_appointment"> Click here to Book now  </button>  </p>
</div>

<!-- ending of show all hair style -->
  




<!-- the container for the appiontment -->

<br />
<div class="col-sm-10" id="appointment">

<h3> APPOINTMENT </h3>
<br />
<div class="row">
  <div class="col-sm-6">
  <form class=" form-inline"  role="form">
  
  <div class="form-group has-success has-feedback">
   <span class="glyphicon glyphicon-calendar form-control-feed">
     </span>

      <input type="text" class="form-control">
    
   </div><!-- /input-group -->
   <br /><br />

   <div class="form-group has-success has-feedback">
   <span class="glyphicon glyphicon-calendar form-control-feed">
     </span>
      <input type="text" class="form-control">
       
   </div><!-- /input-group -->
  <br /><br />
   
   <div class="form-group has-success has-feedback">
   <span class="glyphicon glyphicon-time form-control-feed">
     </span>
      <input type="text" class="form-control">
       
   </div><!-- /input-group -->
  </form>

</div>


</div>


</div>
<!-- the end of appointment container  -->


<br />


 </div>

<script type="text/javascript">
	
$(document).ready (function(){


$("#appointment").hide();

})

$(document).on("click","#click_appointment",function(){
$("#appointment").fadeIn("slow");

});

</script>

<?php

include ("connection/footer.php" );
 ?>
