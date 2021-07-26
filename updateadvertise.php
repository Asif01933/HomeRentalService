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
<link rel="stylesheet" href="">
<link rel="stylesheet" href="css1/style.css">



	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

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

		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.postarea {
	width: 350px; padding: 20px;
	margin-left:70px;
	border-right: 1px solid #e6e6e6;
	background: #e6e6e6;
}
.form-control{
	border:1px solid  gray;
}

</style>

<body>
  <?php include('function.php'); ?>
  <?php

    $cn=mysqli_connect("localhost","root","","homerental");
        $s="select * from advertise where ownername='" . $_SESSION["username"] . "'";

    $q=mysqli_query($cn,$s);
    $r=mysqli_num_rows($q);

    $data=mysqli_fetch_array($q);
    $hometitle=$data[1];
    $homesize=$data[2];
    $homeoverview=$data[3];
    $rent=$data[4];
    $totalbedroom=$data[5];
    $livingroom=$data[6];
    $drawingroom=$data[7];
    $servantroom=$data[8];
    $kitchen=$data[9];
    $attachbath=$data[10];
    $commonbath=$data[11];
    $balcony=$data[12];
    $furnish=$data[13];
    $floorlevel=$data[14];
    $direction=$data[15];
    $term=$data[16];

    $address=$data[17];
    $ownername=$data[18];
      $email=$data[19];
        $phoneno=$data[20];
          $img1=$data[21];
    //echo $name;
    mysqli_close($cn);






  ?>
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
          <a href="homeowner.php" class="active">Home</a>
          <a href="ownercontact_us.php">Contact Us</a>
            <a href="makepost.php">Make Post</a>
          <div class="dropdown1">
            <button class="dropbtn1">About
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content1">
              <a href="ownerabout_us.php">About Us</a>
              <a href="ownerterms.php">Terms & Conditions</a>

            </div>
          </div>
          <div class="dropdown1 logbtn float-right bg-primary">
            <p class="dropbtn1"><?php echo htmlspecialchars($_SESSION["username"]); ?><i class="fa fa-caret-down"></i></p>
            <div class="dropdown-content1">
              <a href="#">Profile Settings</a>
              <a href="#">Update Password</a>
              <a href="logout.php">Log Out</a>

          </div>
          </div>

        </div>



      </header>
      <!--Content section-->
			<div class="postarea">
				<h2>Update Your Post</h2>
        <p>Please fill this form to update advertise.</p>
					<div style="color:green; font-size:15px; font-weight:bold;" class="status">

					</div>
          <?php include('config.php'); ?>

				<form action="" method="post"  enctype="multipart/form-data">
					<div class="form-group">
							<label>Home Title</label>
							<input type="text" name="hometitle" class="form-control" value="<?php echo @$hometitle;  ?>" />

					</div>
					<div class="form-group">
							<label>Home Size(sqrft)</label>
							<input type="text" name="homesize" class="form-control"   value="<?php echo @$homesize;  ?>" />

					</div>
					<div class="form-group">
							<label>Home Overview</label>
							<textarea name="homeoverview" class="form-control" value="<?php echo @$homeoverview;  ?>" cols="30" rows="3" ><?php echo @$homeoverview;  ?></textarea>

					</div>
					<div class="form-group">
							<label>Rent Per Month</label>
							<input type="text" name="rent" class="form-control"   value="<?php echo @$rent;  ?>" />

					</div>
					<div class="form-group">
							<label>Total Bed Room</label>
							<select name="totalbedroom" class="form-control">
								<option value=""><?php echo @$totalbedroom;  ?></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>

					</div>
					<div class="form-group">
							<label>Living Room</label>
							<select name="livingroom" class="form-control" >
									 <option value=""><?php echo @$livingroom;  ?></option>
									<option value="YES">YES</option>
				          <option value="NO">NO</option>
							</select>

					</div>
					<div class="form-group">
							<label>Drawing Room</label>
							<select name="drawingroom" class="form-control" >
									 <option value=""><?php echo @$drawingroom;  ?></option>
									<option value="YES">YES</option>
									<option value="NO">NO</option>
							</select>

					</div>
					<div class="form-group">
							<label>Servant Room</label>
							<select name="servantroom" class="form-control" >
									 <option value=""><?php echo @$servantroom;  ?></option>
									<option value="YES">YES</option>
									<option value="NO">NO</option>
							</select>

					</div>
					<div class="form-group">
							<label>Kitchen</label>
							<select name="kitchen" class="form-control" >
									 <option value=""><?php echo @$kitchen;  ?></option>
									<option value="YES">YES</option>
									<option value="NO">NO</option>
							</select>

					</div>
					<div class="form-group">
							<label>Attach Bath</label>
							<select name="attachbath" class="form-control">
									 <option value=""><?php echo @$attachbath;  ?></option>
									 <option value="1">1</option>
									 <option value="2">2</option>
									 <option value="3">3</option>
									 <option value="4">4</option>
									 <option value="5">5</option>
									 <option value="6">6</option>

							</select>

					</div>
					<div class="form-group">
							<label>Common Bath</label>
							<select name="commonbath" class="form-control" >
									 <option value=""><?php echo @$commonbath;  ?></option>
									 <option value="1">1</option>
									 <option value="2">2</option>
									 <option value="3">3</option>
									 <option value="4">4</option>
									 <option value="5">5</option>
									 <option value="6">6</option>

							</select>

					</div>
					<div class="form-group">
							<label>Balcony</label>
							<select name="balcony" class="form-control" >
									 <option value=""><?php echo @$balcony;  ?></option>
									 <option value="1">1</option>
									 <option value="2">2</option>
									 <option value="3">3</option>
									 <option value="4">4</option>
									 <option value="5">5</option>
									 <option value="6">6</option>

							</select>

					</div>
					<div class="form-group">
							<label>Furnished Status</label>
							<select name="furnish" class="form-control" >
									 <option value=""><?php echo @$furnish;  ?></option>
									<option value="YES">YES</option>
									<option value="NO">NO</option>
							</select>

					</div>
					<div class="form-group">
							<label>Floor Level</label>
							<select name="floorlevel" class="form-control" >
									 <option value=""><?php echo @$floorlevel;  ?></option>
									 <option value="1">1</option>
 				          <option value="2">2</option>
 				          <option value="3">3</option>
 				          <option value="4">4</option>
 				          <option value="5">5</option>
 				          <option value="6">6</option>
 				          <option value="7">7</option>
 				          <option value="8">8</option>
 				          <option value="9">9</option>
 				          <option value="10">10</option>
 				          <option value="11">11</option>
 				          <option value="12">12</option>
 				          <option value="13">13</option>
 				          <option value="14">14</option>
 				          <option value="15">15</option>
 				          <option value="16">16</option>
 				          <option value="17">17</option>
 				          <option value="18">18</option>
							</select>

					</div>
					<div class="form-group">
							<label>Direction Facing</label>
							<select name="direction" class="form-control" >
									 <option value=""><?php echo @$direction;  ?></option>
									 <option value="East">East</option>
									 <option value="West">West</option>
									 <option value="North">North</option>
									 <option value="South">South</option>
							</select>

					</div>
					<div class="form-group">
							<label>Lease Term</label>
							<input type="text" name="term" class="form-control" value="<?php echo @$term;  ?>" >

					</div>
					<div class="form-group">
							<label>Prefered Tenant</label>
							<input type="text" name="tenant" class="form-control"value="<?php echo @$tenant;  ?>" >

					</div>
					<div class="form-group">
							<label>Address</label>

              <select name="address" class="form-control" >
                <option value="<?php echo @$address;  ?>"><?php echo @$address;  ?></option>
                <?php
