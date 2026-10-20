<?php //this is common


//function to check if the user exusts
function onlyuser($conn, $email) {
    //make statement add params and execute it
    $sql = "SELECT email FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt ->bindParam(1, $email);
    $stmt ->execute();

    //get results
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //return if the user is valid(not in use already)
    return !$result;
}

//function to register the user
function reguser($conn) {
    $sql = "INSERT INTO user (name, email, pswd) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql); //prepare the sql

    //hash the pswd
    $pswd = password_hash($_POST["pswd"], PASSWORD_DEFAULT);

    //add parameters
    $stmt->bindParam(1, $_POST["name"]);
    $stmt->bindParam(2, $_POST["email"]);
    $stmt->bindParam(3, $pswd); //hash the password

    //execute the statement
    $stmt->execute();

    $conn = null; //closes the connection so cant be abused
    return true; //registration successful
}


//function to login to an account
function login($conn) {
    //make the statement
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);

    //bind the params
    $stmt->bindParam(1, $_POST["email"]);
    $stmt->execute(); //run the cmd
    //get the result
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);

    //set logged in default
    $loggedin = false;
    if ($result) {
        $loggedin = password_verify($_POST["pswd"], $result[0]["pswd"]);
    }

    //if logged in return user id
    if ($loggedin) {return $result[0]["user_id"];}
    return false;
}


#user message to pass error messages through the session to different parts of the site.
function user_message() {
    $message = "";

    //check if the user message value is set in the usermessage super global
    if (isset($_SESSION["usermessage"])){
        //save message to variable
        $message = $_SESSION["usermessage"];
        //unset it so that it isn't found again
        unset($_SESSION["usermessage"]);
    }
    // return it from the function
    return $message;
}



//function to add person to el database
function register($conn){
    //prepare and execute the sql query
    $sql = "INSERT INTO userinfo (FirstName, LastName, Email, SchoolYear, school_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql); //prepare to sql

    $stmt->bindParam(1, $_POST['fname']);
    $stmt->bindParam(2, $_POST['lname']);
    $stmt->bindParam(3, $_POST['email']);
    $stmt->bindParam(4, $_POST['Year']);
    $stmt->bindParam(5, $_POST['school_id']);

    $stmt->execute(); //run the query to insert
    $conn = null; //closes the connection so cant be abused
    return true; //registration successful
}

//function to add a school
function add_manufacturer($conn): true
{
    //prepare and execute the sql query
    $sql = "INSERT INTO manufacturer (Name , Location) VALUES (?, ?)";
    $stmt = $conn->prepare($sql); //prepare to sql

    $stmt->bindParam(1, $_POST['ManName']);
    $stmt->bindParam(2, $_POST['ManLocation']);

    $stmt->execute(); //run the query to insert
    $conn = null; //closes the connection so cant be abused
    return true; //registration successfull
}
function add_game($conn): true
{
    //prepare and execute the sql query
    $sql = "INSERT INTO game (Name , Location) VALUES (?, ?)";
    $stmt = $conn->prepare($sql); //prepare to sql

    $stmt->bindParam(1, $_POST['ManName']);
    $stmt->bindParam(2, $_POST['ManLocation']);

    $stmt->execute(); //run the query to insert
    $conn = null; //closes the connection so cant be abused
    return true; //registration successfull
}

// Function to fetch all schools from the database
function getSchools($conn){
    //Prepare and execute the SQL query
    $sql = "SELECT * FROM schools";
    $stmt = $conn->prepare($sql); //Prepare the SQL statement

    $stmt->execute(); // execute the query

    //get all the stuff from the database
    $schools = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $conn = null; //close connection so cant be abused
    return $schools; //return the list of schools
}
?>