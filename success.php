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
    <h1>Sign Up Successful!!!</h1>
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