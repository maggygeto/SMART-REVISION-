<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Question</title>
    <style>
        .container{
            display: flex;
            justify-content: space-between;
            width: 80%;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="first-part">
    <h1>Post a Question</h1>
    <form method="post" action="process_question.php">
        <label for="question">Your Question:</label><br>
        <textarea id="question" name="question" rows="5" cols="50" required></textarea><br><br>
        <button type="submit">Post Question</button>
    </form>
    </div>
    <div class="second-part">
    <?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['stud_id'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

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

// Check if the form for updating question is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_question'])) {
    $question_id = $_POST['question_id'];
    $updated_question = $_POST['updated_question'];

    // Update the question in the database
    $sql_update = "UPDATE question_inquiry SET question='$updated_question' WHERE question_id='$question_id'";
    if (mysqli_query($conn, $sql_update)) {
        echo "<p style='color: green;'>Question updated successfully.</p>";
    } else {
        echo "<p style='color: red;'>Error updating question: " . mysqli_error($conn) . "</p>";
    }
}

// Fetch questions for the logged-in user
$user_id = $_SESSION['student_id'];
$sql = "SELECT * FROM question_inquiry WHERE student_id = '$user_id'";
$result = mysqli_query($conn, $sql);

// Check if there are any questions
if (mysqli_num_rows($result) > 0) {
    // Output questions and answer fields
    echo "<h2 style='text-align:center;'>Past Inquiries</h2>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='question' style='position:relative;'>";
        echo "<div class='quest'>";
        echo "<div class='closure' style='position:relative;'>";
        echo "<form method='post' action='".$_SERVER["PHP_SELF"]."'>";
        echo "<textarea class='quiz'  style='resize:none; position:relative;padding-top: 30px;padding-left:10px; margin-top:10px; z-index:1;' rows='5' cols='50' name='updated_question'>" . $row['question'] . "</textarea>";
        echo "<p style='position:absolute; top:0px; left:10px;z-index:4;'>Question:</p>";
        echo "<input type='hidden' name='question_id' value='".$row['question_id']."'>";
        
        echo "</div>";
        echo "</div>";
        echo "<div class='response' style='position:relative;margin-top:-50px; margin-left:50px;'> ";
        echo "<div class='closure' style='position:relative;'>";
       
        if (!empty($row['correct_answer'])) {
            echo "<textarea class='response-textarea' style='resize:none; position:relative;padding-top: 40px;padding-left:10px; margin-top:10px;z-index:0;' rows='5' cols='50' readonly>" . $row['correct_answer'] . "</textarea>";
            echo "<h3 style='position:absolute; top:0px; left:10px;z-index:0;'>Teachers Response:</h3>";
            echo "</div>";
        } else {
            echo "<p style='margin-top:60px;'>No correct answer provided yet.</p>";
        }
       
        echo "<button style='margin-inline:auto;' type='submit' name='update_question'>Update</button>";
        echo "</form>";
        echo "</div>";
        echo "<br><br>";
    }
} else {
    echo "No questions found for the logged-in user.";
}

// Close the database connection
mysqli_close($conn);
?>

        <script>
    document.querySelectorAll('.quiz').forEach(function(el) {
        el.addEventListener('click', function() {
            // Toggle z-index to bring the clicked element to the front
            if (this.style.zIndex === '0' || this.style.zIndex === '') {
                this.style.zIndex = '1';
            } else {
                this.style.zIndex = '0';
            }
        });
    });
</script>

</script>


    </div>
    </div>
</body>
</html>
