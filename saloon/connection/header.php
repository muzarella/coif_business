 <!DOCTYPE html>
 <html>
 <head>
  <title> Log in </title>
 <link rel="stylesheet" href="../bootstrap/3.3.6/css/bootstrap.css" />
 <link rel="stylesheet" type="text/css" href="../style/w3.css">
  <link rel="stylesheet" type="text/css" href="../style/main.css" />


  <link rel="stylesheet" href="../js/jquery-confirm-v3.3.0/jquery-confirm-master/css/jquery-confirm.css" />


   <script src="../jquery-3.1.1.js"></script>
  <script src="../js/jquery-confirm-v3.3.0/jquery-confirm-master/js/jquery-confirm.js"></script> 
 <script src="../js/fontawesome-free-5.0.8/fontawesome-free-5.0.8/svg-with-js/js/fontawesome-all.js" ></script>

 <script src="../bootstrap/3.3.6/js/bootstrap.js" ></script>
  
   
<style>
 footer {
      background-color: #555;
      color: white;
      padding: 15px; 
    }
  #bg {
    /**background-image:url(images/banner.jpg); **/
background-repeat: no-repeat;

background: transparent url(images/banner.jpg) no-repeat scroll 0% 0% / cover;
min-height: 564px;


  }

  #submit_id{

    background-color:blue;
    color: white ;
  }


  .modal-header, h5 {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .close {

     background-color: red !important;
      color:white !important;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }

  /* Note: Try to remove the following lines to see the effect of CSS positioning */
  .affix {
      top: 0;
      width: 100%;
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }


.style_img {
    height: 100px;
    background-size: cover;
    background-repeat: no-repeat;
    position: relative;
}

</style>
<script type="text/javascript">
  
/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}


/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}

</script>

</head>


 <body>
 


<div>
    <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href="#" class="opt"><img src="../images/dashboard/about-icon.png" class="side-icon">&nbsp;&nbsp;&nbsp; About</a>
          <a href="service.php" class="opt"><img src="../images/dashboard/services-icon.png" class="side-icon">&nbsp;&nbsp;&nbsp; Services</a>
          <a href="profile.php" class="opt"><img src="../images/dashboard/services-icon.png" class="side-icon">&nbsp;&nbsp;&nbsp; Manage profile </a>
          <a href="restaurant.php" class="opt"><img src="../images/dashboard/shop-icon.png" class="side-icon">&nbsp;&nbsp;&nbsp; Manage Appointment </a>
          <a href="clients.php" class="opt"><img src="../images/dashboard/client-icon.png" class="side-icon">&nbsp;&nbsp;&nbsp; Report view </a>
          <a href="contact.php" class="opt"><img src="../images/dashboard/contact-icon.png" class="side-icon">&nbsp;&nbsp;&nbsp;Contact</a>
      </div>





<div id="header">
  <ul>
  <li><a class="active" href="javascript:void(0)" onclick="openNav()"><img src="../images/dashboard/hambuger.png" height="20px" width="20px"/></a></li>
<li><a href="index.php">Dashboard</a></li>
 <li style="float: right;"><a href="?action=logout">Logout</a></li>
 
      </ul>
      </div>


</div>
<!-- end of side nav bar  and dashbord  -->
