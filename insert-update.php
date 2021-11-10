<?php
if(count($_POST)>0)
{    
include 'db.php';
$organisation = $_POST['organisation'];
$officename = $_POST['officename'];
$address = $_POST['address'];
$district = $_POST['district'];
$lsgtype = $_POST['lsgtype'];
$lsgbody = $_POST['lsgbody'];
$ward = $_POST['ward'];
$cpersonname = $_POST['cpersonname'];
$designation = $_POST['designation'];
$caddress = $_POST['caddress'];
$cpersonnumber = $_POST['cpersonnumber'];
$cpersonemail = $_POST['cpersonemail'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
if(empty($_POST['id'])){
$query = "INSERT INTO users (organisation,officename,address,district,lsgtype,lsgbody,ward,cpersonname,designation,caddress,cpersonnumber,cpersonemail,latitude,longitude) VALUES ('$organisation','$officename','$address','$district','$lsgtype','$lsgbody','$ward','$cpersonname','$designation','$caddress','$cpersonnumber','$cpersonemail','$latitude','$longitude')";
}else{
$query = "UPDATE users set id='" . $_POST['id'] . "', organisation='" . $_POST['organisation'] . "', officename='" . $_POST['officename'] . "', address='" . $_POST['address'] . "',district='" . $_POST['district'] . "', lsgtype='" . $_POST['lsgtype'] . "',lsgbody='" . $_POST['lsgbody'] . "',ward='" . $_POST['ward'] . "',cpersonname='" . $_POST['cpersonname'] . "',designation='" . $_POST['designation'] . "',caddress='" . $_POST['caddress'] . "',cpersonnumber='" . $_POST['cpersonnumber'] . "',cpersonemail='" . $_POST['cpersonemail'] . "',latitude='" . $_POST['latitude'] . "',longitude='" . $_POST['longitude'] . "', WHERE id='" . $_POST['id'] . "'"; 
}
$res = mysqli_query($conn, $query);
if($res) {
echo json_encode($res);
} else {
echo "Error: " . $sql . "" . mysqli_error($conn);
}
}
?>