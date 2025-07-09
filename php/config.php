<?php

$conn = mysqli_connect('localhost', 'root', '', 'chat-app') or die(mysqli_connect_error());
$hostname = 'http://localhost/php/projects/php-chat-app';


function response($success, $message){
    $response[]  = ["success"=>$success, "message" => $message];
    return json_encode($response);
}


?>