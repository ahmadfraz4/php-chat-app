<?php

include 'config.php';
$id = mysqli_real_escape_string($conn, $_POST['id']);

$query = "SELECT * FROM chat where cid = $id";

if(mysqli_query($conn, $query)){
    echo 'message deleted';
}else{
    echo 'something went wrong';
}




?>