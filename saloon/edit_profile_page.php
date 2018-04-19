






<!-- creating a modal class  -->
<div id="editmodal<?php echo $saloon_user ; ?>" class="modal fade" role="dialog"> 

  <div class="modal-dialog">

 <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="btn btn-danger close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-header">  Edit Profile </h4>
      </div>
      <br />
      <div class="modal-body">
<?php

/*
$sql = "SELECT * FROM salon_owners WHERE saloon_name= '$saloon_user'";

$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

*/


 ?>




<div class="row">


<form method="POST" action="edit.php?saloon_name=<?php echo $row['saloon_name'];  ?>">

<div class="form-group col-md-12">
  <label>First Name</label>
<input  type="text" name="first_name" class="form-control col-sm-6" value=" <?php echo $row['first_name'] ; ?> " required />
</div>


<div class="form-group col-md-12">
  <label>Last Name</label>
<input  type="text" name="last_name" class="form-control col-sm-6"  value=" <?php echo $row['last_name'] ; ?> " required />
</div>


<div class="form-group col-md-12">
  <label>Saloon Name</label>
<input  type="text" name="saloon_name" class="form-control col-sm-6" value=" <?php echo $row['saloon_name'] ; ?> " required />
</div>


<div class="form-group col-md-12">
  <label>Email</label>
<input  type="email"  name="email" class="form-control col-sm-6"  value=" <?php echo $row['email'] ; ?> " required />
</div>



<div class="form-group col-md-12">
  <label>Phone number </label>
<input  type="text" name="phone_number" class="form-control col-sm-6"  value=" <?php echo $row['phone_number'] ; ?> " min="1" max="11" required />
</div>



<div class="form-group col-md-12">
  <label> country </label>
<input  type="text" name="country" class="form-control col-sm-6"  value=" <?php echo $row['country'] ; ?> " required />
</div>



<div class="form-group col-md-12">
  <label> state </label>
<input  type="text" name="state" class="form-control col-sm-6"  value=" <?php echo $row['state'] ; ?> " required />
</div>

<div class="form-group col-md-12">
  <label> local-goverment area </label>
<input  type="text" name="lcda" class="form-control col-sm-6"  value=" <?php echo $row['local_government'] ; ?> " required />
</div>


<div class="form-group col-md-12">
  <label> Area Bus-stop</label>
<input  type="text" name="area" class="form-control col-sm-6"  value=" <?php echo $row['area'] ; ?> " required />
</div>


<div class="form-group col-md-12">
  <label> street </label>
<input  type="text" name="street" class="form-control col-sm-6"  value=" <?php echo $row['street'] ; ?> " required />
</div>

<div class="form-group col-md-12">
  <label> shop-full address location </label>
<input  type="text" name="full_address" class="form-control col-sm-6"  value=" <?php echo $row['full_address'] ; ?> " required />
</div>


<div class="form-group col-md-4">
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="submit" name="submit_reg" class="form-control" id="submit_id" value=" Submit ">
</div>

</form>

</div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"> <span class="glyphicon glyphicon-remove"></span>Cancle</button>
      </div>

    </div>
<!-- modal content close  -->



  </div>

</div>


<!-- end of modal class  -->