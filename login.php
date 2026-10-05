<?php
//imports
require_once "Resources/common.php";
require_once "Resources/dbcon.php";

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


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Newsletter</title>
    <!-- link the stylesheet -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php require_once "Resources/navbarai.php";?>



<!-- use title div class cos it works and i don't have to make another -->
<div class="formbackground">
    <!-- div for the form -->
    <div class="form">
        <!-- make the form for inputs -->
        <form action="login.php" method="post">
            <?php
            if ($loginPage) { echo'
            <h1>Login</h1>
            <label for="email">Email</label><br>
            <input name="email" id="email" placeholder="Enter Email..." type="email" required><br>
            <label for="pswd">Password</label>
            <input name="pswd" id="pswd" placeholder="Enter password..." type="password" required><br>
            <button type="submit">Login</button><br>
            <a href="?page=register">Dont have an account? Register</a>
            ';}
            else {
                echo '
            <h1>Signup</h1>
            <!-- put all the inputs and labels in a table to allign em -->
            <label for="name">Name</label><br>
            <input name="name" id="name" placeholder="Enter Name..." type="text" required><br>
            <label for="email">Email</label><br>
            <input name="email" id="email" placeholder="Enter Email..." type="email" required><br>
            <label for="pswd">Password</label>
            <input name="pswd" id="pswd" placeholder="Enter password..." type="password" required><br>
            <label for="cpswd">Confirm Password</label>
            <input name="cpswd" id="cpswd" placeholder="Confirm password..." type="password" required><br>
            <button type="submit">Signup</button><br>
            <a href="?page=login">Already have an account? Login</a>
                ';
            }
            ?>
        </form>
    </div>
</div>


<!-- div containing the footer -->
<div class="footer">
    <a href="https://www.amazon.co.uk"><img src="Resources/AmazonLogo.png" alt="Amazon Logo" id="footerlogo"></a><br>
    <a href="https://www.amazon.jobs/en-gb"><button>Amazon Careers</button></a>
    <a href="https://www.amazon.co.uk"><button>Amazon</button></a>
    <a href="https://www.aboutamazon.co.uk/news"><button>Amazon News</button></a>
</div>
</body>
</html>
