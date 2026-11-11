<?php

try {
    $conn = new PDO("mysql:host=localhost;dbname=date_time_tester", "root", "");

    echo "Database connected successfully!";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>