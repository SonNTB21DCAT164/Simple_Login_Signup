<?php
session_start();
include("../Simple_Login_Signup_PHP/connection.php");
include("../Simple_Login_Signup_PHP/function.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $error_message = "";
    if (!empty($username) && !empty($password) && !is_numeric($username)) {
        $query = "select * from users where user_name='$username' limit 1";
        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data["password"] === $password) {
                $_SESSION["user_id"] = $user_data["user_id"];
                header("Location: ../Simple_Login_Signup_PHP/index.php");
                die;
            }
            $error_message = "Wrong Username or Password!";
        } else {
            $error_message = "Wrong Username or Password!";
        }
    } else {
        $error_message = "Wrong Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- reset css -->
    <link rel="stylesheet" href="./css/reset.css">
    <!-- style -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form method="post">
            <h1>Login</h1>
            <input type="text" name="username" id="username" placeholder="Username" autofocus><br>
            <input type="password" name="password" id="password" placeholder="Password"><br>
            <input type="submit" value="Login" class="btn"><br>
            <a href="../Simple_Login_Signup_PHP/signup.php">Sign up</a>
        </form>
    </div>
    <?php
    if (!empty($error_message)) {
        echo "<p class='announce'>*Wrong Username or Password!</p>";
    }
    ?>
</body>

</html>