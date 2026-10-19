<?php
//import the stuff
require_once "session/dbconnnect.php";
require_once "session/common.php";

//el php code to handle sign up

//check if was sent as post request from form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if(addDeveloper(dbconnect_insert())) { //if it works go into this
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