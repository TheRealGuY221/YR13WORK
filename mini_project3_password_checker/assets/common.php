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




function string_length($mystring){ // check the length of a string
    $answer = false;
    $length = strlen($mystring);
    if ($length > 8 ){ // checks if password is bigger than 8
        $answer = true;

    }
    return $answer;

}
function check_special_characters($mystring){
    $special = false;
    if(preg_match("/[^A-Za-z0-9]/", $mystring)){
        $special = true;

    }
        return $special;

}
function check_start($mystring){
    $spest = false;
    if (preg_match("/[^A-Za-z0-9]/", $mystring[0])){
        $spest = true;

    }
        return $spest;


}
function check_end($mystring){
    $last = $mystring[strlen($mystring) - 1];
    if (preg_match("/[^A-Za-z0-9]/", $last)){
        $spend = false;
    }else {
        $spend = true;
    }
    return $spend;
}
function hasuppercase($mystring){
    $up = false;
    if(preg_match("/[A-Z]/", $mystring)){
        $up = true;
    }
    return $up;
}
function haslowercase($mystring){
    $low = false;
    if(preg_match("/[a-z]/", $mystring)){
        $low = true;
    }
    return $low;
}
function hasnumber($mystring){
    $num = false;
    if(preg_match("/[0-9]/", $mystring)){
        $num = true;
    }
    return $num;
}
function fum($mystring){
    $fum = true;
    if(preg_match("/[0-9]/" , $mystring[0])){
        $fum = false;
    }
    return $fum;
}


