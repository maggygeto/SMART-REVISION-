<?php
// Database connection parameters
$servername = "localhost"; // Change this to your database server hostname
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "smart_revision"; // Change this to your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve test name from the form
    $testName = $_POST['test-name-hidden']; // Fetch the test name from the form
    $questNo = $_POST['questionNumber'];

    // Loop through each question form submitted
    for ($i = 1; isset($_POST['question_' . $i]); $i++) {
        // Retrieve question details from the form
        $question = mysqli_real_escape_string($conn, $_POST['question_' . $i]);
        $structured = isset($_POST['structured_' . $i]) ? 1 : 0;
        $correctAnswer = $_POST['correct-answer-text'];
        $correctAnswered = $_POST['correct-answer'];
        echo $correctAnswered;
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];

        // Check if the question already exists in the database based on test name and question text
        $checkQuery = "SELECT * FROM questions WHERE test_name = '$testName' AND question_text = '$question'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // If the question exists, update its information
            $updateQuery = "UPDATE questions SET is_structured = $structured, option1 = '$option1', option2 = '$option2', option3 = '$option3', option4 = '$option4', correct_answer = '$correctAnswer' WHERE test_name = '$testName' AND question_text = '$question'";
            if (mysqli_query($conn, $updateQuery)) {
                echo "Question updated successfully.";
                header("Location: exam2.php?test_name=$testName");
                 exit(); // Ensure that no further output is sent
            } else {
                echo "Error updating question: " . mysqli_error($conn);
            }
        } else {

            if($structured == 1){
            // If the question does not exist, insert it as a new question
            $insertQuery = "INSERT INTO questions (test_name, question_text, is_structured, option1, option2, option3, option4, correct_answer) VALUES ('$testName', '$question', $structured, '$option1', '$option2', '$option3', '$option4', '$correctAnswer')";
            } else{
                $insertQuery = "INSERT INTO questions (test_name, question_text, is_structured, option1, option2, option3, option4, correct_answer) VALUES ('$testName', '$question', $structured, '$option1', '$option2', '$option3', '$option4', '$correctAnswered')";
            }
            if (mysqli_query($conn, $insertQuery)) {
                echo "Question inserted successfully.";
                header("Location: exam2.php?test_name=$testName#$questNo++");
                exit(); // Ensure that no further output is sent
            } else {
                echo "Error inserting question: " . mysqli_error($conn);
            }
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>
