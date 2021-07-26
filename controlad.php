<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: admin.php");
    exit;
}

?>
<?php
include('adfig.php');
error_reporting(0);
if(isset($_REQUEST['del']))
	{
$delid=intval($_GET['del']);
$sql = "delete from advertise  WHERE  id=:delid";
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

  <link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>

</head>

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

        <div style="float:right;height:auto;padding-bottom:40px;margin-right:260px;margin-top:50px;" class="col-md-7 col-md-push-3">
          <div class="">
            <h3 style="text-align:center">Control Advertisement</h3>
            <div  style="margin-left:10px;margin-bottom:5px;" class="">
              <input id="myInput" type="text" placeholder="Search..">
            </div>

            <?php if($msg){?><div style='font-weight:bold;color:green;font-weight:bold;text-align:center;'><?php echo htmlentities($msg); ?> </div><?php }?>
          </div>

        <?php $sql = "SELECT advertise.*,location.locationname,location.id as bid  from advertise join location on location.locationname=advertise.address";
        $query = $dbh -> prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;

        if($query->rowCount() > 0)
        {
        foreach($results as $result)
        {  ?>
          <table>
            <tbody id="myTable">
              <tr>
                <td>  <div  style="margin-bottom:40px;height:251px;border:1px solid #d9d9d9;" class="gray-bg">
                    <div style="padding-bottom:20px;" >
                      <div  class=""><img style="width:400px;height:250px;" src="images/<?php echo htmlentities($result->img1);?>" class="img-responsive" alt="Image" /> </a>
                      </div>
                      <div style="margin-left:430px;margin-top:-220px;" >
                        <h4><?php echo htmlentities($result->locationname);?> , <?php echo htmlentities($result->hometitle);?></h4>
                        <p class="">৳ <span style="font-weight:bold;"><?php echo htmlentities($result->rent);?></span> Per Month</p>
                        <ul style="margin-left:-20px;">
                          <li ><span style="font-weight:bold;"> Home Size:</span> <?php echo htmlentities($result->homesize);?> Square Feet</li>
                          <li > <span style="font-weight:bold;">Bed Room:</span> <?php echo htmlentities($result->totalbedroom);?></li>
                          <li ><span style="font-weight:bold;">Attach Bath: </span><?php echo htmlentities($result->attachbath);?></li>
                        </ul>
                        <a href="viewdetails.php?vhid=<?php echo htmlentities($result->id);?>" class="btn btn-success">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                        <a href="controlad.php?del=<?php echo $result->id;?>" class="btn btn-danger" onclick="return confirm('Do you want to delete');" >Delete</a>


                      </div>
                    </div>
                  </div></td>

              </tr>
            </tbody>
          </table>


              <?php $cnt=$cnt+1; }}

              ?>

                 </div>
<div style="clear:both;" class="clear"></div>
      <!--footer-->






      </div>
      <!--Back to top-->

      <!--/Back to top-->

      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js">
      </script>




</body>
</html>
