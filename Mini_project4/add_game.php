<?php
//import the stuff
require_once "session/dbconnect.php";
require_once "session/common.php";

//el php code to handle sign up

//check if was sent as post request from form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if(add_game(dbconnect_insert())) { //if it works go into this
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

<h2>Game Adder</h2>

<form action="add_game.php" method="POST">

    <label for="name">Name:</label>
    <input type="text" id="GameName" name="GameName" required>
    <br><br>

    <label for="Location">Location:</label>
    <input type="text" id="GameLocation" name="GameLocation" required>
    <br><br>

    <label for="Price">Price:</label>
    <input type="text" id="Price" name="GamePrice" required>
    <br><br>


    <input type="submit" value="Sign Up">

</form>

</body>
</html>
