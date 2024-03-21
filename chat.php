<?php
session_start();
include './php/config.php';
$user_id = $_SESSION['unique_id'];
if(!isset($_SESSION['unique_id'])){
    header("Location: {$hostname}");
    die();
}
$reciever_id = $_GET['id'];

$query = "SELECT * from user where unique_id = $reciever_id";
$result = mysqli_query($conn, $query);



?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include 'head.php';
?>
<script src="js/send-chat.js" defer></script>
</head>
<body>
    <div class="container pt-5 d-flex flex-column align-items-center col-12">
        <section class="card col-lg-5 col-md-6 col-sm-8 col-12 p-3 pb-3 pt-4 shadow">
            <header class="d-flex align-items-center px-3">
                <a href="user.php"><i class="back me-3 fa-solid fa-left-long"></i></a>
                <?php
                    if(mysqli_num_rows($result) > 0){
                        $reciever = mysqli_fetch_assoc($result);
                    
                ?>
                <div class="user-profile d-flex align-items-center">
                    <div class="user-pic2">
                        <img src="images/<?php echo $reciever['image'] ?>" class="w-100" alt="user">
                    </div>
                    <div class="user-data">
                          <div class="fw-bold"><?php echo $reciever['name'] ?></div>
                          <div id="user-status" class="status"><?php echo $reciever['status'] ?></div>     
                    </div>
                </div>
                <?php } ?>
            </header>
            <div id="chat-area" class="chat-scroll chat d-flex flex-column mt-1">
             <!-- <div class='message me'>
                <button class="dots">
                  <i class="fa-solid fa-ellipsis-vertical"></i>
                </button>
                <div class="d-none del">
                    <i class="fa-solid fa-trash-can"></i>
                </div>
                <div class="user-name">you</div>
                <div class="mt-1">
                  {$row['message']}
                </div>
                
            </div>
           
            <div class='message you'>
                <button class="dots">
                  <i class="fa-solid fa-ellipsis-vertical"></i>
                </button>
                <div class="del d-none">
                    <i class="fa-solid fa-trash-can"></i>
                </div>
                <div class="user-name ms-4">you</div>
                <div class="mt-1">
                  {$row['message']}
                </div>
                
            </div> -->
            </div>
            <form id="chat-form" class="d-flex position-relative mt-3">
                <input id="outgoing" type="hidden" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" class="form-control" >
                <input id="income" type="hidden" name="incoming_id" value="<?php echo $_GET['id']; ?>" class="form-control" >
                <input id="message" type="text" class="form-control" placeholder="type a message...">
                <button type="submit" class="btn btn-dark">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </form>
        </section>
    </div>
</body>
</html>