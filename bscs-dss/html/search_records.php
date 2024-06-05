
<?php
include('../php/functions.php/anti-shortcut_treasurer.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search Records</title>
    <meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../css/navBar.css">
    <link rel="icon" href="../pics/DSS_favicon.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="../css/search_recordsStyle.css">
    <!--<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,700;0,900;1,400;1,900&display=swap" rel="stylesheet">
    <!--<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,700;0,900;1,300;1,900&family=Oswald:wght@500&display=swap" rel="stylesheet">

	

</head>

<body>
<div class="search_records-overall_holder">
    
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
    <div class="search_records"> 
        <div class="background-holder-search_records">
            <div class="background-search_records">
                <img class="logo-background" src="../pics/Cs_Logo.png" />
            </div>  
        </div>
        <div class="foreground-holder-search_records">
            <div class="foreground-search_records">
                <div class="foreground-search_records-left-and-right">
                    <div class="foreground-search_records-left">

                    </div>

                    <div class="foreground-search_records-right">
                        <div class="search-header-holder">
                            <h2>SEARCH RECORDS</h2>
                        </div>
                        <div class="searchbar-background">
                            <div class="searchbar-form-holder">
                                <form action="../php/search_recordsProc.php" method="GET" class="search-form">
                                    <input type="text" class="search-input" placeholder="Enter ID Number" name="query"/>
                                    <button type="submit" class="search-button">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   
</body>


</html>
