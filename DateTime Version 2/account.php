<?php
require_once "assets/dbconnect.php";
require_once "assets/common.php";

if (!isset($_SESSION["userid"]) or !$_SESSION["userid"]) {
    //give error msg to next page
    $_SESSION["usermessage"] = "You are not logged in.";
    //change header to redirect and exit to stop this page loading
    header("Location: login.php");
    exit;
} elseif($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (account(dbconn())) {
            $_SESSION["usermessage"] = "Account Found";
            header("Location: bookings.php");
            exit;


        }
    } catch (PDOException $e) {}

}