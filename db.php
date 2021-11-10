<?php
    $servername='localhost';
    $username='phpmyadminuser';
    $password='password';
    $dbname = "kfonapp";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>
