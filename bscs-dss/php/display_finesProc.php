
<?php

include "db.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT fines.*, events.Event_ID, events.Event_Name, student_information.Surname, student_information.First_Name, student_information.Middle_Name, student_information.Suffix
        FROM fines
        JOIN events ON fines.Event_ID = events.Event_ID
        JOIN student_information ON fines.Student_ID = student_information.Student_ID
        ORDER BY fines.Event_ID, fines.Student_ID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $currentEventID = null;

    while ($row = $result->fetch_assoc()) {
        // Check if we are starting a new event
        if ($currentEventID !== $row["Event_ID"]) {
            // Close previous table if not the first event
            if ($currentEventID !== null) {
                echo "</tbody></table>";
            }

            // Display Event_ID and Event_Name as the title
            echo "<h2>Event ID: " . $row["Event_ID"] . " - Event Name: " . $row["Event_Name"] . "</h2>";

            // Start a new table for the current event
            echo "<table><thead><tr>";
            echo "<th>Student ID</th>";
            echo "<th>Last Name</th>";
            echo "<th>First Name</th>";
            echo "<th>Middle Name</th>";
            echo "<th>Suffix</th>";
            echo "<th>Paid Amount</th>";
            echo "<th>Payment Status</th>";
            echo "</tr></thead><tbody>";

            // Update current event ID
            $currentEventID = $row["Event_ID"];
        }

        // Display record for the current event
        echo "<tr>";
        echo "<td>" . $row["Student_ID"] . "</td>";
        echo "<td>" . $row["Surname"] . "</td>";
        echo "<td>" . $row["First_Name"] . "</td>";
        echo "<td>" . $row["Middle_Name"] . "</td>";
        echo "<td>" . $row["Suffix"] . "</td>";
        echo "<td>" . $row["Paid_Amount"] . "</td>";
        echo "<td>" . $row["Payment_Status"] . "</td>";
        echo "</tr>";
    }

    // Close the last table
    echo "</tbody></table>";
} else {
   // echo "<p>No records found</p>";
	echo "<script>alert('No records found');</script>";
    // Alternative option if script tags are not working
    echo "<p>No records found</p>";
}

$conn->close();

/* 
include "db.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT fines.*, events.Event_ID, events.Event_Name, student_information.Surname, student_information.First_Name, student_information.Middle_Name, student_information.Suffix
        FROM fines
        JOIN events ON fines.Event_ID = events.Event_ID
        JOIN student_information ON fines.Student_ID = student_information.Student_ID
        ORDER BY fines.Event_ID, fines.Student_ID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $currentEventID = null;

    while ($row = $result->fetch_assoc()) {
        // Check if we are starting a new event
        if ($currentEventID !== $row["Event_ID"]) {
            // Display the first event only
            if ($currentEventID !== null) {
                break; // Break the loop after displaying the first event
            }

            // Display Event_ID and Event_Name as the title
            echo "<h2>Event ID: " . $row["Event_ID"] . " - Event Name: " . $row["Event_Name"] . "</h2>";

            // Start a new table for the current event
            echo "<table><thead><tr>";
            echo "<th>Student ID</th>";
            echo "<th>Surname</th>";
            echo "<th>First Name</th>";
            echo "<th>Middle Name</th>";
            echo "<th>Suffix</th>";
            echo "<th>Paid Amount</th>";
            echo "<th>Payment Status</th>";
            echo "</tr></thead><tbody>";

            // Update current event ID
            $currentEventID = $row["Event_ID"];
        }

        // Display record for the current event
        echo "<tr>";
        echo "<td>" . $row["Student_ID"] . "</td>";
        echo "<td>" . $row["Surname"] . "</td>";
        echo "<td>" . $row["First_Name"] . "</td>";
        echo "<td>" . $row["Middle_Name"] . "</td>";
        echo "<td>" . $row["Suffix"] . "</td>";
        echo "<td>" . $row["Paid_Amount"] . "</td>";
        echo "<td>" . $row["Payment_Status"] . "</td>";
        echo "</tr>";
    }

    // Close the table
    echo "</tbody></table>";
} else {
    echo "<p>No records found</p>";
}

$conn->close();
*/

?>
