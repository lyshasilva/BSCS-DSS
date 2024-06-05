<?php
// Function to populate attendance table for a new event
function populateAndMarkAbsent($eventID, $closingTime) {
    global $conn;

    // Get all student IDs from the student_information table
    $studentsQuery = "SELECT Student_ID FROM student_information";
    $studentsResult = $conn->query($studentsQuery);

    // Populate attendance table for each student with default attendance_status
    while ($student = $studentsResult->fetch_assoc()) {
        $studentID = $student['Student_ID'];

        $insertQuery = "INSERT INTO attendance (Event_ID, Student_ID, Attendance_Status, Attendance_Time)
                VALUES ('$eventID', '$studentID', '', TIME(NOW()))";

        $conn->query($insertQuery);
    }

/*
    // Update attendance status to "Absent" for students who haven't been marked as present
    $updateQuery = "UPDATE attendance
                    SET Attendance_Status = 'Absent'
                    WHERE Event_ID = '$eventID'
                    AND Attendance_Status = ''
                    AND CURTIME() > '$closingTime'";
    $conn->query($updateQuery); */
}
?>
