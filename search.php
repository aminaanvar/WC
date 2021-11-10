<head>
     <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
	<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #011327;
  color: white;
}
</style>

</head>
<a href="../kfonapp"> Back</a>
<h3><center>Institution List</center></h3>
<table class="table table-striped" id="customers">
  
    <tr>
      <th scope="col"> Department Name/ Organisation Name</th>
      <th scope="col">Address_Li</th>
      <th scope="col">Address_1</th>
      <th scope="col">City</th>
      <th scope="col">District</th>
      <th scope="col">Department</th>
      <th scope="col">Action</th>
    </tr>

<?php
include('db.php');
if(isset($_POST['submit'])){
  $cdistrict=mysqli_real_escape_string($conn,$_POST['cdistrict']);
	$str=mysqli_real_escape_string($conn,$_POST['str']);
	$sql="select * from mytable where Name like '%$str%' and District like '%$cdistrict%'";
	$res=mysqli_query($conn,$sql);
	if(mysqli_num_rows($res)>0){
		while($row=mysqli_fetch_assoc($res)){
			echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["Address_Li"] . "</td><td>". $row["Address_1"]. "</td><td>". $row["City"]. "</td><td>" . $row["District"]. "</td><td>" . $row["Department"] . "</td><td>". '<a href="javascript:void(0)" class="btn btn-primary edit" data-id="<?php echo $array[0];?>">Edit</a>'. "&nbsp;". '<a href="javascript:void(0)" class="btn btn-primary delete" data-id="<?php echo $array[0];?>">Delete</a>'. "</td></tr>";
		}
	}else{
		echo "No data found";
	}
}
?>
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
                        $('#name').html(res.name);
                        $('#age').html(res.age);
                        $('#email').html(res.email);
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