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
<style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        .help-block{display: block;
            margin-top: 5px;
            margin-bottom: 10px;
            color: #737373;
          }
          .has-error .help-block{

            color: #a94442;
          }
          .form-control{
            border:1px solid  #a94442;
          }
    </style>
<body>
  <?php include('function.php'); ?>
  <?php

    $cn=mysqli_connect("localhost","root","","homerental");
        $s="select * from homeowner where ownerusername='" . $_SESSION["username"] . "'";

    $q=mysqli_query($cn,$s);
    $r=mysqli_num_rows($q);

    $data=mysqli_fetch_array($q);
    $userfirstname=$data[1];
    $userlastname=$data[2];
    $username=$data[3];
    $useraddress=$data[4];
    $useremail=$data[5];
    //echo $name;
    mysqli_close($cn);






  ?>
  <header>
    <div class="default-header">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-md-2">
            <div class="logo1"><a href="index.html"><img src="images/logo1.png" alt=""></a></div>

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
            <a href="updateuserprofile.php">Profile Settings</a>
            <a href="#">Update Password</a>
            <a href="logout.php">Log Out</a>

        </div>

          </div>

        </div>

        </header>
        <!--Content section-->

        <div class="wrapper">
               <h2>Update Your Profile</h2>
               <p>Please fill this form to update your profile.</p>
               <form  method="post">
       		<div class="form-group ">
                       <label>FirstName</label>
                       <input type="text" name="userfirstname" class="form-control" value="<?php echo @$userfirstname;  ?>">

                   </div>
       			<div class="form-group">
                       <label>LastName</label>
                       <input type="text" name="userlastname" class="form-control" value="<?php echo @$userlastname;  ?>">

                   </div>
                   <div class="form-group ">
                       <label>Username</label>
                       <input type="text" name="username" class="form-control" value="<?php echo @$username;  ?>" readonly>

                   </div>
       				<div class="form-group ">
                       <label>Address</label>
                       <input type="text"  name="useraddress" class="form-control" value="<?php echo @$useraddress;  ?>">

                   </div>
       <div class="form-group ">
                       <label>Email</label>
                       <input type="email"  name="useremail" class="form-control" value="<?php echo @$useremail;  ?>">

                   </div>


                   <div class="form-group">
                       <input type="submit" name="updateprofile" class="btn btn-primary" value="UPDATE">

                   </div>

               </form>
           </div>
           <?php

           if(isset($_POST["updateprofile"]))
           {
             $cn=makeconnection();


                   $s="update user set userfirstname='" .$_POST["userfirstname"]. "' ,userlastname='" .$_POST["userlastname"]."' , username='" .$_POST["username"]. "',useremail='" .$_POST["useremail"]. "' where username='" .$_SESSION["username"]. "'";

           $i=mysqli_query($cn,$s);
           mysqli_close($cn);
           echo "<script>alert('Your Profile is Updated');</script>";

           }
           ?>
      <!--footer-->
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
      <script>
      // Get the modal
      var modal = document.getElementById('id01');

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>
    <script>
    // Get the modal
    var modal = document.getElementById('id02');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>

</body>
</html>
