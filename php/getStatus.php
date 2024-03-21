<?php
session_start();
include 'config.php';
$uid = $_GET['id'];


$query = "SELECT * from user where unique_id = $uid";

$result = mysqli_query($conn, $query);

if(mysqli_query($conn, $query)){
    $row = mysqli_fetch_assoc($result);
    echo $row['status'];
}else{
    echo 'offline';
}



?>