$cn=makeconnection();
$s="select * from location";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	while($data=mysqli_fetch_array($result))
	{


			echo "<option value=$data[1]>$data[1]</option>";




	}
	mysqli_close($cn);

?>



</select>


					</div>
					<div class="form-group">
							<label>Owner Name</label>
							<input type="text" name="ownername" class="form-control"  value="<?php echo @$ownername;  ?>" />

					</div>
					<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" value="<?php echo @$email;  ?>" />

					</div>
					<div class="form-group">
							<label>Phone Number</label>
							<input type="text" name="phoneno" class="form-control"  value="<?php echo @$phoneno;  ?>" />

					</div>
          <?php echo "<img style='width:200px; height:150px' src='images/$img1'>";  ?>
            <!--footer-->

					<div class="form-group">
							<label>Img1</label>
							<input type="file" name="img1" id="profile-img" class=""  placeholder="" /><br>


					</div>


							 <button class="btn btn-primary" name="update" type="submit">Submit</button>

				</form>
			</div>

      <!--
      <div id="reg">

      <table align="center" cellpadding = "10" width="700px" style="box-shadow: 0 4px 8px 0 rgba(0, 0,0,0.9),0 6px 20px 0 rgba(0, 0,0,0.50);">
          <tr class="bg-success">
              <td align="center"  colspan="3"><h1 >Make a post about Home</h1></td>
          </tr>
          <form method="post" class="form-horizontal" enctype="multipart/form-data">


      <tr class="firstname tr">
      <td><p>HOME TITLE</p></td>
      <td><input type="text" name="hometitle"  placeholder="Enter Home Title" required/>

      </td>
      </tr>


      <tr class="firstname tr">
      <td><p>SIZE(sqr ft)</p></td>
      <td class="input"><input type="text" name="homesize" required maxlength="30" placeholder="Enter size"/>
      </td>
      </tr>
      <tr class="firstname tr">
      <td><p>Overview</p></td>
      <td class="input"><input type="text" name="homeoverview" required maxlength="30" placeholder="Enter size"/>
      </td>
      </tr>
      <tr class="firstname tr">
      <td><p>Rent</p></td>
      <td class="input"><input type="text" name="rent" required maxlength="30" placeholder="Enter size"/>
      </td>
      </tr>


      <tr class="tr">
      <td><p>TOTAL BED ROOM</p></td>

      <td>
      <select name="totalbedroom" id="Birthday_Day" class="effect date" required>
      <option value="">1</option>
      <option value="">2</option>
      <option value="">3</option>
      <option value="">4</option>
      <option value="">5</option>
      <option value="">6</option>
      <option value="">7</option>
      <option value="">8</option>
      <option value="">9</option>
      <option value="">10</option>
      <option value="">11</option>
      <option value="">12</option>
      <option value="">13</option>
      </select>
      </td>
      </tr>


      <tr class="firstname tr">
      <td><p>Living Room</p></td>

      <td>  <select class="effect" name="livingroom" id="" required>
          <option value="">YES</option>
          <option value="">NO</option></td>
      </tr>


      <tr class="firstname tr">
      <td><p>Drawing Room</p></td>
      <td>
        <select class="effect" name="drawingroom" id="" required>
          <option value="">YES</option>
          <option value="">NO</option>
      </td>
      </tr>


      <tr class="tr">
      <td><p>Servant Room</p></td>
      <td>
        <select class="effect" name="servantroom" id="" required>
          <option value="">YES</option>
          <option value="">NO</option>

      </td>
      </tr>
      <tr class="tr">
      <td><p>Kitchen</p></td>
      <td>
        <select class="effect" name="kitchen" id="" required>
          <option value="">YES</option>
          <option value="">NO</option>


      </td>
      </tr>
      <tr class=" firstname tr">
      <td><p>Attach Bath</p></td>
      <td>
       <select class="effect" name="attachbath" id="" required>
         <option value="">1</option>
         <option value="">2</option>
         <option value="">3</option>
         <option value="">4</option>
         <option value="">5</option>
         <option value="">6</option>
       </select>

      </td>
      </tr>
      <tr class="tr">
      <td><p>Common Bath</p></td>
      <td>
       <select class="effect" name="commonbath" id="" required>
         <option value="">1</option>
         <option value="">2</option>
         <option value="">3</option>
         <option value="">4</option>
         <option value="">5</option>
         <option value="">6</option>
       </select>

      </td>
      </tr>

      <tr class="tr">
      <td><p>Balcony</p></td>
      <td>
       <select class="effect" name="balcony" id="" required>
         <option value="">1</option>
         <option value="">2</option>
         <option value="">3</option>
         <option value="">4</option>
         <option value="">5</option>
         <option value="">6</option>
       </select>

      </td>
      </tr>
      <tr class="tr">
      <td><p>Furnished Status</p></td>
      <td>
        <select class="effect" name="furnish" id="" required>
          <option value="">YES</option>
          <option value="">NO</option>

      </td>
      </tr>
      <tr class="tr">
      <td><p>FLOOR LEVEL</p></td>
      <td>
       <select class="effect" name="floorlevel" id="" required>
         <option value="">1</option>
         <option value="">2</option>
         <option value="">3</option>
         <option value="">4</option>
         <option value="">5</option>
         <option value="">6</option>
         <option value="">7</option>
         <option value="">8</option>
         <option value="">9</option>
         <option value="">10</option>
         <option value="">11</option>
         <option value="">12</option>
         <option value="">13</option>
         <option value="">14</option>
         <option value="">15</option>
         <option value="">16</option>
         <option value="">17</option>
         <option value="">18</option>
       </select>

      </td>
      </tr>
      <tr class="tr">
      <td><p>Direction Facing</p></td>
      <td>
       <select class="effect" name="direction" id="" required>
         <option value="">East</option>
         <option value="">West</option>
         <option value="">North</option>
         <option value="">South</option>

       </select>

      </td>
      </tr>

      <tr class="tr firstname">
      <td><p>LEASE TERM</p></td>
      <td>
       <input class="effect" type="text" placeholder="Enter Lease Term" name="term" value="" required>

      </td>
      </tr>
      <tr class="tr firstname">
      <td><p>PREFERED TENANT</p></td>
      <td>
       <input class="effect" type="text" placeholder="Enter Your Preference" name="tenant" value="" required>

      </td>
      </tr>


      <tr class="tr">
      <td><p>ADDRESS</p> <br /><br /><br /></td>
      <td ><textarea style="margin-left:-12px; border-radius:3px;" name="address" placeholder="Enter Your Adress...." rows="5" cols="50"  placeholder="Enter Your Address" required></textarea></td>
      </tr>


      <tr class="firstname tr">
      <td><p>Owner Name</p></td>
      <td>
        <input name="ownername" class="effect" type="text" placeholder="Enter Your Name" value="" required>
      </td>
      </tr>


      <tr class="firstname tr">
      <td><p>Email</p></td>
      <td>
        <input name="email" class="effect" placeholder="Enter Your Email" type="text" name="" id="" required>
      </td>
      </tr>
      <tr class="firstname tr">
      <td><p>Phone NO</p></td>
      <td>
        <input name="phoneno" type="text" placeholder="Enter Your Phone no." id="" required>
      </td>
      </tr>
      <tr class="firstname tr">
      <td><p>Upload Image</p></td>
      <td>

      </td>

      </tr>


      <tr class="tr">
      <td colspan="2" align="center">
      <input  class="submit" name="btn1" type="submit" value="Submit" >

      </td>
      </tr>
      </form>
      </table>


    </div>


	<!-- Loading Scripts -->
