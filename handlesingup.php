<?php
$serrer = false;
$ssucce =false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    require 'dbConnect.php';
    $uname = $_POST['uname'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    //check user exist or not
    $sql ="SELECT * FROM `users` WHERE `uname`='$uname'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);
    if($row>0){
        $serror= " This Email is alrredu used.";
        header("location: index.php?ssucce=false&serrer=".$serror."");
    }
    else{
        if($pass==$cpass){
            $phash = password_hash($pass,PASSWORD_DEFAULT);
            $sql ="INSERT INTO `users` (`uname`, `password`, `date`) VALUES ('$uname', '$phash', current_timestamp())";
            $result = mysqli_query($conn,$sql);
            if($result){
                $ssucce =true;
                header("location: index.php?ssucce=true");
            }
        }else{
            $serror = " Please enter same Password. ";
            header("location: index.php?ssucce=false&serrer=".$serror."");
        }
    }
}else{
    $serror = " Something went wrong. ";
    header("location: index.php?ssucce=false&serrer=".$serror."");
}

?>