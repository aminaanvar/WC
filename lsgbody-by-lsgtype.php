<?php
include("db.php");
$lsg_name = $_POST["lsg_name"];
$district_name=$_POST['district_name'];
$dpt = mysqli_query($conn,"SELECT * FROM district where name = '$district_name'");
$row_dpt = mysqli_fetch_array($dpt);
$iddpt=$row_dpt['id'];

$cat = mysqli_query($conn,"SELECT * FROM m_localbodytype where localbodytype_name = '$lsg_name'");
$row_cat = mysqli_fetch_array($cat);

$id=$row_cat['localbodytype_id'];

$result = mysqli_query($conn,"SELECT vchLBName FROM lb_master where tnyLBTypeID = '$id' and intDistrictID='$iddpt' ORDER BY vchLBName ASC;");
?>
<option value="0">Select Local Body</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["vchLBName"];?>"><?php echo $row["vchLBName"];?></option>
<?php
}
?>