<?php

  if(isset($_POST["update"]))
  {
    $cn=makeconnection();
    $img1=$_FILES["img1"]["name"];

    $img1_tmp = $_FILES['img1']['tmp_name'];

    move_uploaded_file($img1_tmp,"images/$img1");

          $s="update advertise set hometitle='" .$_POST["hometitle"]. "' ,homesize='" .$_POST["homesize"]."',homeoverview='" .$_POST["homeoverview"]."',address='" .$_POST["address"]."', img1='$img1'  where ownername='" .$_SESSION["username"]. "'";

  $i=mysqli_query($cn,$s);
  if($i){
    echo "<script>alert('Your Advertise Updated');</script>";
  }
  mysqli_close($cn);


  }
  ?>
  <footer>
<!--, homeoverview='" .$_POST["homeoverview"]. "',rent='" .$_POST["rent"]. "',totalbedroom='" .$_POST["totalbedroom"]. "',livingroom='" .$_POST["livingroom"]. "',drawingroom='" .$_POST["drawingroom"]. "',servantroom='" .$_POST["servantroom"]. "',kitchen='" .$_POST["kitchen"]. "',attachbath='" .$_POST["attachbath"]. "',commonbath='" .$_POST["commonbath"]. "',balcony='" .$_POST["balcony"]. "',furnish='" .$_POST["furnish"]. "',floorlevel='" .$_POST["floorlevel"]. "',direction='" .$_POST["direction"]. "',term='" .$_POST["term"]. "',tenant='" .$_POST["tenant"]. "',address='" .$_POST["address"]. "',ownername='" .$_POST["ownername"]. "',email='" .$_POST["email"]. "' ,phoneno='" .$_POST["phoneno"]. "-->
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
  <!-- Loading Scripts -->

</body>
</html>
