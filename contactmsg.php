<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginowner.php");
    exit;
}
?>
<?php
include('adfig.php');
error_reporting(0);
if(isset($_REQUEST['del']))
	{
$delid=intval($_GET['del']);
$sql = "delete from contactmsg  WHERE  id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
$query -> execute();
$msg=" Deleted successfully";
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
          <div class="content-wrapper">
          			<div class="container-fluid">

          				<div class="row">
          					<div class="col-md-12">

          						<h2 class="page-title">Messages From User</h2>


          						<div >

          							<div>
          						  <?php if($msg){?><div style='font-weight:bold;color:green;font-weight:bold;text-align:center;'><?php echo htmlentities($msg); ?> </div><?php }?>
          								<table id="zctb"  class="display table table-striped table-bordered table-hover" border="1" cellspacing="0" width="100%">
          									<thead>
          										<tr>
          										<th>Serial</th>
          											<th>Name</th>
          											<th>Email</th>
          											<th>Contact No</th>
          											<th>Message</th>
          											<th>Posting date</th>
          											<th>Delete</th>
          										</tr>
          									</thead>

          									<tbody>

          									<?php $sql = "SELECT * from  contactmsg ";
          $query = $dbh -> prepare($sql);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          $cnt=1;
          if($query->rowCount() > 0)
          {
          foreach($results as $result)
          {				?>
          										<tr>
          											<td><?php echo htmlentities($cnt);?></td>
          											<td><?php echo htmlentities($result->name);?></td>
          											<td><?php echo htmlentities($result->EmailId);?></td>
          											<td><?php echo htmlentities($result->ContactNumber);?></td>
          											<td><?php echo htmlentities($result->Message);?></td>
          											<td><?php echo htmlentities($result->PostingDate);?></td>
                                <td><a href="contactmsg.php?del=<?php echo $result->id;?>" onclick="return confirm('Do you want to delete');" >Delete</a></td>
                              </tr>
          										<?php $cnt=$cnt+1; }} ?>

          									</tbody>
          								</table>



          							</div>
          						</div>



          					</div>
          				</div>

          			</div>
          		</div>
      <!--footer-->
      <div style="clear:both;" class="clear"></div>
      <footer style="margin-top:250px;">

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
