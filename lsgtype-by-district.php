<?php
include("db.php");
$district_name = $_POST["district_name"];
$dpt = mysqli_query($conn,"SELECT * FROM district where name = '$district_name'");
$row_dpt = mysqli_fetch_array($dpt);
$id=$row_dpt['id'];
$result = mysqli_query($conn,"SELECT * FROM m_localbodytype");
?>
<option value="0">Select Local Body Type</option>
<?php
if ($result) {
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["localbodytype_name"];?>"><?php echo $row["localbodytype_name"];?></option>
<?php
}
}

?>