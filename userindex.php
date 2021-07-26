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


  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="icon" href="images/favlogo.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link href="css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>


<body>

  <header>
    <div class="default-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-md-2">
            <div class="logo1"><a href="index.php"><img src="images/logo1.png" alt=""></a></div>


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
          <a href="#home" class="active">Home</a>
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
            <a href="updateuserprofile.php">Profile Settings</a>
          
            <a href="logout.php">Log Out</a>

        </div>

          </div>

        </div>


      </header>
      <!--Content section-->
      <!--slider part-->
      <div class="container_full slider-bg">
        <div class="fix container">
          <div class="slider-top">
            <h1>Welcome to Home Rental Service <span style="color:black;text-transform:uppercase;"><?php echo htmlspecialchars($_SESSION["username"]); ?></span></h1>
            <p style="text-align:center">You will find suitable home from here </p>
          </div>
          <div id="slider_wrapper">
            <div class="slider-wrapper theme-default">
              <div id="slider" class="nivoSlider">
                <img src="images/img1.jpg" alt="images" />
                <img src="images/img2.jpg" alt="" />
                <img src="images/img3.jpg" alt="" />
                <img src="images/img4.jpg" alt="" />
                <img src="images/img5.jpg" alt="" />
              </div>
            </div>
          </div>

        </div>
      </div>
      <!--slider part-->




      <!---fearured advertise----------->

      <section style="height:auto;" class="section-padding dark-bg">
        <div style="width:1000px;height:auto;" class="container">
          <div class="section-header text-center">
            <h2>Find The Best Home For You</h2>
            <p style="text-align:center">Here You can find thousands of suitable luxourious home</p>
          </div>
          <div style="width:1200px;height:auto; margin-left:-70px;" class="row">



    <div style="height: auto;width:1200px;" >
      <div  style="height: auto;width:1200px;"  id="">

    <?php $sql = "SELECT advertise.hometitle,location.locationname,advertise.rent,advertise.homesize,advertise.totalbedroom,advertise.id,advertise.attachbath,advertise.homeoverview,advertise.img1 from advertise join location on location.locationname=advertise.address LIMIT 3";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {
    ?>

    <div style="float:left;padding-right:25px; padding-bottom:20px;" >
    <div style="border:1px solid white;" class="recent-home-list">
    <div><img style="width:350px; height:300px;" src="images/<?php echo htmlentities($result->img1);?>" alt="image">
    <ul>
    <li><span  style="color:grey;"> Home Size:</span> <?php echo htmlentities($result->homesize);?> Square Feet</li>
    <li><span  style="color:grey;"> Total Bed Room:</span> <?php echo htmlentities($result->totalbedroom);?></li>
    <li><span  style="color:grey;"> Attach Bath:</span> <?php echo htmlentities($result->attachbath);?></li>
    </ul>
    </div>
    <div style="margin-left:20px;">
    <h6 style="color:#0080ff"><?php echo htmlentities($result->locationname);?> , <?php echo htmlentities($result->hometitle);?></h6>
    <span  ><span style="color:grey;">Per Month:</span> <?php echo htmlentities($result->rent);?> ৳</span>
    </div>
    <div style="margin-left:20px;color:grey;width:270px">
    <p><?php echo substr($result->homeoverview,0,40);?></p>
    <a href="viewdetails.php?vhid=<?php echo htmlentities($result->id);?>"><button style="margin-left:90px; margin-bottom:10px;"   >View Details</button></a>


    </script>
    </div>
    </div>
    </div>
    <?php }}?>

    </div>
    </div>
    </div>

          </div>
        </div>
      </div>
    </section>


    <!--featured advertise-->
    <!--google maps------------------->
    <section class="section-padding orange-bg">
      <div class="container">
        <div class="section-header text-center">
          <h2>Find Best Place To live</h2>
          <p style="text-align:center">Here You can find thousands of suitable luxourious home</p>
        </div>
        <div class="row map">

          <div id="map" class="col-sm-12"></div>

        </div>
      </div>
    </div>
  </section>

  <!--google maps------------------->
  <!--footer-->
  <footer>
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-md-6 anh2">
            <h2>Announcement</h2>
                  <div class="announcement">
                    <div class="marq">
                      <table width="450px;">

                          <tr>
                            <td>
                              <?php


$cn=mysqli_connect("localhost","root","","homerental");
$s="select * from news order by news_id DESC LIMIT 1";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;
while($data=mysqli_fetch_array($result))
{
    echo"<tr style='border-bottom:1px solid white;'><td  style='font-weight:bold;color:white;border-bottom:1px solid white;'><h5 style='margin-left:85px;'>$data[1]</h5></td></tr>";

    echo"<tr><td  style='color:white; padding-left:10px'>$data[2]</td></tr>";
  }
  mysqli_close($cn);
  ?>
                            </td>
                          </tr>

                        </table>

                    </div>

                  </div>
          </div>

          <div class="col-md-3 col-sm-6 calwid">
            <h2 class="cal-heading">Find Event</h2>
            <div class="calendar"><iframe src="https://calendar.google.com/calendar/embed?src=asifhayatanjon%40gmail.com&ctz=Asia%2FDhaka" style="border: 5px solid gray" width="465" height="400" frameborder="0" scrolling="yes"></iframe></div>

          </div>
        </div>
      </div>
    </div>
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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
  <script type="text/javascript">
  $(window).load(function() {
    $('#slider').nivoSlider();
  });
  </script>

  <!--map------->
  <script>
  function initMap() {
    var uluru = {lat: 23.8104, lng: 90.4075};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
  }
  </script>
  <script async defer
  src=
  "https://maps.googleapis.com/maps/api/js?key=
  AIzaSyB2bXKNDezDf6YNVc-SauobynNHPo4RJb8&callback=initMap">
  </script>
  <!--...........map.......................-->

</body>
</html>
