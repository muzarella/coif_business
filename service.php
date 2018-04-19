<?php

include ("connection/header.php" );
 ?>
<!-- end of navigation bar    -->

<div class="container">
<div class="col-sm-12">

    <form role="form" class="form-inline">
    
<div class="form-group">
<label for="search">search </label>
<input type="text" name="" class="form-control" >
<button type="submit" class="btn btn-default"> submit</button>

</div>      


    </form>
</div>
<!-- end of search stylist shop  -- >

<!--  container for stylist shop and their description -->
<div class="container">
  <div class="col-sm-12">
<!-- the beiginning of row of the stylist shop  -->
<div class="row">

<div class="col-lg-12" style="background: url('images/images (6).jpg') no-repeat  center;
  background-size: 100%; height: 350px;">
 <!--  <img src="images/images (6).jpg" class="img-rounded" alt="my shop" id="#img-big" /> -->
  
</div>

</div>

<h3> Shop Name </h3>
<br />




<!-- end of row handling the stylist shop -->
  </div>


<br />
<!-- beginning of user info  -->
<div class="col-sm-12" id="user-info">

  <div class="col-sm-6">
    
<img class="img-responsive img-circle" src="images/images (5).jpg" alt="My hair style" />

<br />
<br />
<p> user name </p> 

  </div>

  <div class="col-sm-6">
    
<h3> location:</h3>
<p>city: <span> Lagos state </span> </p>
<p>local-goverment: <span> Ikorodu </span> </p>
<p>bus-stop: <span> odungunyan </span> </p>
<p>street: <span> community street </span> </p>

  </div>

</div>
<!-- end of user info -->

<!-- the beggining of tab -->
<div class="">


<div class="col-sm-8">
<br />
<br />
<br />
<ul class="nav nav-tabs">

 <li class="active"><a data-toggle="tab" href="#description" >Description</a></li>

  <li class=""> <a data-toggle="tab" href="#service"> Service </a> </li>

</ul>
<div class="tab-content">

<div id="description" class="tab-pane fade in active">
  <br /> <br />
<h3> My Description </h3>
<p>mop hair salon is a full service for men and woman's hair salon located in lagos Nigeria 

our professional team is currently with all the latest styles to provide you with your look 

we specialize for the highest quality service while maintaining a fun, frienjdly, non-pretentous environment.
</p>


  
</div>

<div id="service" class="tab-pane fade">
  <br /><br />

<!-- filter select  -->
  <div>
  
<form class="w3-container w3-card-4" action="#">
  <h1>Select Your Free Option</h1>

  <select class="w3-select" name="option">
    <option value="" disabled selected>Choose your option</option>
    <option value="1"> Male </option>
    <option value="2"> Female</option>
    <option value="3"> Body care </option>
  </select>
<br />
  <p> <br /> <button class="w3-btn w3-teal">Search</button></p>
</form>

  </div>
<br /> <br />
  <!-- end filter select  -->

<!-- begining of hair service   -->
<!-- show all hair style -->
<div class="row col-sm-12">
  <div class="col-sm-8">
<p> <input type="text" name="" placeholder="hair style Name"> </p>
<img class="img-responsive" src="images/images (5).jpg" alt="My hair style" />
<br />
<p> <button class="w3-btn w3-teal"> Book now  </button>  </p>

</div>

<div class="col-sm-4">
  <h5> Style information </h5>

<p> we provide you with special sevice </p>
  <p> Salon Hours:</p>
  


</div>

</div>
<!-- ending of show all hair style -->
  

</div>



</div>
</div>

 </div>

<!-- the ending of tab  -->
</div>
<!-- end ofstylist container  -->


<br />
<!-- begging of image  -->
<div class="col-sm-10">
<div class="row">
<div class="col-sm-4">
<h3> Your style </h3>
<img class="img-responsive" src="images/shop1.jpg" alt="My hair style" />

</div>
<div class="col-sm-4">
<h3> Your style </h3>
<img class="img-responsive" src="images/shop1.jpg" alt="My hair style" />

</div>
<div class="col-sm-4">
<h3> Your style </h3>
<img class="img-responsive" src="images/shop1.jpg" alt="My hair style" />

</div>
  
</div>
</div>
<!-- end of images  -->

</div>
<!--  end of div for container   -->
<br />

<?php

include ("connection/footer.php" );
 ?>
