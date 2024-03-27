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
    $stmt = $conn->prepare("SELECT * FROM students WHERE  adm_no= ? AND password = ?");
    $stmt->bind_param("ss", $adm_no, $password);

    // Set parameters and execute statement
    $adm_no = $_POST['Adm_No']; // Assuming the form field name is 'email'
    $password = $_POST['password'];

    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there is a match
    if ($result->num_rows == 1) {
        // Fetch the student's data
        $student_data = $result->fetch_assoc();

        $_SESSION['student_id'] = $student_data['adm_no']; 
        $_SESSION['stud_id'] = $student_data['student_id']; 
        $_SESSION['student_email'] = $student_data['email'];
        // You can store more student data as needed

        // Redirect to student's home page
        header("Location: students_home_page.php");
        exit();
    } else {
        // Redirect back to the login page with an error message
        header("Location: login_as_student.php?error=invalid_login");
        exit();
    }

    // Close statement and connection
}
?>
