<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
ini_set('display_errors', 1);
$form_data = $_POST;
extract($form_data);
// echo "$email $password $staysignedin";

/**
 * AUTHORIZE USER
 */
# connect to DB
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
// $sql = "SELECT * FROM `auth`;";


# look up user
#verify password
    // hash password
    // compare password
# set cookie

?>
</body>
</html>
