<?php

session_start();

//imports
require_once "session/dbconnect.php";
require_once "session/common.php";

//el php code to handle sign up

//check if was sent as post request from form

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if(register(dbconnect_insert())) { //if it works go into this
            //alert that they signed up
            header('Location: collection.php');
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
            <a href="login.php">Already have an account? Login</a>


    </form>
    </div>
    </div>
</html>
