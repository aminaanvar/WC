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
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Report</title>
      <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
  <!-- Script -->

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
   </head>
   <body>
      <div class="container mt-2">
          <div class="container-fluid my-5">
    <div class="col-md-12 head">
        <div class="float-right">
            <a href="exportData.php" class="btn btn-success"><i class="dwn"></i> Export</a>
            <a href="logout.php" class="btn btn-danger ml-3" style="float: right";>Sign Out</a>
        </div>
    </div>
         <div class="row">
            <div class="col-md-8 mt-1 mb-1">
               <h2 class="text-white bg-dark">Registered User's List</h2>
            </div>
            
            <div class="col-md-8">
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">Department/Name of Organization</th>
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
                        <th scope="col">Latitude </th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        include 'db.php';
                        $query="select * from users"; 
                        $result=mysqli_query($conn,$query);
                        ?>
                     <?php if ($result->num_rows > 0): ?>
                     <?php while($array=mysqli_fetch_row($result)): ?>
                     <tr>
                        <th scope="row"><?php echo $array[0];?></th>
                        <td><?php echo $array[2];?></td>
                        <td><?php echo $array[3];?></td>
                        <td><?php echo $array[4];?></td>
                        <td><?php echo $array[5];?></td>
                        <td><?php echo $array[6];?></td>
                        <td><?php echo $array[7];?></td>
                        <td><?php echo $array[8];?></td>
                        <td><?php echo $array[9];?></td>
                        <td><?php echo $array[10];?></td>
                        <td><?php echo $array[11];?></td>
                        <td><?php echo $array[12];?></td>
                        <td><?php echo $array[13];?></td>
                        <td><?php echo $array[14];?></td>
                        <td><?php echo $array[15];?></td>

                        <td> 
                           <a href="javascript:void(0)" class="btn btn-primary edit" data-id="<?php echo $array[0];?>">Edit</a>
                           <a href="javascript:void(0)" class="btn btn-primary delete" data-id="<?php echo $array[0];?>">Delete</a>
                           <a href="javascript:void(0)" class="btn btn-primary confirm" data-id="<?php echo $array[0];?>">Confirm</a>
                     </tr>
                     <?php endwhile; ?>
                     <?php else: ?>
                     <tr>
                        <td colspan="3" rowspan="1" headers="">No Data Found</td>
                     </tr>
                     <?php endif; ?>
                     <?php mysqli_free_result($result); ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- boostrap model -->
      <div class="modal" id="user-model" aria-hidden="true">
         <div class="modal-dialog ">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title" id="userModel"></h4>
               </div>
               <div class="modal-body">
                  <form action="javascript:void(0)" id="userInserUpdateForm" name="userInserUpdateForm" class="form-horizontal" method="POST">
                     <input type="hidden" name="id" id="id">
                     <div class="form-group">
                        <label class="col-sm">Department/Name of Organization</label>
                        <div class="col-sm-12 control-label">
                           <input type="text" class="form-control" id="organisation" name="organisation" placeholder="Enter Department" value="" maxlength="50" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm">Office Name</label>
                        <div class="col-sm-12 control-label">
                           <input type="text" class="form-control" id="officename" name="officename" placeholder="Enter Office Name" value="" maxlength="50" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm">Address</label>
                        <div class="col-sm-12 control-label">
                           <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm">District</label>
                        <div class="col-sm-12 control-label">
                           <input type="text" class="form-control" id="district" name="district" placeholder="Enter District" value="" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm">Local Self Government Institution Level</label>
                        <div class="col-sm-12 control-label">
                           <input type="text" class="form-control" id="lsgtype" name="lsgtype" placeholder="Enter LSG Type" value="" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm">Local Self Government Institution </label>
                        <div class="col-sm-12 control-label">
                           <input type="text" class="form-control" id="lsgbody" name="lsgbody" placeholder="Enter LSG" value="" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm">Ward</label>
                        <div class="col-sm-12 control-label">
                           <input type="text" class="form-control" id="ward" name="ward" placeholder="Enter Ward" value="" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm">Name of the Authorised Person</label>
                        <div class="col-sm-12 control-label">
                           <input type="text" class="form-control" id="cpersonname" name="cpersonname" placeholder="Enter Authorised Person" value="" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm">Designation</label>
                        <div class="col-sm-12 control-label">
                           <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter Designation" value="" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm">Contact Person Address</label>
                        <div class="col-sm-12">
                           <input type="text" class="form-control" id="caddress" name="caddress" placeholder="Enter Contact Person Address" value="" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm">Contact Person Number</label>
                        <div class="col-sm-12">
                           <input type="text" class="form-control" id="cpersonnumber" name="cpersonnumber" placeholder="Enter Contact Person No." value="" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm">Contact Person Email</label>
                        <div class="col-sm-12">
                           <input type="text" class="form-control" id="cpersonemail" name="cpersonemail" placeholder="Enter Contact Person Email" value="" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Latitude</label>
                        <div class="col-sm-12">
                           <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Enter Latitude" value="" required="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Longitude</label>
                        <div class="col-sm-12">
                           <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Enter Longitude" value="" required="">
                        </div>
                     </div>
                     <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="addNewUser">Save changes
                        </button>
                     </div>
                  </form>
               </div>
               <div class="modal-footer"></div>
            </div>
         </div>
      </div>
      <!-- end bootstrap model -->
      <script type = "text/javascript" >
    $(document).ready(function($) {
        $('#addNewUser').click(function() {
            $('#userInserUpdateForm').trigger("reset");
            $('#userModel').html("Add New User");
            $('#user-model').modal('show');
        });
        $('body').on('click', '.edit', function() {
            var id = $(this).data('id');
            // ajax
            $.ajax({
                type: "POST",
                url: "edit.php",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#userModel').html("Edit User");
                    $('#user-model').modal('show');
                    $('#id').val(res.id);
                    $('#organisation').val(res.organisation);
                    $('#officename').val(res.officename);
                    $('#address').val(res.address);
                    $('#district').val(res.district);
                    $('#lsgtype').val(res.lsgtype);
                    $('#lsgbody').val(res.lsgbody);
                    $('#ward').val(res.ward);
                    $('#cpersonname').val(res.cpersonname);
                    $('#designation').val(res.designation);
                    $('#caddress').val(res.caddress);
                    $('#cpersonnumber').val(res.cpersonnumber);
                    $('#cpersonemail').val(res.cpersonemail);
                    $('#latitude').val(res.latitude);
                    $('#longitude').val(res.longitude);
                }
            });
        });
        $('body').on('click', '.delete', function() {
            if (confirm("Delete Record?") == true) {
                var id = $(this).data('id');
                // ajax
                $.ajax({
                    type: "POST",
                    url: "delete.php",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                    $('#organisation').val(res.organisation);
                    $('#officename').val(res.officename);
                    $('#address').val(res.address);
                    $('#district').val(res.district);
                    $('#lsgtype').val(res.lsgtype);
                    $('#lsgbody').val(res.lsgbody);
                    $('#ward').val(res.ward);
                    $('#cpersonname').val(res.cpersonname);
                    $('#designation').val(res.designation);
                    $('#caddress').val(res.caddress);
                    $('#cpersonnumber').val(res.cpersonnumber);
                    $('#cpersonemail').val(res.cpersonemail);
                    $('#latitude').val(res.latitude);
                    $('#longitude').val(res.longitude);
                        window.location.reload();
                    }
                });
            }
        });
        $('body').on('click', '.confirm', function() {
            if (confirm("Confirm Record?") == true) {
                var id = $(this).data('id');
                // ajax
                $.ajax({
                    type: "POST",
                    url: "confirm.php",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                     $('#organisation').val(res.organisation);
                     $('#officename').val(res.officename);
                     $('#address').val(res.address);
                     $('#district').val(res.district);
                     $('#lsgtype').val(res.lsgtype);
                     $('#lsgbody').val(res.lsgbody);
                    $('#ward').val(res.ward);
                    $('#cpersonname').val(res.cpersonname);
                    $('#designation').val(res.designation);
                    $('#caddress').val(res.caddress);
                    $('#cpersonnumber').val(res.cpersonnumber);
                    $('#cpersonemail').val(res.cpersonemail);
                    $('#latitude').val(res.latitude);
                    $('#longitude').val(res.longitude);
                        window.location.reload();
                    }
                });
            }
        });
        $('#userInserUpdateForm').submit(function() {
            // ajax
            $.ajax({
                type: "POST",
                url: "insert-update.php",
                data: $(this).serialize(), // get all form field value in 
                dataType: 'json',
                success: function(res) {
                    window.location.reload();
                }
            });
        });
    }); 
</script>
   </body>
</html>