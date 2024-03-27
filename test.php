<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <style>
        .question-form {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
        }
        .option-field {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<?php
// Start session
session_start();

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
$totalQuestions = 0;
$correctAnswers = 0;
$questionNumber = 1; // Counter for question numbers
// Check if the session ID is set
if (isset($_SESSION['student_id']) && isset($_GET['test_name'])) {
    $student_id = $_SESSION['student_id'];
    $test_name = $_GET['test_name']; // Fetch the test name from the URL parameter

    // SQL query to fetch user responses for the logged-in student with the specific test name
    $sql = "SELECT user_responses.*, questions.is_structured, questions.option1, questions.option2, questions.option3, questions.option4, questions.correct_answer AS question_correct_answer, user_responses.correct_answer AS user_response_correct_answer
            FROM user_responses 
            INNER JOIN questions ON user_responses.question_text = questions.question_text 
            WHERE user_responses.student_Adm_no = '$student_id' AND user_responses.test_name = '$test_name'"; // Adjusted query to include test_name condition
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Output user responses
        echo '<h1>User Responses for Test: ' . htmlspecialchars($test_name) . '</h1>';
        $questionNumber = 1; // Counter for question numbers
        while ($row = mysqli_fetch_assoc($result)) {
            
            echo '<form class="question-form" action="insert_user_responses.php" method="post">';
            echo '<label><h2>Question ' . $questionNumber . ':</h2></label><br>';
            echo '<label for="question">' . htmlspecialchars($row['question_text']) . '</label><br>';
            echo '<textarea id="question" name="question_text" rows="4" cols="50" style="resize:none;" readonly>' . htmlspecialchars($row['question_text']) . '</textarea><br>';
            echo '<input type="hidden" name="test_name" value="' . htmlspecialchars($row['test_name']) . '">';

            // Check if the question is structured or non-structured
            if (isset($row['is_structured']) && $row['is_structured'] == 1) {
                // Structured question
                echo '<label for="answer">Correct Answer:</label><br>';
                echo '<input type="text" id="answer" name="correct_answer" value="' . htmlspecialchars($row['correct_answer']) . '" readonly><br>';
            } else {
                // Non-structured question
                echo '<label for="option1">' . htmlspecialchars($row['option1']) . '</label><br>';
                echo '<input type="text" id="option1" name="option1" value="' . htmlspecialchars($row['option1']) . '" readonly><br>';
                echo '<label for="option2">' . htmlspecialchars($row['option2']) . '</label><br>';
                echo '<input type="text" id="option2" name="option2" value="' . htmlspecialchars($row['option2']) . '" readonly><br>';
                echo '<label for="option3">' . htmlspecialchars($row['option3']) . '</label><br>';
                echo '<input type="text" id="option3" name="option3" value="' . htmlspecialchars($row['option3']) . '" readonly><br>';
                echo '<label for="option4">' . htmlspecialchars($row['option4']) . '</label><br>';
                echo '<input type="text" id="option4" name="option4" value="' . htmlspecialchars($row['option4']) . '" readonly><br>';
                // Correct answer for non-structured question
                echo '<label for="answer">Correct Answer:</label><br>';
                echo '<input type="text" id="answer" name="correct_answer" value="' . htmlspecialchars($row['correct_answer']) . '" readonly><br>';
            }
            // Compare user response with correct answer and highlight if correct or wrong
            $userResponse = $row['user_response_correct_answer'];

            if ($row['is_structured'] == 1) {
                // Structured question
                $correctAnswer = $row['question_correct_answer'];
            } else {
                // Non-structured question
                $correctAnswer = $row[$row['question_correct_answer']];
            }
            
            if ($userResponse == $correctAnswer) {
                echo '<p style="color: green;">Your answer is correct!</p>';
                $correctAnswers++; // Increment correct answers count
            } else {
                echo '<p style="color: red;">Your answer is wrong!</p>';
                echo '<p>The correct answer is: ' . htmlspecialchars($correctAnswer) . '</p>';
            }
            
            $totalQuestions++; // Increment total questions count
            
            
            
            echo '<button type="submit">Submit</button>';
            echo '</form>';
            $questionNumber++; // Increment question number
        }
    } 
} else {
    echo "Session ID or test name not set.";
}
// Calculate overall score
if ($totalQuestions > 0) {
    $overallScore = ($correctAnswers / $totalQuestions) * 100;
    // Display overall score
    $_SESSION['overall_score'] = round($overallScore, 2);
    } 
    
    ?>

