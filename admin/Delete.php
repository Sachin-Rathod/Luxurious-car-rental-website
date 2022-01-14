<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'carrental');

$delid = $_GET['id'];

$delete = "DELETE from tblvehicles where id = '$delid'";

$result = mysqli_query($conn, $delete);

$msg = "Vehicle record deleted successfully";

if($result){
    echo "<script>alert('Record deleted successfully')</script>";
    echo "<script>location.replace('manage-vehicles.php')</script>";
}

else{
    echo "<script>alert('Failed to delete record')</script>";
    echo "<script>location.replace('manage-vehicles.php')</script>";
}

?>