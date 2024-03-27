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

// Retrieve subtopic data from the form submission
$subtopic = isset($_GET['subtopic']) ? $_GET['subtopic'] : '';

// Retrieve subject and class from the query parameters
$subject = isset($_GET['subject']) ? $_GET['subject'] : '';
$class = isset($_GET['class']) ? $_GET['class'] : '';

// Prepare SQL statement to insert the new subtopic into the notes table
$sql = "INSERT INTO notes (subject, class, subtopic) VALUES ('$subject', '$class', '$subtopic')";

// Execute the SQL statement
if (mysqli_query($conn, $sql)) {
    // Redirect back to the previous page after successful insertion
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

