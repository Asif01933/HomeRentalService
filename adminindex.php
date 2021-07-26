<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: admin.php");
    exit;
}

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
<style >
.title {
  color:white;
  font-size: 36px;
  margin-left:10px;
}
.effect {
  width: 100%;
  height:460px;
}
h1 {
  position: absolute;
top: 40%;
left: -8%;
transform: translate(-50%,-50%);
text-transform: uppercase;
font-family: consolas;
letter-spacing: 1px;
margin: 0;
padding: 0;
color: transparent;
width: 1540px;
font-size: 30px;
height: 115px;
display: inline-block;
font-size: 122px;
transform: scale(.5,1);
}
h1:before {
	content: attr(data-text);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    color: #ff4d4d;
    overflow: hidden;
    border-right: 5px solid white;
    animation: type 10s steps(37) infinite;
    white-space: nowrap;
    text-shadow: 10px 2px black;
}
@keyframes type {
	0%
	 {
		width:0;
	}
	50% {
		width:100%;
	}
	100% {
		width:0;
	}


}

</style>
<body>

  <header>
    <div class="default-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-md-2">
            <div class="logo1"><a href="index.html"><img src="images/logo1.png" alt=""></a></div>

          </div>

            </div>
          </div>
        </div>

        <!-- Navigation -->
        <div style="background:grey;" class="topnav1" id="myTopnav">
          <a style="margin-left:90px;" href="adminindex.php" class="active">Home</a>
          <a href="index.php">View Website</a>

          <div class="dropdown1">
            <button class="dropbtn1">Control
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content1">
              <a href="controlad.php">Advertise</a>
              <a href="controlhomeowner.php">Home Owner</a>
              <a href="controluser.php">User</a>

            </div>
          </div>
            <a href="contactmsg.php">Contact Message</a>
            <a href="announcement.php">Publish Announcement</a>
              <a href="addlocation.php">Add Location</a>
          <div class="dropdown1 logbtn float-right bg-primary">
            <a href="logout.php">Log Out</a>



              </div>
            </div>






        </header>
        <!--Content section-->

    <section class=" dark-bg">


          <div class="effect">
          <h1 class="text" data-text="Welcome To Admin Panel">Welcome To Admin Panel</h1>
      </div>
        </div>

  </section>
      <!--footer-->
      <footer style="margin-top:;">

        <div class="footer-bottom">
          <div class="container">
            <div class="row">


                <p class="copy-right">Copyright &copy; Home Rental Service. All rights reserved</p>

            </div>
          </div>
        </div>
      </footer>
      <!--Back to top-->

      <!--/Back to top-->

      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js">
      </script>




</body>
</html>
