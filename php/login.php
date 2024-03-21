<?php
include_once 'config.php';
session_start();
$response = null;

$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password = md5($password);

$emailQuery = "SELECT * from user where email = '$email'";
$isEmailExist = mysqli_query($conn, $emailQuery);

$query = "SELECT * FROM user where email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $query) or die('Something went wrong');

if (!(mysqli_num_rows($isEmailExist) > 0)) {
    $response = response(false, "Email not exist");
    goto give_response;
} else {
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['unique_id'] = mysqli_fetch_assoc($result)['unique_id'];
        $response = response(true, "User Login Successfully");
        goto give_response;
    } else {
        $response = response(false, "Invalid Email or password");
       goto give_response;
    }
}
give_response:
echo $response;

?>