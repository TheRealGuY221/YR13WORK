<?php
function pro_getter($conn){
    $stml = $conn->prepare("SELECT * FROM profesionals");
    $stml->execute();
    $result = $stml->fetchAll();
}