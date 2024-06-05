<?php
include('../php/functions.php/anti-shortcut_treasurer.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fines</title>
    <link rel="stylesheet" href="../css/display_finesStyle.css">
    <link rel="stylesheet" type="text/css" href="../css/navBar.css">
    <link rel="icon" href="../pics/DSS_favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,700;0,900;1,400;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,700;0,900;1,300;1,900&family=Oswald:wght@500&display=swap" rel="stylesheet">
</head>
<body style="background-color:#E2E6EA">
<div class="overall-holder-display-fines">
   
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
    <div class="display_fines" style="flex-wrap: wrap">
        <div class="background-holder">
            <div class="background-display_fines">
                <img class="logo-background" src="../pics/Cs_Logo.png" />
            </div>  
        </div>
        
        <div class="foreground-display_fines">
            <div class="foreground-left-and-right">
                <div class="foreground-left">
                    
                    <div class="table-container">
                        <div class="containers">
                            <table>
                                <tbody>
                                <?php include '../php/display_finesProc.php'; ?>
                                    <!-- Add table rows or content here based on PHP-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                    
                <div class="foreground-right">
                    <div class="foreground-right-fixed">
                        <h1>FINES</h1>
                        
                            <button class="pay-fines-btn" onclick="showDialog()">Pay Fines</button>
                            <div class="custom-dialog-fines" id="customDialog">
                                <div class="dialog-header" id="dialogHeader">
                                    <button class="close-btn-fines" onclick="closeDialog()">x</button>
                                    <h2>Fine Payment</h2>
                                </div>
                                <form action="../php/pay_finesProc.php" method="post" class="pay-fines-form">
                                    <label for="student_id">Student ID:</label>
                                    <input class="student_id" type="text" id="student_id" name="student_id" required>

                                    <label for="event_id">   Event ID:</label>
                                    <input class="event_id" type="text" id="event_id" name="event_id" required>

                                    <label for="paid_amount">   Paid Amount:</label>
                                    <input class="paid_amount" type="number" id="paid_amount" name="paid_amount" required>
                            
                                    <label for="payment_status">   Payment Status:</label>
                                    <select class="payment_status" id="payment_status" name="payment_status" required>
                                        <option value="Not Cleared">Not Cleared</option>
                                        <option value="Cleared">Cleared</option>
                                    </select>

                                    <button class="submit-payment-btn" type="submit" >Submit Payment</button>
                                </form>
                                <?php
                                    if (isset($_GET['message']) && $_GET['message'] == 'success') {
                                        echo '<script>alert("Payment information updated and recorded successfully");
                                                 window.location.href = "display_fines.php";
                                            </script>';
                                    }
                                    elseif (isset($_GET['message']) && $_GET['message'] == 'error' && isset($_GET['error'])) {
                                        echo '<script>alert("Error: ' . urldecode($_GET['error']) . '");
                                                 window.location.href = "display_fines.php";
                                            </script>';


                                    }
                                    ?>
                    
                            </div>
                        
                        <button class="display-fines-back-button" onclick="goBack()">Back</button>
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
            dialog.style.left = '-40%'; // Reset position
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
