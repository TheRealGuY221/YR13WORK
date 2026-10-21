<?php
//imports
require_once "session/common.php";
require_once "session/dbconnect.php";

//start the session
session_start();

//decide if its login page or signup page
$loginPage = true;
//check if get is set to a page
if (isset($_GET["page"]) && $_GET["page"] == "register") {$loginPage=false;}
else if (isset($_GET["page"]) && $_GET["page"] == "login") {$loginPage=true;}
else if (isset($_SESSION["page"]) && $_SESSION["page"] == "register") {$loginPage=false;  $_SESSION["page"]="";}
else if (isset($_SESSION["page"]) && $_SESSION["page"] == "login") {$loginPage=true; $_SESSION["page"]="";}

//if signed up
if (isset($_POST["name"])) {
    //check if pswd = pswd check
    if ($_POST["pswd"] == $_POST["cpswd"]){
        //check the isn't taken
        if (onlyuser(dbconnect_insert(), $_POST["email"])) {
            //register
            reguser(dbconnect_insert());
            //set to login as account made
            $_SESSION["page"] = "login";
            //refresh page
            header("Location: login.php");
            exit;
        }
        else {
            $_SESSION["usermessage"] = "Email already in use.";
            $_SESSION["page"] = "register";
        }
    }
    else {
        $_SESSION["usermessage"] = "Passwords do not match!";
        $_SESSION["page"] = "register";
    }

}

//if logged in
else if (isset($_POST["email"])) {
    $_SESSION["userid"] = login(dbconnect_insert());
    if ($_SESSION["userid"] != false) {
        header("Location: private.php");
        exit;
    }
}

?>










<html>
<title>Login</title>
<body>
<form action="login.php" method="post">

            <h1>Login</h1>
            <label for="email">Email</label><br>
            <input name="email" id="email" placeholder="Enter Email..." type="email" required><br>
            <label for="pswd">Password</label>
            <input name="pswd" id="pswd" placeholder="Enter password..." type="password" required><br>
            <button type="submit">Login</button><br>
            <a href="index.php">Dont have an account? Register</a>

</form>
</body>
</html>