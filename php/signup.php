<?php
include 'config.php';
session_start();


$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password = md5($password);
$response = null;

if(!empty($email) && !empty($name) && !empty($password) ){
     if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // if email is valid
        $query1  = "SELECT * FROM `user` WHERE email = '$email'";

        $isEmailExist = mysqli_query($conn, $query1);

        if (mysqli_num_rows($isEmailExist) > 0) {
            $response = response(false, "User already exist");
            echo $response;
            return;
        }

        if($_FILES['image']){
            // $allowed_file = array('image');

            $file = $_FILES['image'];
            $file_name = $file['name'];
            $file_size = $file['size'];
            $temp = $file['tmp_name'];
            $type = (explode('/',$file['type']))[0];
            
            if($type != 'image'){
                $response = response(false, "file must be an image");
                echo $response;
                return;
            }

            if($file_size > 1024  * 1024*5){
                
                $response = response(false, "File must less than 5 mb");
                echo $response;
                return;
            }

            $i = 1;
            $newName = $file_name;

            while(file_exists('../images/'.$newName)){
                $file_break = pathinfo($file_name);
                
                $name_of_file = $file_break['filename'];
                $extenstion_of_file = $file_break['extension'];

                $newName = '../images/'.$name_of_file.'('. $i++ .').'.$extenstion_of_file;
                // $i++;
            }

            if(move_uploaded_file($temp, '../images/'.$newName)){
                // user will be active if sign up;
                $status = 'Active now';
                // creating random id for user;
                $random_id = rand(time(), 1000000);


                $query2 = "INSERT INTO user (name,unique_id ,email, password, image, status) values ('$name',$random_id, '$email', '$password', '$newName', '$status')";

                if (mysqli_query($conn, $query2)) {
                    $_SESSION['unique_id'] = $random_id;
                    $response = response(true, "User registered successfully");
                    echo $response;
                    return;
                } else {
                    die(mysqli_error($conn));
                }
            }
            
        }else{
            echo 'file is required';
        }
     }else{
        $response = response(false, "$email email is not valid");
        echo $response;
        return;
    }
}else{
    $response = response(false, "All feilds are required");
    echo $response;
    return;
}




?>
