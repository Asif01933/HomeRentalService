<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginowner.php");
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
<style type="text/css">

        .wrapper{ width: 350px; padding: 20px; }
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

        <div class="wrapper">
               <h2>Publish Announcement</h2>
               <p>Please fill in your credentials to announce.</p>
               <div style="color:green; font-size:15px; font-weight:bold;" class="status">
            <?php




            if(isset($_POST['submit']))
              {

            $title=$_POST['title'];
            $detail=$_POST['details'];

            $con = mysqli_connect("localhost","root","","homerental");

            $query="INSERT INTO news (title,detail) VALUES ('$title','$detail')";
            $result = mysqli_query($con, $query);
                    if($result==1)
                    {
                    echo  "Published successfully";

                    }
                    else {
                    echo "Insertion Failed";
                         }
                }
            /*$query = $dbh->prepare($sql);
            $query->bindParam(':hometitle',$hometitle,PDO::PARAM_STR);
            $query->bindParam(':homesize',$homesize,PDO::PARAM_STR);
            $query->bindParam(':homeoverview',$homeoverview,PDO::PARAM_STR);
            $query->bindParam(':rent',$rent,PDO::PARAM_STR);
            $query->bindParam(':totalbedroom',$totalbedroom,PDO::PARAM_STR);
            $query->bindParam(':livingroom',$livingroom,PDO::PARAM_STR);
            $query->bindParam(':drawingroom',$drawingroom,PDO::PARAM_STR);
            $query->bindParam(':servantroom',$servantroom,PDO::PARAM_STR);
            $query->bindParam(':kitchen',$kitchen,PDO::PARAM_STR);
            $query->bindParam(':attachbath',$attachbath,PDO::PARAM_STR);
            $query->bindParam(':commonbath',$commonbath,PDO::PARAM_STR);
            $query->bindParam(':balcony',$balcony,PDO::PARAM_STR);
            $query->bindParam(':furnish',$furnish,PDO::PARAM_STR);
            $query->bindParam(':floorlevel',$floorlevel,PDO::PARAM_STR);
            $query->bindParam(':direction',$direction,PDO::PARAM_STR);
            $query->bindParam(':term',$term,PDO::PARAM_STR);
            $query->bindParam(':address',$address,PDO::PARAM_STR);
            $query->bindParam(':ownername',$ownername,PDO::PARAM_STR);
            $query->bindParam(':email',$email,PDO::PARAM_STR);
            $query->bindParam(':phoneno',$phoneno,PDO::PARAM_STR);
            $query->bindParam(':img1',$img1,PDO::PARAM_STR);
            $query->bindParam(':img2',$img2,PDO::PARAM_STR);
            $query->bindParam(':img3',$img3,PDO::PARAM_STR);
            $query->bindParam(':img4',$img4,PDO::PARAM_STR);
            $query->bindParam(':img5',$img5,PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if($lastInsertId)
            {
            $msg="Vehicle posted successfully";
            }
            else
            {
            $error="Something went wrong. Please try again";
            }

            }*/



              ?>
					</div>
          <?php include('config.php'); ?>
          <?php include('function.php'); ?>
               <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                   <div class="form-group ">
                       <label>Announcement Title</label>
                       <input type="text" name="title" class="form-control">

                   </div>
                   <div class="form-group">
                       <label>Details</label>
                      <textarea class="form-control" name="details" ></textarea>

                   </div>
                   <div class="form-group">
                        <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                   </div>

               </form>
           </div>
      <!--footer-->
      <div style="clear:both;" class="clear"></div>
      <footer >

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
