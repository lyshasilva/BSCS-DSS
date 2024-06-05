<?php
// Database connection
include('../php/db.php');

// Query to retrieve data with JOIN on student_information table
$sql = "SELECT monthly_dues.*, student_information.Student_ID, student_information.Surname, student_information.First_Name, student_information.Year FROM monthly_dues 
        INNER JOIN student_information ON monthly_dues.Student_ID = student_information.Student_ID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr>
            <th>Student ID</th>
            <th>Surname</th>
            <th>First Name</th>
            <th>Year</th>
            <th>AUG</th>
            <th>SEPT</th>
            <th>OCT</th>
            <th>NOV</th>
            <th>DEC</th>
            <th>JAN</th>
            <th>FEB</th>
            <th>MAR</th>
            <th>APR</th>
            <th>MAY</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["Student_ID"] . "</td>
                <td>" . $row["Surname"] . " </td>
                <td>" . $row["First_Name"] . "</td>
                <td>" . $row["Year"] . "</td>
                <td>" . $row["AUG"] . "</td>
                <td>" . $row["SEPT"] . "</td>
                <td>" . $row["OCT"] . "</td>
                <td>" . $row["NOV"] . "</td>
                <td>" . $row["DECE"] . "</td>
                <td>" . $row["JAN"] . "</td>
                <td>" . $row["FEB"] . "</td>
                <td>" . $row["MAR"] . "</td>
                <td>" . $row["APR"] . "</td>
                <td>" . $row["MAY"] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
