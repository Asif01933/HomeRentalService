<?php
session_start();
include('adfig.php');
error_reporting(0);
?>
<?php
// Initialize the session


// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: userlogin.php");
  exit;
}
?>
<?php
$Link=mysqli_connect("localhost","root","","homerental");
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
    <div style="float:right; width:400px;height:auto;margin-right:400px;margin-top:50px;" class="">

     		<?php
     		if(isset($_POST["btn4"]))
     {
     	$res=mysqli_query($Link,"select * from advertise where address=('$_POST[id]')");




     	while($row=mysqli_fetch_array($res))
      {
        echo "<div  style='margin-bottom:40px;height:430px;border:1px solid #d9d9d9;background:#EEEEEE;'>";
        echo "<div>";
         echo "<img style='height:251px;width:400px;' src='images/$row[img1]'>"; echo "</div>";
         echo "<div>";
        echo "<ul>";


      echo "<li>";  echo "<span style='font-weight:bold'>Location: </span>"; echo $row["address"]; echo "</li>";
      echo "<li>" ;echo "<span style='font-weight:bold'>Total Bed Room: </span>"; echo   $row["totalbedroom"]; echo "</li>";
      echo "<li>";  echo  $row["homesize"];echo "<span style='font-weight:bold'> Square Feet</span>"; echo "</li>";
      echo "<li>"; echo "<span style='font-weight:bold'>Taka </span>"; echo  $row["rent"];echo "<span style='font-weight:bold'>/Month</span>"; echo "</li>";
      echo "</ul>";
      echo "<a style='margin-left:20px;' href='viewdetails.php?vhid=$row[id];' class='btn btn-success'>View Details <span class='angle_arrow'><i class='fa fa-angle-right' aria-hidden='true'></i></span></a>";
        echo "</div>";
        echo "</div>";

      }
    }

?>

    </div>

      <!--content sidebar start-->
      <aside style="margin-left:40px;" class="col-md-3 col-md-pull-9">
        <div style="border:1px solid #d9d9d9;margin-left:20px;margin-top:50px;margin-bottom:30px;">
          <div >
            <h5>Find Your Home </h5>
          </div>
          <div >
            <form action="" method="post" enctype="multipart/form-data">
              <div style="width:250px;border:1px solid #d9d9d9;margin-left:17px;" class="form-group ">
               <input type="text" class="form-control" placeholder="Enter Place" name="id" required/>
                </div>



                <div class="form-group">
                  <button name="btn4" class="" id="button4" class="msg"><i class="fa fa-search" aria-hidden="true">Search</i></button>
                </div>
              </form>
            </div>
          </div>

          <div style="border:1px solid #d9d9d9;margin-left:20px;">
            <div >
              <h5>Recently Added Home</h5>
              <hr>
            </div>
            <div style="margin-left:-25px;">
              <ul style="list-style:none;">
                <?php $sql = "SELECT advertise.*,location.locationname,location.id as bid  from advertise join location on location.locationname=advertise.address order by id desc limit 4";
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0)
                {
                  foreach($results as $result)
                  {  ?>

                    <li class="gray-bg" style="width:251px;border:1px solid #d9d9d9;margin-bottom:10px;">
                      <div > <a href="viewdetails.php?vhid=<?php echo htmlentities($result->id);?>"><img style="width:250px;" src="images/<?php echo htmlentities($result->img1);?>" alt="image"></a> </div>
                      <div > <a href="viewdetails.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->locationname);?> , <?php echo htmlentities($result->hometitle);?></a>
                        <p >Taka <?php echo htmlentities($result->rent);?> Per Month</p>
                      </div>
                    </li>
                  <?php }} ?>

                </ul>
              </div>
            </div>
          </aside>
      <!--content sidebar start-->

      </div>
          <!--footer-->
          <div style="clear:both;" class="clear"></div>
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
