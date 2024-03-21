<?php
include './php/config.php';
session_start();
$user_id = $_SESSION['unique_id'];
if(!isset($_SESSION['unique_id'])){
    header("Location: {$hostname}");
    die();
}
$query2 = "SELECT * FROM user where unique_id = '$user_id' ";
$current_user = mysqli_query($conn, $query2) or die('something went wrong');
// echo $current_user;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include 'head.php';
?>

<script src="js/user.js" defer></script>
</head>
<body>
    <div class="container pt-5 d-flex flex-column align-items-center col-12">
        <section class="card col-lg-5 col-md-6 col-sm-8 col-12 p-3 pb-5 pt-4 shadow">
            <header class="d-flex align-items-center justify-content-between px-3">
               <?php
               if(mysqli_num_rows($current_user) > 0){
                   $current = mysqli_fetch_assoc($current_user);
               ?>
                <div class="user-profile d-flex align-items-center">
                    <div class="user-pic">
                        <img src="images/<?php echo $current['image'] ?>" class="w-100" alt="user">
                    </div>
                    <div class="user-data">
                          <div class="fw-bold"><?php echo $current['name'] ?></div>
                          <div class="status"><?php echo $current['status'] ?></div>     
                    </div>
                </div>
                <?php } ?>
                <button class="btn btn-primary" id="logout">Logout</button>
            </header>
            <form class="d-flex position-relative align-items-center mt-4">
                <input class="form-control" id="search-user" type="search" name="search" placeholder="search user" >
                <button class="btn btn-dark" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
            <div id="user-chats" class="chat-scroll mt-4">
                
                <!-- <section class="chat d-flex align-items-center justify-content-between px-3 mt-1">
                    <div class="user-profile other d-flex align-items-center">
                        <div class="user-pic other">
                            <img src="images/test.jpg" class="w-100" alt="user">
                        </div>
                        <div class="user-data">
                              <div class="fw-bold other-name">name</div>
                              <div class="other-message ">message</div>     
                        </div>
                    </div>
                    <div class="status-dot online"></div>
                </section> -->
            </div>
        </section>
    </div>
</body>


<script>
    let logoutBtn = document.getElementById('logout');
    logoutBtn.addEventListener('click',logout);
    async function logout(){
        let url = './php/logout.php';
        let response = await fetch(url,{
            method : 'POST'
        })
        if(response.ok){
            window.location = 'login.php'
        }
    }    
</script>


</html>