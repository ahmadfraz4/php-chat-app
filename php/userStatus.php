<?php
session_start();
include 'config.php';
$status = mysqli_real_escape_string($conn,$_POST['status']);
$uid = $_SESSION['unique_id'];


$query = "UPDATE user set status = '$status' where unique_id = $uid";

$result = mysqli_query($conn, $query);

if(mysqli_query($conn, $query)){
    echo $status;
}else{
    echo 'offline';
}





?>