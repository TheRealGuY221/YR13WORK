<?php

function user_message()
{
    if (isset($_SESSION['user_message'])) {

        $msg = 'USER MESSAGE: ' . $_SESSION['user_message'];

        unset($_SESSION['user_message']);

        return $msg;
    }

    return "";
}


/* CHECK PASSWORD LENGTH */

function string_length($mystring)
{
    $answer = false;

    $length = strlen($mystring);

    if ($length > 8) {
        $answer = true;
    }

    return $answer;
}


/* CHECK FOR SPECIAL CHARACTER */

function check_special_characters($mystring)
{
    $special = false;

    if (preg_match("/[^A-Za-z0-9]/", $mystring)) {
        $special = true;
    }

    return $special;
}


/* CHECK START OF PASSWORD */

function check_start($mystring)
{
    $spest = true;

    if (preg_match("/[^A-Za-z0-9]/", $mystring[0])) {
        $spest = false;
    }

    return $spest;
}


/* CHECK END OF PASSWORD */

function check_end($mystring)
{
    $last = $mystring[strlen($mystring) - 1];

    if (preg_match("/[^A-Za-z0-9]/", $last)) {
        $spend = true;
    } else {
        $spend = false;
    }

    return $spend;
}


/* CHECK FOR UPPERCASE */

function hasuppercase($mystring)
{
    $up = false;

    if (preg_match("/[A-Z]/", $mystring)) {
        $up = true;
    }

    return $up;
}


/* CHECK FOR LOWERCASE */

function haslowercase($mystring)
{
    $low = false;

    if (preg_match("/[a-z]/", $mystring)) {
        $low = true;
    }

    return $low;
}


/* CHECK FOR NUMBER */

function hasnumber($mystring)
{
    $num = false;

    if (preg_match("/[0-9]/", $mystring)) {
        $num = true;
    }

    return $num;
}


/* CHECK FIRST CHARACTER IS NOT A NUMBER */

function fum($mystring)
{
    $fum = true;

    if (preg_match("/[0-9]/", $mystring[0])) {
        $fum = false;
    }

    return $fum;
}

?>

