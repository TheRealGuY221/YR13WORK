<?php //this is common

// Function to check if the user exists
function onlyuser($conn, $email) {
    $sql = "SELECT email FROM patient WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return true if the user is valid (not in use already)
    return !$result;
}

// Function to register the user
function reguser($conn) {
    $sql = "INSERT INTO patient (Fname, Sname,Email, Address, Password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Hash the password
    $Password = password_hash($_POST["Password"], PASSWORD_DEFAULT);

    $stmt->bindParam(1, $_POST["Fname"]);
    $stmt->bindParam(2, $_POST["Sname"]);
    $stmt->bindParam(2, $_POST["Email"]);
    $stmt->bindParam(2, $_POST["Address"]);
    $stmt->bindParam(2, $_POST["Password"]);
    $stmt->bindParam(3, $Password);

    $stmt->execute();

    $conn = null; // Close connection
    return true;
}

// Function to login to an account
function login($conn) {
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(1, $_POST["Email"]);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $loggedin = false;
    if ($result) {
        $loggedin = password_verify($_POST["Password"], $result[0]["Password"]);
    }

    if ($loggedin) {
        return $result[0]["PatentID"];
    }
    return false;
}

// User message to pass error/success messages through the session
function user_message() {
    $message = "";

    if (isset($_SESSION["usermessage"])){
        $message = $_SESSION["usermessage"];
        unset($_SESSION["usermessage"]);
    }
    return $message;
}

// Function to add person to userinfo database
