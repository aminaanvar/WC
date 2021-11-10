<?php
    require 'database.php';
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $organisation = $_POST['organisation'];
        $officename = $_POST['officename'];
        $address = $_POST['address'];
        $district = $_POST['district'];
        $lsgbody = $_POST['lsgbody'];
        $ward = $_POST['ward'];
         
        // Add data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO mytable(Name,Address_Li,Address_1,City,District,Department) VALUES('$officename' ,'$ward','$lsgbody','$address','$district','$organisation')";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: dashboard.php");
         
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Addition Access</h3>
                    </div>
                     
                    <form class="form-horizontal" action="success.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Are you sure you want to Add ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Yes</button>
                          <a class="btn" href="dashboard.php">No</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>