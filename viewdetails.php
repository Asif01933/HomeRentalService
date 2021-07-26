<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: userlogin.php");
  exit;
}
?>
<?php
include('adfig.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home Rental Service</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="icon" href="images/favlogo.png">



  <link href="css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
.topnav1 {
  overflow: hidden;
  background-color: #333;
}

.topnav1 a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
.topnav1 a:hover {
  background-color: grey;
  text-decoration: none;
}

.dropdown1 {
  float: left;
  overflow: hidden;
}

.dropdown1 .dropbtn1 {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar1 a:hover, .dropdown1:hover .dropbtn1 {
  background-color: grey;
  text-decoration: none;
}

.dropdown-content1 {
  display: none;
  position: absolute;
  background-color: #333;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content1 a {
  float: none;
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content1 a:hover {
  background-color: grey;
  color:black;
  text-decoration: none;
}

.dropdown1:hover .dropdown-content1 {
  display: block;
}
</style>

<body>

  <header>
    <div class="default-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-md-2">
            <div class="logo1"><a href="homeowner.html"><img src="images/logo1.png" alt=""></a></div>

          </div>
          <div class="col-sm-9 col-md-10">
            <div class="header_info">
              <div class="header_widgets">
                <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
                <p class="uppercase_text">For Support Mail us : </p>
                <a href="#">homerental@gmail.com</a> </div>
                <div class="header_widgets">
                  <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
                  <p class="uppercase_text">Service Helpline Call Us: </p>
                  <a href="#">+880193-3611794</a> </div>



                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Navigation -->
        <div class="topnav1" id="myTopnav">
          <a href="userindex.php" class="active">Home</a>
          <a href="contact_us.php">Contact Us</a>
          <a href="advertisement.php">Advertisement</a>
          <div class="dropdown1">
            <button class="dropbtn1">About
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content1">
              <a href="about_us.php">About Us</a>
              <a href="terms.php">Terms & Conditions</a>

            </div>
          </div>
          <div class="dropdown1 logbtn float-right bg-primary">
          <p style="text-transform:uppercase"  class="dropbtn1"><?php echo htmlspecialchars($_SESSION["username"]); ?><i class="fa fa-caret-down"></i></p>
          <div class="dropdown-content1">
            <a href="#">Profile Settings</a>
            <a href="#">Update Password</a>
            <a href="logout.php">Log Out</a>

        </div>

          </div>

        </div>




      </header>
      <!--Content section-->

      <?php
      $vhid=intval($_GET['vhid']);
      $sql = "SELECT advertise.*,location.locationname as bid  from advertise join location on location.locationname=advertise.address where advertise.id=:vhid";
      $query = $dbh -> prepare($sql);
      $query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
      $query->execute();
      $results=$query->fetchAll(PDO::FETCH_OBJ);
      $cnt=1;
      if($query->rowCount() > 0)
      {
      foreach($results as $result)
      {
      $_SESSION['brndid']=$result->bid;
      ?>

    <div style="float:right;height:auto;padding-bottom:40px;margin-right:70px;margin-top:50px;border:1px solid #d9d9d9;">
      <h1 style="text-align:center;">Home Details</h1>
      <div>
        <img src="images/<?php echo htmlentities($result->img1);?>" class="img-responsive" alt="image" width="788" height="460">
      </div>
      <div class="">
        <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><span style="font-weight:bold;font-size:25px;color:orange;">Home Overview</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><span style="font-weight:bold;font-size:25px;color:orange;">Details Information</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#owner" role="tab" data-toggle="tab"><span style="font-weight:bold;font-size:25px;color:orange;">Owner Information</span></a>
    </li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="profile"><p><?php echo htmlentities($result->homeoverview);?></p></div>
    <div role="tabpanel" class="tab-pane fade" id="buzz">
      <ul>
        <li><span style="font-weight:bold;font-size:15px">Home Size:</span> <?php echo htmlentities($result->homesize);?> Square Feet</li>
        <li><span style="font-weight:bold;font-size:15px">Floor Level:</span> <?php echo htmlentities($result->floorlevel);?>th</li>
        <li><span style="font-weight:bold;font-size:15px">Total Bed Room:</span> <?php echo htmlentities($result->totalbedroom);?></li>
        <li><span style="font-weight:bold;font-size:15px">Attach Bath:</span> <?php echo htmlentities($result->attachbath);?></li>
        <li><span style="font-weight:bold;font-size:15px">Common Bath:</span> <?php echo htmlentities($result->commonbath);?></li>
        <li><span style="font-weight:bold;font-size:15px">livingroom:</span> <?php echo htmlentities($result->livingroom);?></li>
        <li><span style="font-weight:bold;font-size:15px">Kitchen:</span> <?php echo htmlentities($result->kitchen);?></li>
        <li><span style="font-weight:bold;font-size:15px">Servant Room:</span> <?php echo htmlentities($result->servantroom);?></li>
        <li><span style="font-weight:bold;font-size:15px">Drawing Room:</span> <?php echo htmlentities($result->drawingroom);?></li>
        <li><span style="font-weight:bold;font-size:15px">Balcony:</span> <?php echo htmlentities($result->balcony);?></li>
        <li><span style="font-weight:bold;font-size:15px">Furnished:</span> <?php echo htmlentities($result->furnish);?></li>
        <li><span style="font-weight:bold;font-size:15px">Direction Facing:</span> <?php echo htmlentities($result->direction);?></li>
      </ul>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="owner">

      <ul>
        <li><span style="font-weight:bold;font-size:15px">Owner Name:</span> <?php echo htmlentities($result->ownername);?> </li>
        <li><span style="font-weight:bold;font-size:15px">Mobile No:</span> <?php echo htmlentities($result->phoneno);?></li>
        <li><span style="font-weight:bold;font-size:15px">Email:</span> <?php echo htmlentities($result->email);?></li>
        <li><span style="font-weight:bold;font-size:15px">Address:</span> <?php echo htmlentities($result->address);?></li>
      </ul>
  </div>


      </div>
      </div>

      <?php }} ?>
      <!--content sidebar start-->
    </div>

          <div style="height:auto; width:300px;margin-left:30px;margin-top:50px;border:1px solid #d9d9d9;" class="">
            <div >
      <h3 style="text-align:center;">Similar Result</h3>

      <div >
<?php
$bid=$_SESSION['brndid'];
$sql="SELECT advertise.hometitle,location.locationname,advertise.homesize,advertise.rent,advertise.totalbedroom,advertise.attachbath,advertise.id,advertise.livingroom,advertise.homeoverview,advertise.img1 from advertise join location on location.locationname=advertise.address where advertise.address=:bid";
$query = $dbh -> prepare($sql);
$query->bindParam(':bid',$bid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
        <div  class="col-md-12 ">
          <div style="border:1px solid #d9d9d9;margin-bottom:15px;"  class=" gray-bg">
            <div class=""> <a href="viewdetails.php?vhid=<?php echo htmlentities($result->id);?>"><img style="width:267px;height:200px;" src="images/<?php echo htmlentities($result->img1);?>" class="img-responsive" alt="image" /> </a>
            </div>
            <div class="">
              <h5 style="margin-left:10px;"><a href="viewdetails.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->locationname);?> , <?php echo htmlentities($result->hometitle);?></a></h5>
              <p style="margin-left:10px;" class="">৳ <?php echo htmlentities($result->rent);?> /Month</p>

              <ul class="">

             <li>Home Size: <?php echo htmlentities($result->homesize);?> Square Feet</li>
                <li>Total Bed Room: <?php echo htmlentities($result->totalbedroom);?></li>
                <li>Attach Bath:<?php echo htmlentities($result->attachbath);?></li>
              </ul>
            </div>
          </div>
        </div>
 <?php }} ?>

      </div>
    </div>
    <!--/Similar-Home-->
          </div>
          <div style="clear:both;" class="clear"></div>

          <!--footer start-->
          <footer>

            <div class="footer-bottom">
              <div class="container">
                <div class="row">
                  <div class="col-md-6 col-md-push-6 text-right">
                    <div class="footer_widget">
                      <p>Connect with Us:</p>
                      <ul>
                        <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-6 col-md-pull-6">
                    <p class="copy-right">Copyright &copy; Home Rental Service. All rights reserved</p>
                  </div>
                </div>
              </div>
            </div>
          </footer>
          <!--Back to top-->
          <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
          <!--/Back to top-->

          <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
          <script src="js/bootstrap.min.js">
          </script>
          <script type="text/javascript">
          function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
              x.className += " responsive";
            } else {
              x.className = "topnav";
            }
          }
          </script>

        </body>
        </html>
