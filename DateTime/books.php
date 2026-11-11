<?php

//start the assets
session_start();



//stop the page from loading if user is not logged in
if (!isset($_SESSION["userid"]) or !$_SESSION["userid"]) {
    //give error msg to next page
    $_SESSION["usermessage"] = "You are not logged in.";
    //change header to redirect and exit to stop this page loading
    header("Location: login.php");
    exit;
}

?>

