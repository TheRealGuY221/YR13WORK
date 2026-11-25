<?php
session_start();
require_once "assets/common.php";
require_once "assets/dbconnect.php";
page('Farm Shop');echo '<p>Browse fresh farm products and place an order for collection.</p><a href="products.php">Shop products</a>';endpage();
