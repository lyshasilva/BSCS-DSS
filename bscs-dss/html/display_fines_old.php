<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/display_finesStyle_old.css">
		<link rel="stylesheet" type="text/css" href="..\css\navBar.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,700;0,900;1,400;1,900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,700;0,900;1,300;1,900&family=Oswald:wght@500&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="desktop">
            <div class="div">
                <div class="overlap">
                    <img class="logo" src="../pics/Cs_Logo.png" />
                    <div class="fines">FINES</div>
                </div>
                <div>
					<button class="pay-fines-btn" onclick="showDialog()">Pay Fines</button>
					<div class="overlay" id="overlay"></div>
					<div class="custom-dialog-fines" id="customDialog">
						<button class="close-btn-fines" onclick="closeDialog()">x</button>
						<h2>Fine Payment</h2>
						<form action="../php/pay_finesProc.php" method="post">
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
							<br>
							<button class="submit-payment-btn" type="submit" >Submit Payment</button>
						</form>
  				
					</div>

<script>
  function showDialog() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('customDialog').style.display = 'block';
  }

  function closeDialog() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('customDialog').style.display = 'none';
  }
</script>
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
            </div>
           
        </div>
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

    </body>
</html>
