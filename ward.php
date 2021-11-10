<?php
include("db.php");
$ward_name = $_POST['ward_name'];
$lsg_name = $_POST["lsg_name"];
$district_name=$_POST['district_name'];
$dpt = mysqli_query($conn,"SELECT * FROM district where name = '$district_name'");
$row_dpt = mysqli_fetch_array($dpt);
$iddpt=$row_dpt['id'];

$cat = mysqli_query($conn,"SELECT * FROM m_localbodytype where localbodytype_name = '$lsg_name'");
$row_cat = mysqli_fetch_array($cat);

$id=$row_cat['localbodytype_id'];

$cat1 = mysqli_query($conn,"SELECT * FROM lb_master where vchLBName ='$ward_name' and tnyLBTypeID = '$id' and intDistrictID='$iddpt'");
$row_cat1 = mysqli_fetch_array($cat1);

$id1=$row_cat1['intLBID'];

$result = mysqli_query($conn,"SELECT * FROM lb_ward where intLBID = '$id1' ORDER BY chvWardEngName ASC;");
?>
<option value="0">Select Ward</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["chvWardEngName"];?>"><?php echo $row["chvWardEngName"];?></option>
<?php
}
?>
