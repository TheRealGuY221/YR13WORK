<?php
    session_start();
    require_once('assets/common.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_SESSION['user_message'] = $_POST['message'];


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
                <input name="message"  type="text" required>
                <input type = submit>
</form>



                    </body>
</html>