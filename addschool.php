<?php
//import the stuff
require_once "resources/dbcon.php";
require_once "resources/common.php";

//el php code to handle sign up

//check if was sent as post request from form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if(addSchool(dbconnect_insert())) { //if it works go into this
            //alert that they signed up
            header('Location: success.php');
            exit();
        }
    } catch (PDOException $e) { //catch db error
        $_Session["usermessage"] = "Database error: " . $e->getMessage();
        // Throw the exception
        throw $e; // Re-throw the exception  // outputs the error
    } catch (Exception $e) { //catch other error
        $_Session["usermessage"] = "Exception: " . $e->getMessage();
        throw $e;
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
        <form action="addschool.php" method="post">
            <h1>School Signup</h1>

            <!-- put all the inputs and labels in a table to allign em -->
            <label for="schname">School Name</label><br>
            <input name="schname" id="schname" placeholder="Enter School Name..." type="text" required><br>
            <label for="schemail">School Email</label><br>
            <input name="schemail" id="schemail" placeholder="Enter School Email..." type="email" required><br>
            <label for="schloc">School Location</label><br>
            <input name="schloc" id="schloc" placeholder="Enter School Location..." type="text" required><br>


            <button type="submit">Signup</button>
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
<?php

?>