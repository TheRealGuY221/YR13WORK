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
    $answer = false;
    if(preg_match("/[^A-Za-z0-9]/", $mystring)){
        $answer = true;

    }
        return $answer;

}
function check_start($mystring){
    $answer = false;
    if (preg_match("/[^A-Za-z0-9]/", $mystring[0])){
        $answer = true;

    }
        return $answer;


}
function check_end($mystring){
    if (preg_match("/[^A-Za-z0-9]/", $mystring[0])){
        $answer = true;
    }
}
