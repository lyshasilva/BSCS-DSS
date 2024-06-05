<?php
// Database connection details
include('db.php');


// Get user input from the login form
$student_id = $_POST['student_id'];
$password = $_POST['pwd'];

// SQL query to check if the provided credentials are valid
$sql = "SELECT * FROM student_information WHERE Student_ID = '$student_id' AND Password = '$password'";
$result = $conn->query($sql);

// Check if the query returned a matching user
if ($result === false) {
    die("Query failed: " . $conn->error);
}

if ($result->num_rows > 0) {
    // Valid credentials, fetch user details
    $user = $result->fetch_assoc();
	
	 // Set session variables
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['user_type'] = $user['UserType'];

    // Check the user type and redirect accordingly
      // Check the user type and redirect accordingly
      if ($user['User_Type'] === 'student') {
        header("Location: ../index.php?error=InterfaceNotAvailable");
    } elseif ($user['User_Type'] === 'treasurer') {
        header("Location: ../html/home_treasurer.php");
    } 
	elseif ($user['User_Type'] === 'secretary') {
        header("Location: ../index.php?error=InterfaceNotAvailable");
    } elseif ($user['User_Type'] === 'admin') {
        header("Location: ../index.php?error=InterfaceNotAvailable");
    }
  /*  if ($user['User_Type'] === 'student') {
        header("Location: ../student_interface/html/home_student.php");
    } elseif ($user['User_Type'] === 'treasurer') {
        header("Location: ../html/home_treasurer.php");
    } 
	elseif ($user['User_Type'] === 'secretary') {
        header("Location: ../secretary_interface/html/home_secretary.php");
    } elseif ($user['User_Type'] === 'admin') {
        header("Location: ../html/home_admin.php");
    }*/
	
} else {
    // Invalid credentials, display error message in a dialog box
    echo '<script>';
    echo 'alert("Wrong username or password. Please try again.");';
    echo 'window.location.href = "../index.php";';
    echo '</script>';
    exit(); // Make sure to exit after the script to prevent further execution
}



// Close the database connection
$conn->close();