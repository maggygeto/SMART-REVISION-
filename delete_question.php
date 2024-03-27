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

// Check if question ID and test name are provided in the GET request
if(isset($_GET['question_id']) && isset($_GET['test_name'])) {
    // Sanitize inputs
    $questionId = mysqli_real_escape_string($conn, $_GET['question_id']);
    $testName = mysqli_real_escape_string($conn, $_GET['test_name']);

    // Construct SQL query to delete the question
    $sql = "DELETE FROM questions WHERE id = '$questionId' AND test_name = '$testName'";

    // Execute the query
    if(mysqli_query($conn, $sql)) {
        echo "Question deleted successfully.";
        header("Location: exam2.php?test_name=$testName");
    } else {
        echo "Error deleting question: " . mysqli_error($conn);
    }
} else {
    echo "Question ID and test name not provided.";
}

// Close the database connection
mysqli_close($conn);
?>
