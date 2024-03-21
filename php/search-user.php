<?php
include 'config.php';
session_start();

$curr_user = $_SESSION['unique_id'];

$search = mysqli_real_escape_string($conn, $_POST['search']);

$query = "SELECT * FROM user where name like '%$search%' AND unique_id != $curr_user";
$result = mysqli_query($conn, $query);
$fill_users = array();

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $fill_users[] = $row;
    }
    echo json_encode($fill_users);
}else{
    echo json_encode(["success"=>false, "message"=>"No user found"]);
}




?>