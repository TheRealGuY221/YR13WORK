<?php

session_start();

require_once('assets/common.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $password = $_POST['password'];
    if (string_length($password)) {

        $_SESSION['length'] = "Your password is long enough";
        $_SESSION['length_status'] = "good";

    } else {

        $_SESSION['length'] = "Your password isn't long enough";
        $_SESSION['length_status'] = "bad";
    }
    if (strpos($password, 'password') !== false) {

        $_SESSION['password'] = "Cannot have password in password";
        $_SESSION['password_status'] = "bad";

    } else {

        $_SESSION['password'] = "Password does not have password in it";
        $_SESSION['password_status'] = "good";
    }
    if (check_special_characters($password)) {

        $_SESSION['special'] = "Special character found";
        $_SESSION['special_status'] = "good";

    } else {

        $_SESSION['special'] = "No special characters are found in password";
        $_SESSION['special_status'] = "bad";
    }
    if (hasuppercase($password)) {

        $_SESSION['uppercase'] = "Uppercase character found";
        $_SESSION['uppercase_status'] = "good";

    } else {

        $_SESSION['uppercase'] = "No uppercase character found";
        $_SESSION['uppercase_status'] = "bad";
    }
    if (haslowercase($password)) {

        $_SESSION['lowercase'] = "Lowercase character found";
        $_SESSION['lowercase_status'] = "good";

    } else {

        $_SESSION['lowercase'] = "No lowercase character found";
        $_SESSION['lowercase_status'] = "bad";
    }
    if (hasnumber($password)) {

        $_SESSION['number'] = "Number found";
        $_SESSION['number_status'] = "good";

    } else {

        $_SESSION['number'] = "No number found";
        $_SESSION['number_status'] = "bad";
    }
    if (check_start($password)) {

        $_SESSION['start'] = "First character is not special";
        $_SESSION['start_status'] = "good";

    } else {

        $_SESSION['start'] = "Special character found at the start";
        $_SESSION['start_status'] = "bad";
    }
    if (check_end($password)) {

        $_SESSION['end'] = "Special character found at the end";
        $_SESSION['end_status'] = "bad";

    } else {

        $_SESSION['end'] = "Last character is not special";
        $_SESSION['end_status'] = "good";
    }
    if (fum($password)) {

        $_SESSION['firstnumber'] = "First character is not a number";
        $_SESSION['firstnumber_status'] = "good";

    } else {

        $_SESSION['firstnumber'] = "First character cannot be a number";
        $_SESSION['firstnumber_status'] = "bad";
    }
}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Password Checker</title>

    <link rel="stylesheet" href="style.css">

</head>


<body>



<h1>Passwords</h1>

<h2>Password Checker</h2>

<h3>Check How Strong your password is below</h3>



<div class="good-password">
    Good Password
</div>




<div class="bad-password">
    Bad Password
</div>



<div class="password-area">


    <form method="POST">

        <input
                type="text"
                name="password"
                class="password-input"
                placeholder="Enter Password"
                required
        >

        <button
                type="submit"
                class="check-button">

            Check Password

        </button>

    </form>




    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>

        <div class="messages">




            <div class="message <?php echo $_SESSION['length_status']; ?>">

                <?php echo $_SESSION['length']; ?>

            </div>




            <div class="message <?php echo $_SESSION['password_status']; ?>">

                <?php echo $_SESSION['password']; ?>

            </div>




            <div class="message <?php echo $_SESSION['special_status']; ?>">

                <?php echo $_SESSION['special']; ?>

            </div>




            <div class="message <?php echo $_SESSION['uppercase_status']; ?>">

                <?php echo $_SESSION['uppercase']; ?>

            </div>



            <div class="message <?php echo $_SESSION['lowercase_status']; ?>">

                <?php echo $_SESSION['lowercase']; ?>

            </div>




            <div class="message <?php echo $_SESSION['number_status']; ?>">

                <?php echo $_SESSION['number']; ?>

            </div>



            <div class="message <?php echo $_SESSION['start_status']; ?>">

                <?php echo $_SESSION['start']; ?>

            </div>




            <div class="message <?php echo $_SESSION['end_status']; ?>">

                <?php echo $_SESSION['end']; ?>

            </div>



            <div class="message <?php echo $_SESSION['firstnumber_status']; ?>">

                <?php echo $_SESSION['firstnumber']; ?>

            </div>


        </div>


</div>




<div class="rules">

    <div class="rules-title">
        Password Rules
    </div>


    <div class="rule">
        At least one Special character
    </div>


    <div class="rule">
        At least one upper case Character
    </div>


    <div class="rule">
        At least one lowercase Character
    </div>


    <div class="rule">
        One number must be present
    </div>


    <div class="rule">
        First character cannot be a special character
    </div>


    <div class="rule">
        Last character cannot be a special character
    </div>


    <div class="rule">
        The word "password" cannot be in the password
    </div>


    <div class="rule">
        First character cannot be a number
    </div>

</div>
<div class = "buttons">
<a href="bad.html">Bad Passwords</a>
<a href="good.html">Good Password</a>
</div>
</body>

</html>