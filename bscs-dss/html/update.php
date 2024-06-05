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
    <title>Update</title>
        <meta charset="utf-8" >
        <link rel="icon" href="../pics/DSS_favicon.png" type="image/png">
        <link rel="stylesheet" href="../css/updateStyle.css">
		<link rel="stylesheet" type="text/css" href="../css/navBar.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Varela+Round:wght@400;700&display=swap">
    </head>
    <body>
        <div class="overall-holder-update">
            <div class="update">
                <div class="background">
                    <img class="logo-background" src="../pics/Cs_Logo.png" />
                </div>
                <div class="update-button-holder">
                    <button class="update-button" onclick="window.location.href='display_fines.php'">Fines</button>
                    <button class="update-button" onclick="window.location.href='display_MD.php'">Monthly Dues</button>
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

