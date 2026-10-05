<?php
session_start();
$_SESSION["userid"] = false;
header("Location: index.php");
exit;
?>