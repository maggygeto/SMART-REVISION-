<?php
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

    // Prepare and bind SQL statement to insert data
    $stmt = $conn->prepare("INSERT INTO Teacher (tsc_no, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $tsc_no, $email, $password);

    // Set parameters and execute statement
    $tsc_no = $_POST['tsc']; // Assuming Adm_No is the name of the input field in the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($stmt->execute()) {
        // Close statement and connection
        $stmt->close();
        $conn->close();
        
        // Redirect to login page
        header("Location: login_as_teacher.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
