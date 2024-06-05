<?php
include('../php/functions.php/anti-shortcut_treasurer.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Monthly Due</title>
    <meta charset="utf-8" />
    <link rel="icon" href="../pics/DSS_favicon.png" type="image/png">
    <link rel="stylesheet" href="../css/DisplayMDStyle.css" />
	<link rel="stylesheet" type="text/css" href="..\css\navBar.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,700;0,900;1,400;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,700;0,900;1,300;1,900&family=Oswald:wght@500&display=swap" rel="stylesheet">
</head>

<body>
	
    <div class="desktop">
    <div class="nav-container">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="home-navigation" aria-current="page" href="home_treasurer.php">
                            <img src="..\Pics\Home_Button.png" alt="Home Button" class="icon-png">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="home-navigation" aria-current="page" href="update.php">
                            <img src="..\Pics\MD_Button.png" alt="Update Monthly Due Button" class="icon-png">
                            </a>
                    </li>
                    <li class="nav-item">
                        <a class="home-navigation" aria-current="page" href="search_records.php">
                            <img src="..\Pics\Search_Button.png" alt="Search Button" class="icon-png">
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
                                </a>
                        </li>
                </ul>
            </div>
        
        <div class="display_MD">
            <div class="display_MD-background-holder">
                <div class="background-display_MD">
                    <img class="logo-background" src="../pics/Cs_Logo.png" />
                </div>
            </div>
            <div class="foreground-display_MD-holder">
                <div class="foreground-display_MD">
                    <div class="foreground-display_MD-top">
                        <div class="foreground-display_MD-top-overlay">
                            <div class="foreground-display_MD-top-left">
                                <button class="go_back-button-display_MD" onclick="goBack()"><< Go Back</button>
                            </div>
                            <div class="foreground-display_MD-top-right">
                                <div class="header-display_MD">
                                    <h2>Monthly Dues</h2>
                                </div>
                                <button class="add_payment-button" onclick="showDialog()">Add Payment</button>
                                <div class="custom-dialog" id="customDialog">
                                    <div class="dialog-header" id="dialogHeader">
                                        <button class="close-btn" onclick="closeDialog()">x  </button>
                                        <h2>Add Monthly Due Payments</h2>
                                    </div>
                                    
                                        <form action="../php/update_MDProc.php" method="post">
                                            <label for="student_id">Student ID:</label>
                                            <input class= "stud_ID_field" type="text" name="student_id" required>
                                            
                                            <label for="month">Month:</label>
                                            <select class="month_field" name="month" required>
                                            <option value="AUG">August</option>
                                            <option value="SEPT">September</option>
                                            <option value="OCT">October</option>
                                            <option value="NOV">November</option>
                                            <option value="DECE">December</option>
                                            <option value="JAN">January</option>
                                            <option value="FEB">February</option>
                                            <option value="MAR">March</option>
                                            <option value="APR">April</option>
                                            <option value="MAY">May</option>
                                            </select>

                                            </br>
                                            
                                            <label for="amount">Amount:</label>
                                            <input class= "amount_field" type="number" name="amount" required>

                                            <input class=add-btn type="submit"  id="messageDisplay" value="Add Payment">
                                        </form>
                                      
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="foreground-display_MD-bottom">
                        <div class = "table">		                
                            <?php include('../php/display_MDProc.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
    <script>
         function showDialog() {
            
            document.getElementById('customDialog').style.display = 'block';
            }

        function closeDialog() {
            document.getElementById('customDialog').style.display = 'none';
                                }

        function goBack() {
            window.location.href = 'update.php';
            }
        // Function to show the dialog
        function showDialog() {
            var dialog = document.getElementById('customDialog');
            dialog.style.display = 'block';
            dialog.style.top = '50%'; // Reset position
            dialog.style.left = '50%'; // Reset position
            dialog.style.transform = 'translate(-50%, -50%)'; // Reset transform
        }

        // Function to close the dialog
        function closeDialog() {
            document.getElementById('customDialog').style.display = 'none';
        }

        // Make the dialog movable
        function makeDialogMovable(dialog, header) {
            let posX = 0, posY = 0, initialX = 0, initialY = 0;
            
            header.onmousedown = dragMouseDown;

            function dragMouseDown(e) {
                e.preventDefault();
                initialX = e.clientX;
                initialY = e.clientY;
                document.onmouseup = closeDragElement;
                document.onmousemove = elementDrag;
                dialog.style.opacity = 0.5;
            }

            function elementDrag(e) {
                e.preventDefault();
                posX = initialX - e.clientX;
                posY = initialY - e.clientY;
                initialX = e.clientX;
                initialY = e.clientY;
                dialog.style.top = (dialog.offsetTop - posY) + "px";
                dialog.style.left = (dialog.offsetLeft - posX) + "px";
                dialog.style.transform = "none"; // Disable transform for accurate positioning
            }

            function closeDragElement() {
                document.onmouseup = null;
                document.onmousemove = null;
                dialog.style.opacity = 1;
            }
        }

        // Initialize the draggable dialog
        document.addEventListener("DOMContentLoaded", function() {
            var dialog = document.getElementById("customDialog");
            var header = document.getElementById("dialogHeader");
            makeDialogMovable(dialog, header);
        });
    </script>
	
	
</body>

</html>

