<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["valid"]) || $_SESSION["valid"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Report</title>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KFON Registration</title>
    <!-- favicon -->
    <link rel="icon" type="image/png" href="../kfonapp/fav-icon.png">
    <!-- <link rel=icon href=favicon.ico sizes="20x20" type="image/png"> -->
    <!-- animate -->
    <link rel="stylesheet" href="../kfonapp/css/animate.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../kfonapp/css/bootstrap.min.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="../kfonapp/css/magnific-popup.css">
    <!-- slick carousel  -->
    <link rel="stylesheet" href="../kfonapp/css/slick.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="../kfonapp/css/owl.carousel.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="../kfonapp/css/font-awesome.min.css">
    <!-- flaticon -->
    <link rel="stylesheet" href="../kfonapp/css/flaticon.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="../kfonapp/css/style.css">
    <!-- responsive Stylesheet -->
    <link rel="stylesheet" href="../kfonapp/css/responsive.css">

 <script src="../kfonapp/js/jquery-2.2.4.min.js"></script>


    <script src="https://vidyakiranam.kerala.gov.in/assets_new/js/jquery.validate.min.js"></script>
    <!-- bootstrap -->
    <script src="../kfonapp/js/bootstrap.min.js"></script>

<script type = "text/javascript" >

</script>   

</head>
<body>
  <div class="container-fluid my-5">
    <div class="col-md-12 head">
        <div class="float-right">
            <a href="exportData.php" class="btn btn-success"><i class="dwn"></i> Export</a>
            <a href="logout.php" class="btn btn-danger ml-3" style="float: right";>Sign Out</a>
        </div>
    </div>
    
<h1><center>Registered User's List</center></h1>
<p></p>
<table class="table table-striped">
  
    <tr>
      <th scope="col">Sl No</th>
       <th scope="col"> Department/Name of Organization</th>
      <th scope="col">Office Name</th>
      <th scope="col">Address</th>
      <th scope="col">District</th>
      <th scope="col">Local Self Government Institution Level</th>
      <th scope="col">Local Self Government Institution</th>
      <th scope="col">Ward</th>
      <th scope="col">Name of the Authorised Person</th>
      <th scope="col">Designation</th>
      <th scope="col">Contact Person Address</th>
      <th scope="col">Contact Person Number</th>
      <th scope="col">Contact Person Email</th>
      <th scope="col">Latitude and Longitude</th>
      <th scope="col" style="text-align: right;">Status</th>
      <th scope="col"></th>
    </tr>
<?php
$conn = mysqli_connect("localhost", "root", "cdit", "kfon");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, organisation, officename, address, district, lsgtype, lsgbody, ward, cpersonname, designation, caddress, cpersonnumber,  cpersonemail, latlon FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["organisation"] . "</td><td>". $row["officename"]. "</td><td>". $row["address"]. "</td><td>". $row["district"]. "</td><td>". $row["lsgtype"]. "</td><td>". $row["lsgbody"]. "</td><td>". $row["ward"]."</td><td>". $row["cpersonname"]."</td><td>". $row["designation"]."</td><td>". $row["caddress"]."</td><td>". $row["cpersonnumber"]. "</td><td>". $row["cpersonemail"]. "</td><td>". $row["latlon"]. "</td><td>". '<a class="btn btn-success" href="success.php?id='.$row['id'].'">Confirm</a> '."</td><td>". '<a href="javascript:void(0)" class="btn btn-primary delete" data-id="<?php echo $array[0];?>">Delete</a>'. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
<footer class="footer-copyright text-center py-3">
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-area-inner">
                            &copy; Copyrights 2021 Kerala Government. Developed By: C-DIT . All rights reserved.
                            <br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>


<script src="../kfonapp/js/bootstrap.min.js"></script>
    <!-- magnific popup -->
    <script src="../kfonapp/js/jquery.magnific-popup.js"></script>
    <!-- wow -->
    <script src="../kfonapp/js/wow.min.js"></script>
    <!-- Slick Slider -->
    <script src="../kfonapp/js/slick.js"></script>
    <!-- owl carousel -->
    <script src="../kfonapp/js/owl.carousel.min.js"></script>
    <!-- waypoint -->
    <script src="../kfonapp/js/waypoints.min.js"></script>
    <!-- counterup -->
    <script src="../kfonapp/js/jquery.counterup.min.js"></script>
    <!-- Progress-Bar -->
    <script src="../kfonapp/js/jQuery.rProgressbar.min.js"></script>
    <!-- Progress-Bar Active js -->
    <script src="../kfonapp/js/active.rProgressbar.js"></script>
    <!-- main js -->
    <script src="../kfonapp/js/main.js"></script>
</html>