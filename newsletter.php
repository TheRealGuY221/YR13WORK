<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Newsletter</title>
    <!-- link the stylesheet -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php require_once "Resources/navbarai.php";?>



    <!-- use title div class cos it works and i don't have to make another -->
    <div class="formbackground">
        <!-- div for the form -->
        <div class="form">
            <!-- make the form for inputs -->
            <form action="index.php" method="post">
                <h1>Newsletter Signup</h1>

                <!-- put all the inputs and labels in a table to allign em -->
                <label for="fname">First Name</label><br>
                <input name="fname" id="fname" placeholder="Enter First Name..." type="text" required><br>
                <label for="lname">Last Name</label><br>
                <input name="lname" id="lname" placeholder="Enter Last Name..." type="text" required><br>
                <label for="email">Email</label><br>
                <input name="email" id="email" placeholder="Enter Email..." type="email" required><br>
                <label for="school_id">Year Group</label>
                <select id="school_id" name="school_id">
                <?php
                require_once "resources/common.php";
                require "resources/dbcon.php";
                foreach (getSchools(dbconnect_insert()) as $school) {
                    echo "<option value='" . $school["school_id"] . "'>" . $school["SchoolName"] . "</option>";
                }
                ?>
                </select><br>
                <label for="Year">Year Group</label>
                <select id="Year" name="Year">
                    <option value=12 id="12">Year 12</option>
                    <option value=13 id="13">Year 13</option>
                </select><br>


                <button type="submit">Signup</button>
            </form>
        </div>
    </div>


    <!-- div containing the footer -->
    <div class="footer">
        <a href="https://www.amazon.co.uk"><img src="Resources/AmazonLogo.png" alt="Amazon Logo" id="footerlogo"></a><br>
        <a href="https://www.amazon.jobs/en-gb"><button>Amazon Careers</button></a>
        <a href="https://www.amazon.co.uk"><button>Amazon</button></a>
        <a href="https://www.aboutamazon.co.uk/news"><button>Amazon News</button></a>
    </div>
</body>
</html>