<?php
// Check if the test_name parameter is set in the URL
if (isset($_GET['test_name'])) {
    $test_name = $_GET['test_name'];

    // SQL query to fetch total questions count for the selected test from the questions table
    $totalQuestionsQuery = "SELECT COUNT(*) AS total_questions FROM questions WHERE test_name = '$test_name'";
    $totalQuestionsResult = mysqli_query($conn, $totalQuestionsQuery);
    $totalQuestionsRow = mysqli_fetch_assoc($totalQuestionsResult);
    $totalQuestions = $totalQuestionsRow['total_questions'];

    // SQL query to fetch total answered questions count for the selected test from the user_responses table
    $answeredQuestionsQuery = "SELECT COUNT(DISTINCT question_text) AS answered_questions FROM user_responses WHERE test_name = '$test_name'";
    $answeredQuestionsResult = mysqli_query($conn, $answeredQuestionsQuery);
    $answeredQuestionsRow = mysqli_fetch_assoc($answeredQuestionsResult);
    $answeredQuestions = $answeredQuestionsRow['answered_questions'];

    // Check if all questions are answered
    if ($totalQuestions == $answeredQuestions && $totalQuestions > 0) {
        // All questions are answered, display the "Submit All Questions" button
        echo '<form action="pastpapers.php" method="get">';
        echo '<input type="hidden" name="test_name" value="' . htmlspecialchars($_GET['test_name']) . '">';
        echo '<input type="hidden" name="overall_score" value="' . htmlspecialchars($overallScore) . '">';
        echo '<button type="submit">Submit All Questions</button>';
        echo '</form>';
    } 
} else {
    echo "Test name not provided.";
}

// Close the database connection
mysqli_close($conn);
?>







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

// Check if the test_name parameter is set in the URL
if (isset($_GET['test_name'])) {
    $test_name = $_GET['test_name'];

    // SQL query to fetch questions for the selected test
    $sql = "SELECT * FROM questions WHERE test_name = '$test_name' AND question_text NOT IN (SELECT question_text FROM user_responses WHERE student_Adm_no = '$student_id' AND test_name = '$test_name')";mysqli_real_escape_string($conn, $test_name) . "'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<form class="question-form" action="insert_user_responses.php" method="post">';
            echo '<label><h2>Question ' . $questionNumber . ':</h2></label><br>';
            echo '<textarea name="question_text" rows="4" cols="50" style="resize:none;" required>' . htmlspecialchars($row['question_text']) . '</textarea><br>';
            echo '<input type="hidden" id="test-name-hidden" name="test_name" value="'.htmlspecialchars($row['test_name']).'">';
            if ($row['is_structured'] == 1) {
                // Structured question
                echo '<label>Correct Answer:</label><br>';
                echo '<input type="text" name="correct_answer" required><br>'; // Empty value for correct answer field
                echo "<br>";
                echo "<input type='submit' value='Submit'>";
            } else {
                // Multiple choice question
                for ($i = 1; $i <= 4; $i++) {
                    echo '<div class="option-field">';
                    echo '<label for="option' . $i . '_' . $row['id'] . '">Option ' . $i . ':</label><br>';
                    echo '<input type="text" id="option' . $i . '_' . $row['id'] . '" name="option' . $i . '_' . $row['id'] . '" value="' . htmlspecialchars($row['option'.$i]) . '" ><br>';
                    echo '</div>';
                }
                // Correct answer dropdown
                echo '<label>Correct Answer:</label><br>';
                echo '<input type="text" name="correct_answer"
                required><br>'; // Empty value for correct answer field
                echo "<br>";
                echo "<input type='submit' value='Submit'>";
            }
            echo '</form>';
            $questionNumber++; // Increment question number
        }
    } 
} else {
    echo "Test name not provided.";
}

// Close the database connection
mysqli_close($conn);
?>

</body>
</html>
