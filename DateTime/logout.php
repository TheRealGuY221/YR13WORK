<?php
require_once "assets/common.php";
require_once "assets/dbconnect.php";

session_start();
$_SESSION["userid"] = false;
header("Location: index.php");
exit;
