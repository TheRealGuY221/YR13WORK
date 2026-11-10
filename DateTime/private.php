<?php

//start the session
session_start();



//stop the page from loading if user is not logged in
if (!isset($_SESSION["userid"]) or !$_SESSION["userid"]) {
    //give error msg to next page
    $_SESSION["usermessage"] = "You are not logged in.";
    //change header to redirect and exit to stop this page loading
    header("Location: login.php");
    exit;
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
        <h1>Super Duper<br>Secret Website</h1>
        <!-- description paragraph -->
        <p>Discover how your technical T Level qualification<br>can launch a high-impact engineering career<br>or funded degree apprenticeship at Amazon.</p>
    </div>



    <!-- div containing the first segment of info -->
    <div class="segment" id="paragraph1">
        <!-- div for the info side of it -->
        <div class="info">
            <div class="setheight">
                <h1>Advanced Apprenticeships</h1>
                <p>Take ownership of meaningful engineering projects that directly impact the daily experiences of millions of global customers. From optimizing AWS cloud infrastructure for peak efficiency to coding and deploying innovative platform features, your fresh perspective will help solve complex problems and genuinely shape the future of our technology</p>                <!-- use flex class to line up the button with the table -->
            </div>
            <div class="flex">
                <!-- table to contain the fun fact section thing -->
                <table>
                    <tr>
                        <th>3-4 Years</th>
                        <th>£30,000</th>
                        <th>100%</th>
                    </tr>
                    <tr>
                        <td>Program Duration</td>
                        <td>Starting Salary</td>
                        <td>Tuition Funded</td>
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
                <h1>Expert 1-to-1 Mentorship</h1>
                <p>Never navigate your career alone. We pair entry-level talent with dedicated senior engineers to provide continuous feedback, teach industry best practices, and help you confidently build your technical capabilities.</p>
                <!-- table to contain the fun fact section thing -->
            </div>
            <table>
                <tr>
                    <th>85%+</th>
                    <th>86%</th>
                    <th>7,000+</th>
                </tr>
                <tr>
                    <td>Graduation Rate</td>
                    <td>Stay at Amazon</td>
                    <td>UK Opportunities</td>
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
                <h1>Engineering at Scale</h1>
                <p>Take ownership of optimizing AWS cloud infrastructure for peak efficiency to coding and deploying innovative platform features, your fresh perspective will help solve complex problems and genuinely shape the future of our technology</p>            <!-- table to contain the fun fact section thing -->
            </div>
            <table>
                <tr>
                    <th>50+</th>
                    <th>50%+</th>
                    <th>1,000+</th>
                </tr>
                <tr>
                    <td>Different Schemes</td>
                    <td>STEAM Careers</td>
                    <td>New Roles Yearly</td>
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

    <script src="script.js">
</body>
</html>
