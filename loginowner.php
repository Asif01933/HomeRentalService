<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location:homeowner.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["ownerusername"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["ownerusername"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["ownerpassword"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["ownerpassword"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT ownerid, ownerusername, ownerpassword,status FROM homeowner WHERE ownerusername = ? and status=1";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password,$status);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: homeowner.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
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
          <a href="index.php" class="active">Home</a>
          <a href="contact_us.php">Contact Us</a>
          <a href="admin.php">Admin</a>
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
            <button class="dropbtn1">login/register <i class="fa fa-caret-down"></i></button>
            <div class="dropdown-content1">
              <a href="userlogin.php">as user</a>
              <a href="loginowner.php">as Home Owner</a>

            </div>
          </div>

        </div>

      </header>
      <!--Content section-->
      <!--Contact-us-->
      <div class="wrapper">
             <h2>Login</h2>
             <p>Please fill in your credentials to login.</p>
             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                 <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                     <label>Username</label>
                     <input type="text" name="ownerusername" class="form-control" value="<?php echo $username; ?>">
                     <span class="help-block"><?php echo $username_err; ?></span>
                 </div>
                 <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                     <label>Password</label>
                     <input type="password" name="ownerpassword" class="form-control">
                     <span class="help-block"><?php echo $password_err; ?></span>
                 </div>
                 <div class="form-group">
                     <input type="submit" class="btn btn-primary" value="Login">
                 </div>
                 <p>Don't have an account? <a href="ownerregister.php">Sign up now</a>.</p>
             </form>
         </div>
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

</body>
</html>
