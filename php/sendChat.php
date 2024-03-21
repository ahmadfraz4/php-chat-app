<?php
include 'config.php';
session_start();
$incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
$outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
$message = mysqli_real_escape_string($conn, $_POST['message']);

$query = "INSERT into chat (incoming_id, outgoing_id, message) values ($incoming_id,$outgoing_id,'$message') ";

$result = mysqli_query($conn, $query);

echo $incoming_id;


?>