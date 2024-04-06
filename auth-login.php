<?php
include('db.php');
$fd_password = $_POST["password"];

$stmt = $conn->stmt_init();
//
$stmt->prepare("SELECT ID, username, password FROM `auth` WHERE username= ?");
//
$stmt->bind_param("s", $_POST['email']);
//
$stmt->execute();
//
$stmt->bind_result($ID, $username, $password);

//
$stmt->fetch();
$hashedFormPassword = hash("sha256",$fd_password);
$hashedDBPassword = hash("sha256", $password);

if($hashedDBPassword != $hashedFormPassword){ 
    echo "Invalid username or password";
}else{
    header("location: index.html");
    exit;
}
?>