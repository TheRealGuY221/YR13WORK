<?php
session_start();
require_once "assets/common.php";
require_once "assets/dbconnect.php";
check_post();$_SESSION=[];session_destroy();header('Location: index.php');exit;
