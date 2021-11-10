<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Ajax CRUD in PHP.</title>
      <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
   </head>
   <body>
      <div class="container mt-2">
         <div class="row">
            <div class="col-md-8 mt-1 mb-1">
               <h2 class="text-white bg-dark">How To Insert Update Delete In Php On Same Page Using Ajax.</h2>
            </div>
            <div class="col-md-8 mt-1 mb-2"><button type="button" id="addNewUser" class="btn btn-success">Add</button></div>
            <div class="col-md-8">
               <table class="table">
                  <thead>
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
                  </thead>
                  <tbody>
                     <?php
                        include 'db.php';
                        $query="select * from users limit 150"; 
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
                        <td> 
                           <a href="javascript:void(0)" class="btn btn-primary edit" data-id="<?php echo $array[0];?>">Edit</a>
                           <a href="javascript:void(0)" class="btn btn-primary delete" data-id="<?php echo $array[0];?>">Delete</a>
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
      <div class="modal fade" id="user-model" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title" id="userModel"></h4>
               </div>
               <div class="modal-body">
                  <form action="javascript:void(0)" id="userInserUpdateForm" name="userInserUpdateForm" class="form-horizontal" method="POST">
                     <input type="hidden" name="id" id="id">
                     <div class="form-group">
                                                <div class="col-md-12"><label>Department/Name of Organization</label></div>
                                            
                                                    <div style="display: flex;">
                                                        <div class="col-md-9">
                                                            <select class="form-control" id="organisation-dropdown" name="organisation" placeholder=" Department here.." required="required">
                                                            <option value="">Choose</option>
                                                            <?php

                                                            $result = mysqli_query($conn,"SELECT * FROM departments");
                                                            while($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                            <option value="<?php echo $row['entitle'];?>"><?php echo $row["entitle"];?></option>

                                                            <?php
                                                            }
                                                            ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <a data-toggle="modal" href="#exampleModal"><img src="/kfonapp/images/plus.gif" width="50" height="50" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                            </div> <!-- --department name -->
                     <div class="form-group">
                                                <div class="col-md-12"><label>Office Name</label></div>
                                                    
                                                <div class="col-md-12">
                                                    <input class="form-control" type="text" name="officename" id="officename" maxlength="300" placeholder=" Office Name here.." required="required"/>
                                                </div>
                                            </div> <!--  -- office name -->


                                            <div class="form-group" id="cntry">
                                                <div class="col-md-12"><label>Address</label></div>
                                                
                                                <div class="col-md-12">
                                                    <textarea id="address" name="address" class="form-control" maxlength="500" placeholder=" Address here.." required="required"></textarea>
                                                </div>
                                            </div> <!-- -- address -- -->

                     <div class="form-group">
                                                <div class="col-md-12"><label>District</label></div>
                                        
                                                <div class="col-md-12">
                                                    <select class="form-control" id="" name="district" placeholder=" District here.." required="required">
                                                    <option value="">Choose</option>
                                                    <?phpdistrict-dropdown

                                                    $result = mysqli_query($conn,"SELECT * FROM district");
                                                    while($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?php echo $row['name'];?>"><?php echo $row["name"];?></option>

                                                    <?php
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>  
                     <div class="form-group">
                                                <div class="col-md-12"><label>Local Self Government Institution Level</label></div>
                                                
                                                <div class="col-md-12">
                                                    <select class="form-control" id="lsgtype-dropdown" name="lsgtype" value="NIL" required="required">
                                                    </select>
                                                </div>
                                            </div> <!-- --lsg -- -->

                     <div class="form-group">
                                                <div class="col-md-12"><label>Local Self Government Institution</label></div>
                                                
                                                <div class="col-md-12">
                                                    <select class="form-control" id="lsgbody-dropdown" name="lsgbody" value="NIL" required="required">
                                                    </select>
                                                </div>
                                            </div> <!-- --lsg level-- -->
                     <div class="form-group">
                                                <div class="col-md-12"><label>Ward</label></div>
                                                
                                                <div class="col-md-12">
                                                    <select class="form-control" id="ward-dropdown" name="ward" value="NIL" required="required">
                                                    </select>
                                                </div>
                                            </div>  <!-- -- ward --  -->
                     <div class="form-group" >
                                                    <p class="my-5"> </p>
                                                    <div class="col-md-12 "><label>Latitude and Longitude</label></div>
                                            
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" id="latlon" name="latlon" placeholder="Latitude & Longitude here.." maxlength="200" required="required">
                                                    </div>
                                                </div> <!-- -- latitude and longitude -- -->

                     <div class="form-group" >
                                                <div class="col-md-12"><label>Name of the Authorised Person</label></div>
                                        
                                                <div class="col-md-12">
                                                    <input class="form-control" type="text" name="cpersonname"   id="cpersonname" maxlength="100" placeholder=" Name here.." required="required"/>
                                                </div>
                                            </div> <!-- -- authorised person --  -->

                                            <div class="form-group" >
                                                <div class="col-md-12"><label>Designation</label></div>
                                        
                                                <div class="col-md-12">
                                                    <input class="form-control" type="text" name="designation"   id="designation" maxlength="100" placeholder=" Designation here.." required="required"/>
                                                </div>
                                            </div> <!-- --designation -- -->

                                            <div class="form-group">
                                                <div class="col-md-12"><label>Address</label></div>
                                        
                                                <div class="col-md-12">
                                                    <textarea id="address" name="caddress" class="form-control" maxlength="500" placeholder=" Address here.." required="required"></textarea>
                                                </div>
                                            </div> <!-- -- address-- -->

                                            <div class="form-group" >
                                                <div class="col-md-12"><label>Contact Person Number</label></div>
                                        
                                                <div class="col-md-12">
                                                    <input class="form-control" type="text" name="cpersonnumber"   id="cpersonnumber" maxlength="100" placeholder="Enter Number here.." required="required"/>
                                                </div>
                                            </div> <!-- -- number -- -->

                                            <div class="form-group" >
                                                <div class="col-md-12"><label>Email ID</label></div>
                                        
                                                <div class="col-md-12">
                                                    <input class="form-control" type="email" name="cpersonemail" id="cpersonemail" maxlength="100" placeholder=" Email here.." required="required"/>
                                                </div>
                                            </div> <!-- -- email-- -->
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
                    $('#name').val(res.name);
                    $('#age').val(res.age);
                    $('#email').val(res.email);
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
                        $('#organisation-dropdown').html(res.organisation-dropdown);
                        $('#officename').html(res.officename);
                        $('#district-dropdown').html(res.district-dropdown);
                        $('#lsgtype-dropdown').html(res.lsgtype-dropdown);
                        $('#lsgbody-dropdown').html(res.lsgbody-dropdown);
                        $('#ward-dropdown').html(res.ward-dropdown);
                        $('#latlon').html(res.latlon);
                        $('#cpersonname').val(res.cpersonname);
                       $('#designation').val(res.designation);
                       $('#caddress').val(res.caddress);
                       $('#cpersonnumber').val(res.cpersonnumber);
                       $('#cpersonemail').val(res.cpersonemail);
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