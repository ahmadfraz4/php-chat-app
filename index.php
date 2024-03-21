<?php
include './php/config.php';
session_start();

if(isset($_SESSION['unique_id'])){
    header("Location: $hostname/user.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
    include 'head.php';
   ?>
   <script src="js/reqister.js" defer></script>
</head>
<body>
    <div class="container pt-5 d-flex flex-column align-items-center col-12">
        <form id='register' class="card col-lg-5 col-md-6 col-sm-8 col-12 p-3 pb-5 pt-4 shadow">
            <div  class="text-center fs-3 fw-bold">Chat App</div>
            <div id="reg-message" style="display: none;" class="response success mt-3">This is error message</div>
            <input id="reg-name" class="form-control mt-4" name="name" required placeholder="name" type="text">
            <input id="reg-email" class="form-control mt-4" name="email" required placeholder="email" type="email">
            <input id="reg-password" class="form-control mt-4" name="password" required placeholder="password" type="password">
            <input id="reg-file" class="form-control mt-4" name="image" required placeholder="image" type="file">
            <button type="submit" class="btn btn-primary mt-4">Continue to Chat</button>
            <div class="mt-4 d-flex align-items-center">already have accont? <a href="login.php" class=" switch ms-3 text-primary">login</a></div>
        </form>
    </div>
</body>
</html>