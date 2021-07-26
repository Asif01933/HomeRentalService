
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
                header("location: ownerlogin.php");
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

  <link rel="shortcut icon" href="../favicon.ico">
          <link rel="stylesheet" type="text/css" href="regcss/demo.css" />
          <link rel="stylesheet" type="text/css" href="regcss/style3.css" />
  		<link rel="stylesheet" type="text/css" href="regcss/animate-custom.css" />

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
          <div class="dropdown1">
            <button class="dropbtn1">About
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content1">
              <a href="about_us.php">About Us</a>
              <a href="terms.php">Terms & Conditions</a>

            </div>
          </div>


          </div>



        </header>
        <!--Content section-->
        <div class="containerreg">
              <!-- Codrops top bar -->


              <section>
                  <div id="container_demo" >
                      <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                      <a class="hiddenanchor" id="toregister"></a>
                      <a class="hiddenanchor" id="tologin"></a>
                      <div id="wrapper">
                          <div id="login" class="animate form">
                              <form method="post" action="" autocomplete="on">
                                  <h1>Log in</h1>
                                  <p>
                                      <label for="username" class="uname" data-icon="u" > Your Email </label>
                                      <input id="username" name="username" required="required" type="text" placeholder="eg.mymail@mail.com"/>
                                  </p>
                                  <p>
                                      <label for="password" class="youpasswd" data-icon="p"> Your Password </label>
                                      <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" />
                                  </p>
                                  <p class="keeplogin">
  									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" />
  									<label for="loginkeeping">Keep me logged in</label>
  								</p>
                                  <p class="login button">
                                      <input name="ownerlog" type="submit" value="Login" />
  								</p>
                                  <p class="change_link">
  									Not a member yet ?
  									<a href="#toregister" class="to_register">Join us</a>
  								</p>
                              </form>
                          </div>

                          <div id="register" class="animate form">
                              <form  method="post" name="iownersignup" onSubmit="return valid();">
                                  <h1> Sign up </h1>
                                  <p>
                                      <label for="usernamesignup" class="uname" data-icon="u">First Name</label>
                                      <input id="usernamesignup" name="ownerfirstname" required="required" type="text" placeholder="myfirstname69" />
                                  </p>
                                  <p>
                                      <label for="usernamesignup" class="uname" data-icon="u">Last Name</label>
                                      <input id="usernamesignup" name="ownerlastname" required="required" type="text" placeholder="myusername690" />
                                  </p
                                  <p>
                                      <label for="usernamesignup" class="uname" data-icon="u">User Na</label>
                                      <input id="usernamesignup" name="ownerusername" required="required" type="text" placeholder="myusername690" />
                                  </p>
                                  <p>
                                      <label for="usernamesignup" class="uname" data-icon="">Address</label>
                                      <textarea name="owneraddress"  required="required"  rows="5" cols="51"></textarea>
                                  </p>
                                  <p>
                                      <label for="emailsignup" class="youmail" data-icon="e" >Your Email</label>
                                      <input id="emailsignup" name="owneremail" required="required" type="email" placeholder="mysupermail@mail.com"/>
                                  </p>
                                  <p>
                                      <label for="passwordsignup" class="youpasswd" data-icon="p">Your Password </label>
                                      <input id="passwordsignup" name="ownerpassword" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                  </p>
                                  <p>
                                      <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Confirm Password </label>
                                      <input id="passwordsignup_confirm" name="ownerconfirm_password" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                  </p>
                                  <p class="signin button">
  									<input name="ownerbtn1" type="submit" value="Sign up"/>
  								</p>
                                  <p class="change_link">
  									Already a member ?
  									<a href="#tologin" class="to_register"> Go and log in </a>
  								</p>
                              </form>
                          </div>

                      </div>
                  </div>
              </section>
          </div>


      <!--footer-->
      <footer>

        <div class="footer-bottomreg">
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
