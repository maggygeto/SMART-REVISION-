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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $subject = $_POST['subject'];
    $class = $_POST['class'];
    $subtopic = $_POST['subtopic'];
    $description = $_POST['drafted_notes'];
    
    // Loop through the drafted notes
   
            
            // Update the notes in the database
            $sql = "UPDATE notes SET description='$description' WHERE subject='$subject' AND class='$class' AND subtopic='$subtopic'";
            
            if (mysqli_query($conn, $sql)) {
                echo "Note updated successfully.";
            } else {
                echo "Error updating note: " . mysqli_error($conn);
            }
        
    }


// Close the database connection
mysqli_close($conn);
?>
