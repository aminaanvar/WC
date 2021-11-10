<?php
include 'db.php';
$organisation = $_POST['organisation'];
        $officename = $_POST['officename'];
        $address = $_POST['address'];
$query = "INSERT INTO mytable(Name,Address_Li,Department) VALUES('$officename' ,'$address','$organisation')";
$res = mysqli_query($conn, $query);
if($res) {
echo json_encode($res);
} else {
echo "Error: " . $sql . "" . mysqli_error($conn);
}
?>