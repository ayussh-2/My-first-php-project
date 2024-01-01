<?php 

// Enable error reporting
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include "conn.php";

if (isset($_POST['login'])){
    session_start();
    $uMail = $_POST['email'];
    $uPass = $_POST['pass'];
    $checkForMail = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` WHERE `email`='$uMail'"));
    if($checkForMail >0){
        $details = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `users` WHERE `email`='$uMail'"));
        $pass = $details['password'];
        $userId = $details['Sysid'];
        if($uPass == $pass){
            $_SESSION['userId'] = $userId;
            $response = array("status" => "success","userId" => $userId ,"message" => "Login succesfull...");
            echo json_encode($response);
        }else{
            $response = array("status" => "error", "message" => "Password incorrect.. try again!");
            echo json_encode($response);
        }
    }else{
        $response = array("status" => "error", "message" => "We do not recognize you.. Try creating a new account!");
        echo json_encode($response);
    }
    
}

elseif (isset($_POST['create'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $checkDuplicateMail = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` WHERE `email`='$email'"));
    if($checkDuplicateMail>0){
        $response = array("status" => "error", "message" => "Duplicate mail exists please try a new one!");
        echo json_encode($response);
    }else{
        if(mysqli_query($conn,"INSERT INTO `users` (`name`,`email`,`password`,`liked`,`userType`) VALUES ('$name','$email','$password','[]','1')")){
            $response = array("status" => "success", "message" => "Data received and processed successfully");
            echo json_encode($response);
            }else{
                echo "DB error";
            }
    }
}

elseif(isset($_POST['checkDuplicateMail'])){
    $email = $_POST['email'];
    $checkDuplicateMail = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` WHERE `email`='$email'"));
    if($checkDuplicateMail>0){
        $response = array("status" => "found");
        echo json_encode($response);
    }else{
        $response = array("status" => "notFound");
        echo json_encode($response);
    }
}

elseif (isset($_POST['forgotPass'])){
    $email = $_POST['email'];
    $findUser = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` WHERE `email` = '$email'"));
    if ($findUser>0){
        $details = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `users` WHERE `email` = '$email'"));
        $id = $details['Sysid'];
        $response = array("status" => "success", "message" => "User Found!" , "id" => $id);
        echo json_encode($response);
    }else{
        $response = array("status" => "error", "message" => "User does not exist!");
        echo json_encode($response);
    }
}

elseif (isset($_POST['changePass'])) {
    $pass = $_POST['password'];
    $email = $_POST['email'];
    if($email==""){
        $response = array("status" => "userNotFound", "message" => 0,"email"=>$email);
        echo json_encode($response);
    }else{
        $query = mysqli_query($conn,"UPDATE `users` SET `password` = '$pass' WHERE `email` = '$email'");
        if($query){
            $response = array("status" => "success", "message" => 1);
            echo json_encode($response);
        }else{
            $response = array("status" => "error", "message" => "query not executed!");
            echo json_encode($response);
        }
    }
}

elseif(isset($_POST['like'])){

    $userId = $_POST['userId'];
    $imageId = $_POST['id'];
    $status = 1;
    $query = mysqli_query($conn, "SELECT `liked` FROM `users` WHERE `Sysid` = '$userId' AND `status` = '1'");
    $row = mysqli_fetch_assoc($query);
    $likedArray = json_decode($row['liked'], true);
    $liked = false;
    for($i=0;$i<count($likedArray);$i++){
        if($likedArray[$i]==$imageId){
            $liked = true;
            array_splice($likedArray, $i, 1);
            break;
        }
    }

    if(!$liked){
        $likedArray[] = $imageId;
    }

    $finalArray = json_encode($likedArray);
    $updateQuery = mysqli_query($conn, "UPDATE `users` SET `liked` = '$finalArray' WHERE `Sysid` = '$userId' AND `status` ='1';");

    $response = array("status" => "success", "message" => $liked ? "Unliked" : "Liked", "buttonState" => $liked ? "inActive" : "active");
    echo json_encode($response);

}


?> 