<?php

//start the assets

session_start();
require_once("assets/common.php");
require_once("assets/dbconnect.php");


// Stop the page loading if user is not logged in
if (!isset($_SESSION["userid"])) {

    // Give error message to next page
    $_SESSION["usermessage"] = "You are not logged in.";

    // Redirect to login page
    header("Location: login.php");
    exit;

} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        if (make_booking(dbconn())) {

            $_SESSION["usermessage"] = "Your booking has been confirmed.";
            header("Location: books.php");
            exit;

        } else {

            $_SESSION["usermessage"] = "Something went wrong.";
            header("Location: books.php");
            exit;
        }

    } catch (PDOException $e) {

        $_SESSION["usermessage"] = "Something went wrong.";
        header("Location: books.php");
        exit;
    }
}

?>

?>
<html>
<title>Books</title>
<body>
<div class = "container">
    <div class = "content">


        <form action='' method='post'>
            <input
                type = "datetime-local"
                id = "appt-time"
                name="appt-time"
                />
                <select name='professional'>

                    <?php
                    $pro = pro_getter(dbconn());
                    foreach ($pro as $staff){
                        echo "<option value =" . $staff['proid'].">" . $staff['role'] . " " .$staff['fname'].">".$staff['sname']. " ".$staff['roomno']."</option>";

                    }
                    ?>
                    <input type='submit' name='submit' value='Confirm Appointment'>
                </select>
            </form>   s


</body>

