<?php
session_start();
include("../Simple_Login_Signup_PHP/connection.php");
include("../Simple_Login_Signup_PHP/function.php");
$user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>
    <?php
    echo "Hello, " . $user_data["user_name"] . "!";
    ?>
    <a href="../Simple_Login_Signup_PHP/logout.php">Logout</a>
</body>

</html>