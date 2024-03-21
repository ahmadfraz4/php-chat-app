<?php
include './php/config.php';
session_start();
if(isset($_SESSION['unique_id'])){
    header("Location: $hostname");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include 'head.php';
?>
</head>
<script src="js/login.js" defer></script>
<body>
    <div class="container pt-5 d-flex flex-column align-items-center col-12">
        <form id="login" class="card col-lg-5 col-md-6 col-sm-8 col-12 p-3 pb-5 pt-4 shadow">
            <div class="text-center fs-3 fw-bold">Chat App</div>
            
            
            <input id="login-email" class="form-control mt-4" name="email" placeholder="email" type="email">
            <input id="login-password" class="form-control mt-4" name="password" placeholder="password" type="password">
            
            <button class="btn btn-primary mt-4">Continue to Chat</button>
            <div class="mt-4 d-flex align-items-center">don't have accont? <a href="index.php" class=" switch ms-3 text-primary">register</a></div>
        </form>
    </div>
</body>
</html>