<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include('db.php');
ini_set('display_errors', 1);
$f_email = $_POST['email'];
$f_password =$_POST['password'];
// echo "$email $password $staysignedin";

/**
 * AUTHORIZE USER
 */
$sql = "SELECT ID, username, password FROM `auth` WHERE username=\"$f_email\";";
// $sql = "SELECT ID, username, password FROM `auth` WHERE username= ?;";

// $stmt = $conn->prepare("SELECT ID, username, password FROM `auth` WHERE username= ?;");
// $stmt->bindParam(1, $f_email);
// $stmt->execute;


$dbData = mysqli_query($conn, $sql);
if(mysqli_num_rows($dbData) < 1){ 
    die("ERROR: try again");
};
while($row = mysqli_fetch_assoc($dbData)){
    $hashedFormPassword = hash("sha256", $f_password);
    extract($row);
    if($hashedFormPassword != hash("sha256", $password)){
        echo "Invalid username or password";
    }else{
        //2-factor
        //return a session key
        //cookies
        echo "Login successful"; 
    }
};

?><pre><?php
// print_r($rowData->username);
?></pre><?php #end ?>
</body>
</html>
