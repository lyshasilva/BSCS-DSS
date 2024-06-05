<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../pics/DSS_favicon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="..\css\navBar.css">
    <link rel="stylesheet" type="text/css" href="..\css\search_RecordsProcStyle.css">
 
	</head>
    
<body>

<div class="overall-search_recordsProc-holder">
    <div class="search_recordsProc">
        <div class="search_recordsProc-background-holder">
            <div class="background-search_RecordsProcStyle">
                <img class="logo-background" src="../pics/Cs_Logo.png" />
            </div>
        </div>
        <div class="foreground-search_recordsProc-holder">
            <div class="foreground-search_recordsProc">
                <button class="back-button-search_records" onclick="goBack()"><< Go Back </button>
            </div>
        </div>
        
        
		<div class="table-bring-front">

            <?php
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                // Check if the "query" key exists in the $_GET array
                if (isset($_GET["query"])) {
                    // Get the student ID from the query parameter
                    $studentID = $_GET["query"];

                // Perform a database query to retrieve student information
                $studentQuery = "SELECT * FROM student_information WHERE Student_ID = ?";
                $studentStatement = $conn->prepare($studentQuery);
                $studentStatement->bind_param("s", $studentID);
                $studentStatement->execute();

                // Get the result
                $studentResult = $studentStatement->get_result();

                // Fetch student information
                $studentInfo = $studentResult->fetch_assoc();
                
                // Display student information at the top
                if ($studentInfo) {
                    // Display the year in the desired format
                    $yearLabel = getYearLabel($studentInfo['Year']);
                    echo "<h2>{$studentInfo['Student_ID']}\t{$studentInfo['Surname']}, {$studentInfo['First_Name']} {$studentInfo['Middle_Name']}\t\t\t{$yearLabel}</h2>";
                }

                // Close the statement and result set for student information
                $studentStatement->close();
                $studentResult->close();

                // Perform a database query to retrieve payment records
                $paymentQuery = "SELECT * FROM payment_records WHERE Student_ID = ?";
                $paymentStatement = $conn->prepare($paymentQuery);
                $paymentStatement->bind_param("s", $studentID);
                $paymentStatement->execute();

                // Get the result
                $paymentResult = $paymentStatement->get_result();

                // Fetch all records
                $records = $paymentResult->fetch_all(MYSQLI_ASSOC);

                // Display the records
                if ($records) {
                    echo "<table border='1'>";
                    echo "<tr><th>Payment ID</th><th>Payment Date</th><th>Amount</th><th>Payment Type</th><th>Month</th><th>Fine ID</th><th>Description</th></tr>";
                    foreach ($records as $record) {
                        echo "<tr>";
                        echo "<td>{$record['Payment_ID']}</td>";
                        echo "<td>{$record['Payment_Date']}</td>";
                        echo "<td>{$record['Amount']}</td>";
                        echo "<td>{$record['Payment_Type']}</td>";
                        echo "<td>{$record['Month']}</td>";
                        echo "<td>{$record['Fine_ID']}</td>";
                        echo "<td>{$record['Description']}</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No records found for Student ID: $studentID</p>";
                }

                // Close the statement and result set for payment records
                $paymentStatement->close();
                $paymentResult->close();
            }
            }

            // Function to get the year label
            function getYearLabel($year) {
                switch ($year) {
                    case 1:
                        return "First Year";
                    case 2:
                        return "Second Year";
                    case 3:
                        return "Third Year";
                    case 4:
                        return "Fourth Year";
                    default:
                        return "Not Regular";
                }
            }
            ?>
        </div>
    </div>

<!--
 	<div class="nav-container">
        <ul class="nav flex-column">
            <li class="nav-item">
              <a class="home-navigation" aria-current="page" href="../html/home_treasurer.php">
                <img src="..\Pics\Home_Button.png" alt="Home Button" class="icon-png">
                </a>
           
            </li>
            <li class="nav-item">
                <a class="home-navigation" aria-current="page" href="../html/update.php">
                    <img src="..\Pics\MD_Button.png" alt="Update Monthly Due Button" class="icon-png">
                    </a>
            </li>
            <li class="nav-item">
                <a class="home-navigation" aria-current="page" href="../html/search_records.php">
                    <img src="..\Pics\Search_Button.png" alt="Search Button" class="icon-png">
                    </a>
            </li>
        --><!--
            <li class="nav-item">
                <a class="home-navigation" aria-current="page" href="#">
                    <img src="..\Pics\Records_Button.png" alt="Records Button" class="icon-png">
                    </a>
            </li>--> <!--
            <li class="nav-item">
                <a class="home-navigation" aria-current="page" href="../html/settings.php">
                    <img src="..\Pics\Settings_Button.png" alt="Settings Button" class="icon-png">
                    </a>
            </li>
          </ul>

    </div>
	-->
        </div>
    <script>
         function goBack() {
            window.location.href = '../html/search_records.php';
        }

        </script>
</body>
</html>