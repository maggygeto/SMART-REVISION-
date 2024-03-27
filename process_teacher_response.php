<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $questionId = $_POST['question_id'];
    $teacherResponse = $_POST['answer_' . $questionId]; // Get the teacher's response based on the question ID

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

    // Prepare SQL statement to update the correct_answer field in the questions table
    $sql = "UPDATE question_inquiry SET correct_answer = '$teacherResponse' WHERE question_id = $questionId";

    // Execute SQL statement
    if (mysqli_query($conn, $sql)) {
        // Redirect back to the previous file
        header("Location: student_inquiries.php?success=1");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
