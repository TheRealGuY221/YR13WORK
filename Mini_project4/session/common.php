<?php //this is common

// Function to check if the user exists
function onlyuser($conn, $email) {
    $sql = "SELECT email FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return true if the user is valid (not in use already)
    return !$result;
}

// Function to register the user
function reguser($conn) {
    $sql = "INSERT INTO user (name, email, pswd) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Hash the password
    $pswd = password_hash($_POST["pswd"], PASSWORD_DEFAULT);

    $stmt->bindParam(1, $_POST["name"]);
    $stmt->bindParam(2, $_POST["email"]);
    $stmt->bindParam(3, $pswd);

    $stmt->execute();

    $conn = null; // Close connection
    return true;
}

// Function to login to an account
function login($conn) {
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(1, $_POST["email"]);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $loggedin = false;
    if ($result) {
        $loggedin = password_verify($_POST["pswd"], $result[0]["pswd"]);
    }

    if ($loggedin) {
        return $result[0]["user_id"];
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
function register($conn) {
    $sql = "INSERT INTO userinfo (FirstName, LastName, Email, SchoolYear, school_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(1, $_POST['fname']);
    $stmt->bindParam(2, $_POST['lname']);
    $stmt->bindParam(3, $_POST['email']);
    $stmt->bindParam(4, $_POST['Year']);
    $stmt->bindParam(5, $_POST['school_id']);

    $stmt->execute();
    $conn = null;
    return true;
}

// Function to add a manufacturer
function add_manufacturer($conn): bool {
    $sql = "INSERT INTO manufacturer (Name, Location) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(1, $_POST['ManName']);
    $stmt->bindParam(2, $_POST['ManLocation']);

    $stmt->execute();
    $conn = null;
    return true;
}

// Function to add a game (corrected to match the game table schema)
function add_game($conn): bool {
    $sql = "INSERT INTO game (publisher_id, Name, Location, Price, developer_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(1, $_POST['publisher_id']);
    $stmt->bindParam(2, $_POST['GameName']);
    $stmt->bindParam(3, $_POST['GameLocation']);
    $stmt->bindParam(4, $_POST['GamePrice']);
    $stmt->bindParam(5, $_POST['developer_id']);

    $stmt->execute();
    $conn = null;
    return true;
}

// Function to fetch all schools from the database
function getSchools($conn) {
    $sql = "SELECT * FROM schools";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $schools = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $schools;
}

// Function to fetch all games from the database
function getGames($conn) {
    $sql = "SELECT * FROM game";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $games;
}

// Function to fetch all manufacturers/publishers
function getManufacturers($conn) {
    $sql = "SELECT * FROM manufacturer";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $manufacturers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $manufacturers;
}
?>