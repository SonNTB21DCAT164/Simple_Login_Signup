<?php
session_start();
if (isset($_SESSION["user_id"])) {
    unset($_SERVER["user_id"]);
}
header("Location: ../Simple_Login_Signup_PHP/login.php");
die;
