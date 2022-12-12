<?php
$lerrer = false;
$lsucce =false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    require 'dbConnect.php';
    $uname = $_POST['uname'];
    $pass = $_POST['password'];
    //check user exist or not
    $sql ="SELECT * FROM `users` WHERE `uname`='$uname'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);
    if($row==1){
        $data = mysqli_fetch_assoc($result);
        if(password_verify($pass,$data['password'])){
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['email'] = $uname;
            $_SESSION['userid'] = $data['sno'];
            $lsucce =true;
            header('location: index.php?lsucce=true');
        }
        else{
    $lerror = " In correct password. ";
            header("location: index.php?lsucce=false&lerrer=".$lerror);
        }
    }
    else{
        $lerror = "User does not exist requested to signup. ";
        header("location: index.php?lsucce=false&lerrer=".$lerror);
    }
}else{
    $lerror = " something went wrong. ";
    header("location: index.php?lsucce=false&lerrer=".$lerror);
}

?>