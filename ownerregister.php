<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$firstname = $lastname = $username = $address = $email = $password = $confirm_password = "";
$firstname_err = $lastname_err = $username_err = $address_err = $email_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	//validate firstname
	if(empty(trim($_POST["ownerfirstname"]))){
        $firstname_err = "Please enter a firstname.";
    }else{
        $firstname = trim($_POST["ownerfirstname"]);
    }
	//validate lastname
	if(empty(trim($_POST["ownerlastname"]))){
        $lastname_err = "Please enter a lastname.";
    }else{
        $lastname = trim($_POST["ownerlastname"]);
    }


    // Validate username
    if(empty(trim($_POST["ownerusername"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ownerid FROM homeowner WHERE ownerusername = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["ownerusername"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["ownerusername"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
	//validate address
	if(empty(trim($_POST["owneraddress"]))){
        $address_err = "Please enter address.";
    }else{
        $address = trim($_POST["owneraddress"]);
    }
	//validate email
	if(empty(trim($_POST["owneremail"]))){
        $email_err = "Please enter email.";
    }else{
        $email = trim($_POST["owneremail"]);
    }

    // Validate password
    if(empty(trim($_POST["ownerpassword"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["ownerpassword"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["ownerpassword"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["ownerconfirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["ownerconfirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($firstname_err) && empty($lastname_err) && empty($username_err) && empty($address_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO homeowner (ownerfirstname,ownerlastname,ownerusername,owneraddress,owneremail, ownerpassword) VALUES (?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss",$param_firstname, $param_lastname, $param_username,$param_address,$param_email, $param_password);

            // Set parameters
			$param_firstname=$firstname;
			$param_lastname=$lastname;
            $param_username = $username;
			$param_address=$address;
			$param_email=$email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash


            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
								echo "<script>alert('Registration Successfull,Please Wait for Admin Approval');</script>";

            } else{
                echo "Something went wrong. Please try again later.";
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
        <div class="wrapper">
               <h2>Sign Up</h2>
               <p>Please fill this form to create an account.</p>
               <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
       		<div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                       <label>FirstName</label>
                       <input type="text" name="ownerfirstname" class="form-control" value="<?php echo $firstname; ?>">
                       <span class="help-block"><?php echo $firstname_err; ?></span>
                   </div>
       			<div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                       <label>LastName</label>
                       <input type="text" name="ownerlastname" class="form-control" value="<?php echo $lastname; ?>">
                       <span class="help-block"><?php echo $lastname_err; ?></span>
                   </div>
                   <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                       <label>Username</label>
                       <input type="text" name="ownerusername" class="form-control" value="<?php echo $username; ?>">
                       <span class="help-block"><?php echo $username_err; ?></span>
                   </div>
       				<div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                       <label>Address</label>
                       <input type="text"  name="owneraddress" class="form-control" value="<?php echo $address; ?>">
                       <span class="help-block"><?php echo $address_err; ?></span>
                   </div>
       <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                       <label>Email</label>
                       <input type="email"  name="owneremail" class="form-control" value="<?php echo $email; ?>">
                       <span class="help-block"><?php echo $email_err; ?></span>
                   </div>
                   <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                       <label>Password</label>
                       <input type="password" name="ownerpassword" class="form-control" value="<?php echo $password; ?>">
                       <span class="help-block"><?php echo $password_err; ?></span>
                   </div>
                   <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                       <label>Confirm Password</label>
                       <input type="password" name="ownerconfirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                       <span class="help-block"><?php echo $confirm_password_err; ?></span>
                   </div>
                   <div class="form-group">
                       <input type="submit" class="btn btn-primary" value="Submit">

                   </div>
                   <p>Already have an account? <a href="loginowner.php">Login here</a>.</p>
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
