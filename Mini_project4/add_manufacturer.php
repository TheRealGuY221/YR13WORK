<?php
//import the stuff
require_once "session/dbconnect.php";
require_once "session/common.php";

//el php code to handle sign up

//check if was sent as post request from form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if(add_manufacturer(dbconnect_insert())) { //if it works go into this
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
<html>
<body>

<h2>Manufacturer Sign Up</h2>

<form action="add_manufacturer.php" method="POST">

    <label for="name">Name:</label>
    <input type="text" id="name" name="ManN      ame" required>
    <br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br><br>

    <input type="submit" value="Sign Up">

</form>

</body>
</html>
