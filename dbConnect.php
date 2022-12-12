<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "xdiscuss";

$conn = mysqli_connect($servername,$username,$password,$database);

if (!$conn){
    die("failed to connect".mysqli_connect_error());
}

?>