<?php

//start the assets
session_start();

require_once "assets/dbconnect.php";
require_once "assets/common.php";


//stop the page from loading if user is not logged in
if (!isset($_SESSION["userid"]) or !$_SESSION["userid"]) {
    //give error msg to next page
    $_SESSION["usermessage"] = "You are not logged in.";
    //change header to redirect and exit to stop this page loading
    header("Location: login.php");
    exit;
} elseif($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (delete_appoitnment(dbconn())) {
            $_SESSION["usermessage"] = "Book Deleted";
            header("Location: bookings.php");
            exit;


        }
    } catch (PDOException $e) {}
}

?>

<<html>
<title>Bookings</title>
<body>
<div class = "container">
    <div class = "content">

        <form action='' method='post'>
            <input
                    type = "datetime-local"
                    id = "appt-time"
                    name="appt-time"
            />


                <?php
                $appts = appt_getter(dbconn());

                foreach ($appts as $appt) {
                    echo '<option value="' . $appt['proid'] . '">' . $appt['role'] . ' ' . $appt['fname'] . ' ' . $appt['sname'] . '</option>';
                }
                ?>


            <input type='submit' name='delete' value='Delete'>
        </form>

    </div>
</div>
</body>
</html>