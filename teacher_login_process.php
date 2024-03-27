<?php
session_start(); // Start the session

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to your database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "smart_revision";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement to fetch data
    $stmt = $conn->prepare("SELECT * FROM teacher WHERE tsc_no = ? AND password = ?");
    $stmt->bind_param("ss", $tsc_no, $password);

    // Set parameters and execute statement
    $tsc_no = $_POST['tsc'];
    $password = $_POST['password'];

    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there is a match
    if ($result->num_rows == 1) {
        // Fetch the teacher's data
        $teacher_data = $result->fetch_assoc();

        // Store teacher email in session variable
        $_SESSION['teacher_email'] = $teacher_data['email'];

        // Redirect to teacher's home page
        header("Location: teachers_home_page.php");
        exit();
    } else {
        // Redirect back to the login page with an error message
        header("Location: login_as_teacher.php?error=invalid_login");
        exit();
    }

    // Close statement and connection
    
}
?>
