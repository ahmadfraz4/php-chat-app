<?php

$conn = mysqli_connect('localhost', 'root', '', 'chat-app') or die(mysqli_connect_error());
$hostname = 'http://localhost/01_php/00_projects/01_chat%20app';


function response($success, $message){
    $response[]  = ["success"=>$success, "message" => $message];
    return json_encode($response);
}


?>