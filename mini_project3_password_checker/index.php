<?php
    session_start();
    require_once('assets/common.php');//calls common

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        if(string_length($_POST['password'])){// checks the passwords length and outputs a string
            $_SESSION['user_message'] = "Your password is long enough"; }

        else{
            $_SESSION['user_message'] ="Your password isnt long enough";
    }



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