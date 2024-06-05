<?php
include('../php/functions.php/anti-shortcut_treasurer.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="../css/settingsStyle.css">
    <link rel="stylesheet" type="text/css" href="../css/navBar.css">
    <link rel="icon" href="../pics/DSS_favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,700;0,900;1,400;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,700;0,900;1,300;1,900&family=Oswald:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="overall-holder-update">
        <div class="settings">
            <div class="background-settings">
                <img class="logo-background" src="../pics/Cs_Logo.png" />
            </div>
            <div class="log-out-form-container">
                <div class="log-out-form-container2">
                <form method="post" class="log-out-form">
                    <button type="submit" name="logout" class="logout-button">Log Out</button>
                </form>
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
