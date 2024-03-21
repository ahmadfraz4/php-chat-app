<?php
include 'config.php';
session_start();
$incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
$outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);

$query = "SELECT * from  chat where ( incoming_id = $incoming_id AND outgoing_id = $outgoing_id) 
or (outgoing_id = $incoming_id AND incoming_id = $outgoing_id) order by cid";

$result = mysqli_query($conn, $query);
$msg = "";
if($result){
    while($row = mysqli_fetch_assoc($result)){
        if($outgoing_id == $row['outgoing_id']){
            $msg .="
            <div class='message me'>
            <div class='mt-1'>
              {$row['message']}
            </div>
        </div>
            ";
        }else{
            $msg .="
            <div class='message you'>
                <div class='mt-1'>
                  {$row['message']}
                </div>
                
            </div>
            ";
        }
    }
    echo $msg;
}


?>