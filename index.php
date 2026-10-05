<?php

session_start();

//imports
require_once "resources/dbcon.php";
require_once "resources/common.php";

//el php code to handle sign up

//check if was sent as post request from form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if(register(dbconnect_insert())) { //if it works go into this
            //alert that they signed up
            header('Location: success.php');
            exit();
        }
    } catch (PDOException $e) { //catch db error
        $_Session["usermessage"] = "Database error: " . $e->getMessage();
        // Throw the exception
        throw $e; // Re-throw the exception  // outputs the error
    } catch (Exception $e) { //catch other error
        $_Session["usermessage"] = "Exception: " . $e->getMessage();
        throw $e;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Amazon Careers</title>
    <!-- link the stylesheet -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php require_once "Resources/navbarai.php";?>

    <!-- div for the title -->
    <div class="title">
        <!-- Title -->
        <h1>T Level Pathways<br>at<br>Amazon</h1>
        <!-- description paragraph -->
        <p>Discover what T Levels are<br>and how they can progress your career<br> at Amazon or elsewhere</p>
    </div>



    <!-- div containing the first segment of info -->
    <div class="segment" id="paragraph1">
        <!-- div for the info side of it -->
        <div class="info">
            <div class="setheight">
                <h1>What are T Levels?</h1>
                <p>T levels are a Level 3 qualification in the UK, they are somewhat of a compromise between BTEC's and A Levels. They have some exams similar to A Levels,
                 However also some more practical work. They are however different as T Levels include 315 require of work experience to pass. This overall makes them a good balance
                 of everything.</p>

            </div>
            <!-- use flex class to line up the button with the table -->
            <div class="flex">
                <!-- table to contain the fun fact section thing -->
                <table>
                    <tr>
                        <th>92.6%</th>
                        <th>20+</th>
                        <th>315 Hours</th>
                    </tr>
                    <tr>
                        <td>Pass Rate</td>
                        <td>Subject Options</td>
                        <td>Work Placement</td>
                    </tr>
                </table>
                <!-- download PDF button -->
                <a href="Resources/info.pdf" download class="downloadbtn">Download PDF</a>
            </div>
        </div>
        <!-- add share button to copy link to this -->
        <!-- cant implement copy to clipboard as php is serverside, so refreshing the page with the correct reference link -->
        <button onclick="copy(value='#paragraph1')" class="share">🔗</button>

        <!-- the image -->
        <img class="right" alt="Software Developer" src="https://images.stockcake.com/public/f/d/d/fdd4a037-52a3-47cd-b033-ddacb762c855_large/focused-software-developer-stockcake.jpg">
    </div>



    <!-- div containing the second segment of info -->
    <div class="segment segment-right" id="paragraph2">
        <!-- the image -->
        <img class="left" alt="Software Developer" src="https://images.stockcake.com/public/c/8/2/c82abec4-a779-4136-997e-9dd73abece16_large/focused-software-developer-stockcake.jpg">

        <!-- div for the info side of it -->
        <div class="info info-right">
            <div class="setheight">
                <h1>Who are T Levels for?</h1>
                <p>T Levels are designed for students between the age of 16-19. They are aimed at students who are more interested in real world experience
                 than learning content for an exam. They are also better for people who may perform badly under the stress of exams, as T Levels are less exam focused.</p>
                <!-- table to contain the fun fact section thing -->
            </div>
            <table>
                <tr>
                    <th>27,500</th>
                    <th>307</th>
                    <th>97.2%</th>
                </tr>
                <tr>
                    <td>Students Studying</td>
                    <td>Colleges Offer</td>
                    <td>Complete Placement</td>
                </tr>
            </table>
        </div>
        <!-- add share button to copy link to this -->
       <button onclick="copy(value='#paragraph2')" class="share">🔗</button>
    </div>



    <!-- div containing the third segment of info -->
    <div class="segment" id="paragraph3">
        <!-- div for the info side of it -->
        <div class="info">
            <div class="setheight">
                <h1>T Levels at Amazon</h1>
                <p>Amazon is becoming increasingly involved with T Level courses. We are taking 100s of students to complete 3 weeks of their placement.
                    The placement allows students to gain experience of working with amazon in small teams, and simultaneously helps prepare students for
                    their Occupational Specialism.
                Completing the placement with also increases your chances of being offered an Amazon Apprenticeship after completing your course.</p>
                <!-- table to contain the fun fact section thing -->
            </div>
                <table>
                <tr>
                    <th>3</th>
                    <th>1</th>
                    <th>5-7 People</th>
                </tr>
                <tr>
                    <td>Weeks</td>
                    <td>Project</td>
                    <td>Team Size</td>
                </tr>
            </table>
        </div>
        <!-- add share button to copy link to this -->
        <button onclick="copy(value='#paragraph3')" class="share">🔗</button>

        <!-- the image -->
        <img class="right" alt="Software Developer" src="https://images.stockcake.com/public/1/5/6/156775e9-719d-4444-b254-3a88a189c6fa_large/focused-software-developer-stockcake.jpg">
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