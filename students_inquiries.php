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
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<p style='color: green;'>Teacher's response submitted successfully.</p>";
}
// Query to fetch questions from the database
$sql = "SELECT * FROM question_inquiry";
$result = mysqli_query($conn, $sql);

// Check if there are any questions
if (mysqli_num_rows($result) > 0) {
    // Output questions and answer fields
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<h2>Question:</h2>";
        echo "<div class='closure' style='position:relative;'>";
        echo "<form method='post' action='process_teacher_response.php'>";
        echo "<textarea style='resize:none; position:relative;padding-top: 20px; rows='5' cols='50' readonly placeholder='Student question' >" . $row['question'] . "</textarea>";
        echo "<label style='position:absolute; top:0; left:10px;'>Student question</label>";
        echo "</div>";
        echo "<br>";
        echo "<br>";
        echo "<div class='comparator' style='position:relative;'>";
        echo "<textarea id='answer_" . $row['question_id'] . "' name='answer_" . $row['question_id'] . "' rows='5' cols='50'  style='position:absolute; width:42.5%; padding-top:20px; resize:none;' required";
        
        // Check if correct_answer is not empty, if so, disable the textarea
        if (!empty($row['correct_answer'])) {
            echo " disabled";
        }
        
        echo ">" . $row['correct_answer'] ."</textarea>";
        echo "<label style='position:absolute; top:0; left:10px;'>Teachers Response</label>";
        echo "</div>";
        echo "</br>";
        echo "<input type='hidden' name='question_id' value='" . $row['question_id'] . "'>";
        echo "</br>";
        echo "</br>";
        echo "</br>";
        echo "</br>";
        echo "</br>";
        echo "<button type='submit'>Submit Answer</button>";
    echo "</form>";
        echo "<br><br>";
    }
} else {
    echo "No questions found.";
}

// Close the database connection
mysqli_close($conn);
?>
