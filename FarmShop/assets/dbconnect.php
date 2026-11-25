<?php
// Replace these local development settings with your existing database settings.
function dbconn(){return new PDO('mysql:host=localhost;dbname=farmshop;charset=utf8mb4','root','',[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES=>false]);}
