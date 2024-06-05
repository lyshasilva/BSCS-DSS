<?php
include "db.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["student_id"];
    $event_id = $_POST["event_id"];
    $paid_amount = $_POST["paid_amount"];
    $payment_status = $_POST["payment_status"];

    // Get existing fine details
    $get_fine_details_sql = "SELECT * FROM fines WHERE Student_ID = '$student_id' AND Event_ID = '$event_id'";
    $result = $conn->query($get_fine_details_sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Update fines table with existing data and add new payment
        $update_fines_sql = "UPDATE fines 
                             SET Paid_Amount = Paid_Amount + $paid_amount, Payment_Status = '$payment_status' 
                             WHERE Student_ID = '$student_id' AND Event_ID = '$event_id'";

        // Insert into payment_records table
        $insert_payment_sql = "INSERT INTO payment_records (Student_ID, Fine_ID, Payment_Date, Amount, Payment_Type)
                               VALUES ('$student_id', '{$row['Fine_ID']}', NOW(), $paid_amount, 'Fine')";
        
        // Perform both queries within a transaction
        $conn->begin_transaction();

        try {
            $conn->query($update_fines_sql);
            $conn->query($insert_payment_sql);

            // If both queries are successful, commit the transaction
            $conn->commit();

            // Redirect with success message
            header("Location: ../html/display_fines.php?message=success");
            exit();
        } catch (Exception $e) {
            // If any error occurs, rollback the transaction
            $conn->rollback();

            // Redirect with error message
            header("Location: ../html/display_fines.php?message=error&error=" . urlencode($e->getMessage()));
            exit();
        }
    } else {
        // If no fine details are found, redirect with an error message
        header("Location: ../html/display_fines.php?message=error&error=" . urlencode("No record found"));
        exit();
    }
}

$conn->close();
?>
