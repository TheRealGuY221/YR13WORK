<?php
    function user_message()
    {
        if (isset($_SESSION['user_message'])) {
            $msg = 'USER MESSAGE' . $_SESSION['user_message'];
            $_SESSION['user_message'] = "";
            unset($_SESSION['user_message']);
            return $msg;

        }
    }
