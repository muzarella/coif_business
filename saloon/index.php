<?php
session_start();

if (!isset( $_SESSION['saloon_users'])){
header("location: saloon.php");

}

 ?>

 
<?php

include ("connection/header.php" );
 ?>

<!-- beginning of container  -->
<div class="container">


<div class="jumbotron" style=" background-color: #f4511e;">

<h1 style="text-align: center;">WELCOME TO COIF </h1>
<h2 style="text-align: center;"> BEUTY SALON SERVICE CARE </h2>
<p  style="text-align: center;"><span class="label label-primary"> <sample>  We provide full service to care for you </sample> </span> </p>
</div>

</div>
<!-- container  end   -->
<div class="container">
  


</div>


<?php

include ("connection/footer.php" );
 ?>