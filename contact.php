<?php

include ("connection/header.php" );
 ?>

<!-- end of navigation bar    -->

<style>
  body {
    background-image:url(images/pexels-photo.jpeg);

  }

</style>

<div class="container">

<div class="jumbotron" style=" background-color: #f4511e;">

<h1 style="text-align: center;"> COIF </h1>
<h2 style="text-align: center;"> BEAUTY SALON SERVICE CARE </h2>
<p  style="text-align: center;"><span class="label label-primary"> <sample> CONTACT US</sample> </span> </p>
</div>

<!-- container for the contact    -->
<div class="container">

<div class="">
<ol class="breadcrumb"> 
<li><a href="index.php">Home</a></li>
<li class="active"> Contact </li>

</ol>

</div>

<!-- contact us form start here  -->
<div class="row" style="background-color:#ff3300; border-radius: 5px;">
<!-- iframe for contact map start here  -->
<div class="col-md-6">
<div class="">
<h3>Find Us Here  </h3>

<div class="map">
<iframe src=""></iframe>
</div>

<div class="">
<h3> Company Information </h3>
<p> 47,badagry express road  </p>
<p> lasu ojo lagos state  </p>
<p> Nigeria </p>
<p>Phone Number: 000000000000 </p>
<p> </p>

</div>

</div>


</div>
<!-- iframe for map ends herre  -->

<div class="col-md-6">
<div class="">
 <form class="form-horizontal" role="form">
<span></span><br />
<div class="form-group">
    <label class="control-label col-sm-2" for="name">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="Enter Name">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="Enter email">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="mobile">Mobile:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="subject">Subject:</label>
    <div class="col-sm-10">
      <textarea name="msgbox" class="form-control" placeholder="Type your message here "></textarea> 
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>

</form>

</div>
</div>
<!-- contact us form ends here  -->

<!-- <div>
<form>
  <input type="text" name="" class="text"  onfocus="this.value='' ;"  onblur="if (this.value=='') {this.value='Email';}">
</form>
</div> -->
</div>






</div>
<!-- end of containeer for the contact -->
<!-- footer start here    --   >

<?php

include ("connection/footer.php" );
 ?>