<?php
// Connect to the database
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Get values from the form
$student_id = $_POST['student_id'];
$month = $_POST['month'];
$amount = $_POST['amount'];

//echo "Student ID: $student_id, Month: $month, Amount: $amount\n";
/*
echo "<script>console.log('Student ID: $student_id, Month: $month, Amount: $amount');</script>";*/
echo "<script>
        console.log('Student ID: $student_id, Month: $month, Amount: $amount');
        document.getElementById('messageDisplay').innerHTML = 'Student ID: $student_id, Month: $month, Amount: $amount';
      </script>";


// Retrieve old data from the monthly_dues table
$select_old_data_sql = "SELECT `$month` FROM `monthly_dues` WHERE `Student_ID` = '$student_id'";
$result = $conn->query($select_old_data_sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $old_amount = $row[$month];

    // Update data in the monthly_dues table
    $new_amount = $old_amount + $amount;

    $update_sql = "UPDATE `monthly_dues` SET `$month` = '$new_amount' WHERE `Student_ID` = '$student_id'";

    if ($conn->query($update_sql) === TRUE) {
        // Insert data into the payment_records table
        $payment_type = "Monthly Due";
        $payment_date = date("Y-m-d H:i:s");

        $insert_payment_sql = "INSERT INTO payment_records (Student_ID, Payment_Date, Amount, Payment_Type, Month)
                               VALUES ('$student_id', '$payment_date', '$amount', '$payment_type', '$month')";

        if ($conn->query($insert_payment_sql) === TRUE) {
               // Display success message
        /*echo "<script>alert('Payment records updated successfully');</script>";*/
		echo "<script>
                alert('Payment records updated successfully');
                window.location.href = '../html/display_MD.php';
              </script>";
    } else {
        // Display error updating payment records
		/*
        echo "<script>alert('Error updating payment records: " . $conn->error . "');</script>";*/
		  // Display error updating payment records
        echo "<script>
                alert('Error updating payment records: " . $conn->error . "');
                document.getElementById('messageDisplay').innerHTML = 'Error updating payment records: " . $conn->error . "';
              </script>";
    }
} 

} else {
    // Display no existing data found message
	
    echo "<script>alert('No existing data found for the specified student ID');
    window.location.href = '../html/display_MD.php';</script>";
}
}

// Close the database connection
$conn->close();
?>
