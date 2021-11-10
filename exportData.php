<?php 
 
// Load the database configuration file 
include_once 'db.php'; 
 
// Fetch records from database 
$query = $conn->query("SELECT * FROM users ORDER BY id ASC"); 
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "participants_list_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('ID', 'OFFICE NAME', 'ADDRESS', 'CONTACT PERSON NAME', 'CONTACT PERSON NUMBER' ,'CONTACT PERSON EMAIL', 'INSTITUTION', 'LATITUDE', 'LONGITUDE','STATUS'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['id'], $row['officename'], $row['address'], $row['cpersonname'],$row['cpersonnumber'], $row['cpersonemail'], $row['institution'], $row['latitude'],$row['longitude'], $status); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>