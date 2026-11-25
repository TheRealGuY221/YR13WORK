<?php // This open the php code section

session_start();

require_once "assets/common.php";
require_once "assets/dbconnect.php";

if (isset($_SESSION['userid'])) {
    $_SESSION['usermessage'] = "ERROR: You have already logged in!";
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['password'] != $_POST['password_confirm']) {
        $_SESSION['usermessage'] = "ERROR: Passwords do not match!";
        header("Location: register.php");
        exit;
    } else {
        try{
            if(reg_user(dbconn())) {
                $_SESSION['usermessage'] = "SUCCESS: YOU have been registered!";
                header("Location: login.php");
                exit;
            }
        } catch (PDOException $e) {
            $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
            header("Location: register.php");
            exit;
        } catch (Exception $e){
            $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();}
        header("Location: register.php");
        exit;
    }
}
?>

<!DOCTYPE html>

<html>

<head>

    <title>FarmShop</title>
    <link rel='stylesheet' type='text/css' href='assets/styles.css' />

</head>

<body>

<div class='container'>

    <?php
    require_once "assets/nav.php";
    ?>

    <div class='content'>
        <br>

        <h2>Farmers Registration System</h2>

        <p class='content'> Please complete the below form to register for our system </p>

        <?php
        echo usermessage();
        ?>

        <form action='' method='post'>
            <br>

            <input type='email' name='email' placeholder='E-mail Address' required/>
            <br>

            <input type='password' name='password' placeholder='Password' required/>
            <br>

            <input type='password' name='password_confirm' placeholder='Confirm Password' required/>
            <br>

            <input type='text' name='fname' placeholder='Firstname' required/>
            <br>

            <input type='text' name='sname' placeholder='Surname' required/>
            <br>


            <input type='text' name='address' placeholder='Address' required/>
            <br>


            <input type='text' name='PhoneNumber' placeholder='Phone Number' required/>
            <br>

            <input type='submit' name='submit' value='Register' />
            <br>
        </form>

        <br>



    </div>

</div>

</body>

</html>