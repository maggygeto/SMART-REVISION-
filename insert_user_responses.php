<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to your database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "smart_revision";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement to insert user response
    $stmt = $conn->prepare("INSERT INTO user_responses (student_Adm_no, test_name, question_text, correct_answer) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $student_Adm_no, $test_name, $question_text, $correct_answer);

    // Set parameters
    $student_Adm_no = $_SESSION['student_id']; // Assuming student_id is set in the session
    $test_name = $_POST['test_name']; // Assuming the test name is sent via POST
    $question_text = $_POST['question_text']; // Assuming the question text is sent via POST
    $correct_answer = $_POST['correct_answer']; // Assuming the correct answer is sent via POST

    // Execute statement
    $stmt->execute();

    // Check if insertion was successful
    if ($stmt->affected_rows > 0) {
        echo "User response inserted successfully.";
        header("Location: test.php?test_name=$test_name");
    } else {
        echo "Error inserting user response: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
