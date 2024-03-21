<?php
include 'config.php';
session_start();

$user_id = $_SESSION['unique_id'];
$query = "SELECT * from user";
$result = mysqli_query($conn, $query);



$allUser = array();
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // Skip the current user
        if ($row['unique_id'] == $user_id) {
            continue;
        }
        $allUsers[] = $row;
    }
    echo json_encode($allUsers);
} else {
    // If no users are available, echo a message
    echo json_encode(["success"=>false, "message"=>"No user found"]);
}







?>