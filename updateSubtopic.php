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

// Get the new subtopic name from the POST request
$newSubtopic = isset($_POST['subtopic']) ? $_POST['subtopic'] : '';
echo $newSubtopic;

// TODO: Validate and sanitize input as needed

// Get the subject and class from the query parameters
$subject = isset($_GET['subject']) ? $_GET['subject'] : '';
$class = isset($_GET['class']) ? $_GET['class'] : '';

// Update the subtopic in the database
$sql = "UPDATE notes SET subtopic = '$newSubtopic' WHERE subject = '$subject' AND class = '$class'";

if (mysqli_query($conn, $sql)) {
    echo "Subtopic updated successfully";
} else {
    echo "Error updating subtopic: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
