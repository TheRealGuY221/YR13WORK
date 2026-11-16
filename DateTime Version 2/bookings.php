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
} elseif($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (delete_appoitnment(dbconn())) {
            $_SESSION["usermessage"] = "Book Deleted";


        }
    }
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

            <select name='professional'>
                <?php
                $appts = appt_getter();

                foreach () {
                    echo '<option value="' . $appt['proid'] . '">' . $appt['role'] . ' ' . $appt['fname'] . ' ' . $appt['sname'] . '</option>';
                }
                ?>
            </select>

            <input type='submit' name='delete' value='Delete'>
        </form>

    </div>
</div>
</body>
</html>