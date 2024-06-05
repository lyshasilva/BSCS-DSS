<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in'])) {
    // User is not logged in, redirect to login page
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/navBar.css">
	<link rel="icon" href="../pics/DSS_favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Varela+Round:wght@400;700&display=swap">
</head>
<body>
    <div class=overall-holder>
        <div class="home">
            <div class="left-elements-holder">
                <img src="../pics/Cs_Logo.png" alt="Cs_Logo" class="bscs-logo"> 
            </div>

            <div class="right-elements-holder">
                <div class="right-home-content">
                    <div class="header-container">
                        <h1>TREASURER INSIGHTS</h1>
                    </div>
                
                    <div class="greetings-container">
                        <h1>Hello,</h1>
                        <h1>ComSci Pip!</h1>
                    </div>
                </div>
            </div>

        </div>


        <div class="nav-container">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="home-navigation" aria-current="page" href="home_treasurer.php">
                            <img src="..\Pics\Home_Button.png" alt="Home Button" class="icon-png">
                            <span class="tooltip-text">home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="home-navigation" aria-current="page" href="update.php">
                            <img src="..\Pics\MD_Button.png" alt="Update Monthly Due Button" class="icon-png">
                            <span class="tooltip-text">update</span>
                            </a>
                    </li>
                    <li class="nav-item">
                        <a class="home-navigation" aria-current="page" href="search_records.php">
                            <img src="..\Pics\Search_Button.png" alt="Search Button" class="icon-png">
                            <span class="tooltip-text">search</span>
                            </a>
                    </li>

                        <!--
                        <li class="nav-item">
                            <a class="home-navigation" aria-current="page" href="#">
                                <img src="..\Pics\Records_Button.png" alt="Records Button" class="icon-png">
                                </a>
                        </li>-->
                        <li class="nav-item">
                            <a class="home-navigation" aria-current="page" href="settings.php">
                                <img src="..\Pics\Settings_Button.png" alt="Settings Button" class="icon-png">
                                <span class="tooltip-text">settings</span>
                                </a>
                        </li>
                </ul>
            </div>
    </div>
</body>
</html>
