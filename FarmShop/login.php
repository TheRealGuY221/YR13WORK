<?php
session_start();
require_once "assets/common.php";
require_once "assets/dbconnect.php";
if($_SERVER['REQUEST_METHOD']==='POST'){check_post();$u=login(dbconn(),$_POST['email']??'');if($u&&password_verify($_POST['password']??'',$u['Password'])){session_regenerate_id(true);$_SESSION['userid']=$u['UserID'];go('basket.php','Logged in successfully.');}go('login.php','Incorrect email or password.');}page('Login');?><form method="post"><?php field();?><label>Email <input type="email" name="email" required></label><label>Password <input type="password" name="password" required></label><button>Login</button></form><?php endpage();
