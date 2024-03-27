<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve test name from the form
    $testName = $_POST['test-name-hidden']; 
    $questNo = $_POST['questionNumber'];
    // Fetch the test name from the form

    // Loop through each question form submitted
    foreach ($_POST as $key => $value) {
        // Check if the form field is a question field (question_[id])
        if (strpos($key, 'question_') !== false) {
            // Extract question ID from the form field
            $questionId = substr($key, strpos($key, '_') + 1);

            // Retrieve question details from the form
            $questionText = mysqli_real_escape_string($conn, $value);
            $structured = $_POST['structured'];
            $correctAnswer = $_POST['correct-answer'];
            $option1 = $_POST['option1'];
            $option2 = $_POST['option2'];
            $option3 = $_POST['option3'];
            $option4 = $_POST['option4'];
           
            // Update the question details in the database
            $updateQuery = "UPDATE questions SET question_text = '$questionText', is_structured = $structured, option1 = '$option1', option2 = '$option2', option3 = '$option3', option4 = '$option4', correct_answer = '$correctAnswer' WHERE id = $questionId AND test_name = '$testName'";
            if (mysqli_query($conn, $updateQuery)) {
                echo "Question updated successfully.";
                header("Location: exam2.php?test_name=$testName#$questNo");
            } else {
                echo "Error updating question: " . mysqli_error($conn);
            }
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>
