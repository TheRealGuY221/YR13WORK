<?php
session_start();
require_once('assets/common.php'); // calls common

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    // check the length of the password
    if(string_length($_POST['password'])){
        $_SESSION['user_message'] = "Your password is long enough";
    }
    else {
        $_SESSION['user_message'] = "Your password isnt long enough";
    }
    echo "<div>USER MESSAGE: " . $_SESSION['user_message'] . "</div>";

    // check if the password has the word password in it
    if (strpos($_POST['password'], 'password') !== false) {
        $_SESSION['password'] = "Cannot have password in password";
        echo "<div id = 'error'>USER MESSAGE: " . $_SESSION['password'] . "</div>";
    }
    else {
        $_SESSION['password'] = "Password does not have password in it";
        echo "<div id = 'success'>USER MESSAGE: " . $_SESSION['password'] . "</div>";
    }

    // check for special characters
    if(check_special_characters($_POST['password'])){
        $_SESSION['special'] = "Special character found";
        echo "<div>USER MESSAGE: " . $_SESSION['special'] . "</div>";
    }
    else {
        $_SESSION['user_message'] = "No special characters are found in password";
        echo "<div>USER MESSAGE: " . $_SESSION['user_message'] . "</div>";
    }

    // check the end of the password
    if(check_end($_POST['password'])){
        $_SESSION['user_message'] = "No special characters are found at the end of the password";
    }
    else {
        $_SESSION['user_message'] = "Special characters are found at the end of the password";
    }
    echo "<div>USER MESSAGE: " . $_SESSION['user_message'] . "</div>";
}
?>

<html>

<body>
<?php
echo user_message();
?>

<form action="" method="post">
                <h1>Form</h1>

                <!-- put all the inputs and labels in a table to allign em -->
                <input name="password"  type="text" required>
                <input type = submit>
</form>



                    </body>
</html>