<?php

session_start();
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "smart_revision";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST['question'])) {
    // Retrieve form data
    $student_id =  $_SESSION['student_id'];
    $question = $_POST['question'];

    // Prepare SQL statement to insert question details into the database
    $sql = "INSERT INTO question_inquiry(student_id, question) VALUES ('$student_id', '$question')";

    // Execute SQL statement
    if (mysqli_query($conn, $sql)) {
        echo "Question posted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
