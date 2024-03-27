<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examination Interface</title>
    <style>
        .exam-interface {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .option-field {
            margin-bottom: 10px;
        }

        #correct-answer-text {
            display: none;
        }

        #add-question-btn {
            margin-top: 20px;
        }

        .question-form {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 10px;
        }
    </style>
</head>
<body>

<div class="exam-interface">
    <h1>Examination Interface - Add Questions</h1>

    <!-- Form for specifying the test name -->
    <label for="test-name">Name of the Test:</label>
    <input type="text" value='<?php echo isset($_GET["test_name"]) ? htmlspecialchars($_GET["test_name"]) : ""; ?>'><!-- New filter button -->
</form>
     <!-- PHP section for fetching filled questions from the database -->

     <?php
    
    $questionNumber = 1;
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

if (isset($_GET['test_name'])) { // Check if the test name is provided in the URL
    // Get the test name from the URL
    $testName = $_GET['test_name'];

    // Fetch questions based on the test name
    $sql = "SELECT * FROM questions WHERE test_name = '$testName'";
    $result = mysqli_query($conn, $sql);
    // Display the questions
    if (mysqli_num_rows($result) > 0) {
        
        while ($row = mysqli_fetch_assoc($result)) {
            // Display each question
            echo '<form class="question-form" id="' . $questionNumber . '" action="update_question.php" method="post">';

            echo '<label for="question_' . $row['id'] . '"><h2>Question ' . $questionNumber . ':</h2></label><br>';
            echo '<textarea id="question_' . $row['id'] . '" name="question_' . $row['id'] . '" rows="4" cols="50" style="resize:none;" required>' . htmlspecialchars($row['question_text']) . '</textarea><br>';
            echo '<input type="hidden" name="test-name-hidden" value="' . $testName . '">';
            echo '<input type="hidden" name="structured" value="' . $row['is_structured'] . '">';
            echo '<input type="hidden" name="questionNumber" value="' . $questionNumber . '">';

            // Display options or correct answer based on the question type
            if ($row['is_structured'] == 1) {
                // Structured question
                echo '<div id="correct-answer-text_' . $row['id'] . '">';
                echo '<label for="correct-answer-text_' . $row['id'] . '">Correct Answer:</label><br>';
                echo '<input type="text" id="correct-answer-text_' . $row['id'] . '" name="correct-answer" value="' . htmlspecialchars($row['correct_answer']) . '" ><br>';
                echo '</div>';
                echo '</br>';
            } else {
                // Non-structured question
                echo '<div id="options_correct_answer_' . $row['id'] . '">';
                for ($i = 1; $i <= 4; $i++) {
                    echo '<div class="option-field">';
                    echo '<label for="option' . $i . '_' . $row['id'] . '">Option ' . $i . ':</label><br>';
                    echo '<input type="text" id="option' . $i . '_' . $row['id'] . '" name="option'. $i .'" value="' . htmlspecialchars($row['option'.$i]) . '" ><br>';
                    echo '</div>';
                }
                echo '</div>';

                // Display the correct answer field
                echo '<div id="correct-answer-text_' . $row['id'] . '">';
                echo '<label for="correct-answer-text_' . $row['id'] . '">Correct Answer:</label><br>';
                echo '<select id="correct-answer-text_' . $row['id'] . '" name="correct-answer">';
                echo '<option value="option1"' . ($row['correct_answer'] === 'option1' ? ' selected' : '') . '>Option 1</option>';
                echo '<option value="option2"' . ($row['correct_answer'] === 'option2' ? ' selected' : '') . '>Option 2</option>';
                echo '<option value="option3"' . ($row['correct_answer'] === 'option3' ? ' selected' : '') . '>Option 3</option>';
                echo '<option value="option4"' . ($row['correct_answer'] === 'option4' ? ' selected' : '') . '>Option 4</option>';
                echo '</select>';

                echo '<input type="text" id="correct-answer-text_' . $row['id'] . '" name="correct-answer-text" value="' . htmlspecialchars($row[$row['correct_answer']]) . '"><br>';

                echo '</div>';
                echo '</br>';
            }
 

            // Add submit button
            echo '<input type="submit" value="submit question">';
            echo '&nbsp;';
            echo '<button class="delete-btn" onclick="deleteQuestion(' . $row['id'] . ', \'' . $testName . '\')">Delete</button>';
            echo '</form>';
            
            $questionNumber++; 
        }
    } else {
        echo "No questions found for the specified test name.";
    }
}

// Close the database connection
mysqli_close($conn);
?>






        
    
<form id="<?php echo $questionNumber;?>" method="Post" action="add_question.php">
    <label for="question_<?php echo $questionNumber; ?>"><h2>Question <?php echo $questionNumber; ?>:</h2></label><br>
    <textarea id="question_<?php echo $questionNumber; ?>" name="question_1" rows="4" cols="50" style="resize:none;" required></textarea><br>

    <input type="hidden" name="test-name-hidden" value='<?php echo isset($_GET["test_name"]) ? htmlspecialchars($_GET["test_name"]) : "";?>'/>

    <input type="hidden" name="questionNumber" value="<?php echo $questionNumber; ?>">


    <input type="checkbox" id="structured_<?php echo $questionNumber; ?>" name="structured_1" onclick="toggleOptions(<?php echo $questionNumber; ?>)">
    <label for="structured_<?php echo $questionNumber; ?>">Structured Question</label><br><br>

    <div id="options_correct_answer_<?php echo $questionNumber; ?>">
        <div class="option-field">
            <label for="option1_<?php echo $questionNumber; ?>">Option 1:</label><br>
            <input type="text" id="option1_<?php echo $questionNumber; ?>" name="option1" ><br>
        </div>
        <div class="option-field">
            <label for="option2_<?php echo $questionNumber; ?>">Option 2:</label><br>
            <input type="text" id="option2_<?php echo $questionNumber; ?>" name="option2" ><br>
        </div>
        <div class="option-field">
            <label for="option3_<?php echo $questionNumber; ?>">Option 3:</label><br>
            <input type="text" id="option3_<?php echo $questionNumber; ?>" name="option3" ><br>
        </div>
        <div class="option-field">
            <label for="option4_<?php echo $questionNumber; ?>">Option 4:</label><br>
            <input type="text" id="option4_<?php echo $questionNumber; ?>" name="option4" ><br>
        </div>
    </div>

    <div id="correct-answer-text_<?php echo $questionNumber; ?>" style="display: none;">
        <label for="correct-answer-text_<?php echo $questionNumber; ?>">Correct Answer:</label><br>
        <input type="text" id="correct-answer-text_<?php echo $questionNumber; ?>" name="correct-answer-text" ><br>
    </div>

    <div class="opt-tag" id="opt-tag_<?php echo $questionNumber; ?>" style="display: block;">
        <label for="correct-answer_<?php echo $questionNumber; ?>">Correct Answer:</label><br>
        <select id="correct-answer_<?php echo $questionNumber; ?>" name="correct-answer">
            <option></option>
            <option>option1</option>
            <option>option2</option>
            <option>option3</option>
            <option>option4</option>
        </select>
    </div> <br>

    <input type="submit" value="submit question">

</form>
    <script>
    function deleteQuestion(questionId, testName) {
        if (confirm("Are you sure you want to delete this question?")) {
            // Send a GET request to delete_question.php with question ID and test name as parameters
            window.location.href = 'delete_question.php?question_id=' + questionId + '&test_name=' + testName;
        }
    }
          // Function to save test name to local storage and update hidden input field
    function saveTestName() {
        var testName = document.getElementById('test-name').value;
        localStorage.setItem('testName', testName);
        // Update hidden input field inside the question form container
        document.getElementById('test-name-hidden').value = testName;
        document.getElementById('test-name').value = testName;
    }

    // Function to load test name from local storage
    function loadTestName() {
        var testName = localStorage.getItem('testName');
        if (testName) {
            document.getElementById('test-name').value = testName;
            // Update hidden input field inside the question form container
            document.getElementById('test-name-hidden').value = testName;
        }
    }

    // Add event listener to load test name when the page loads
    window.addEventListener('load', function () {
        loadTestName();
    });

    // Add event listener to save test name when the test name input field is changed
    document.getElementById('test-name').addEventListener('input', function () {
        saveTestName();
    });
        // Add event listener to set the value of the test name field before submission
        submitButton.addEventListener('click', function() {
            var testName = document.getElementById('test-name').value;
            document.getElementById('test-name-hidden').value = testName;

        });

       
    function toggleOptions(formIndex) {
        var checkbox = document.getElementById('structured_' + formIndex);
        var optionsCorrectAnswerDiv = document.getElementById('options_correct_answer_' + formIndex);
        var correctAnswerTextDiv = document.getElementById('correct-answer-text_' + formIndex);
        var optTagDiv = document.getElementById('opt-tag_' + formIndex);
        var questionTextarea = document.getElementById('question_' + formIndex);

        if (checkbox.checked) {
            optionsCorrectAnswerDiv.style.display = 'none';
            correctAnswerTextDiv.style.display = 'block';
            optTagDiv.style.display = 'none';

            // Clear all option input fields except the textarea
            var optionInputs = optionsCorrectAnswerDiv.querySelectorAll('input[type="text"]');
            for (var i = 0; i < optionInputs.length; i++) {
                optionInputs[i].value = '';
            }
        } else {
            optionsCorrectAnswerDiv.style.display = 'block';
            correctAnswerTextDiv.style.display = 'none';
            optTagDiv.style.display = 'block';

            // Clear the correct answer text input
            var correctAnswerTextInput = correctAnswerTextDiv.querySelector('input[type="text"]');
            correctAnswerTextInput.value = '';
        }
    }



     function addQuestionForm(numForms) {
    var container = document.getElementById('question-forms-container');
    var form = document.createElement('form');
    form.classList.add('question-form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', 'add_question.php'); // Specify the PHP script for form submission
    var brake = document.createElement('br');
    var brake2 = document.createElement('br');
    var brake3 = document.createElement('br');
    var brake4 = document.createElement('br');
    var brake5 = document.createElement('br');
    var brake6 = document.createElement('br');

    // Create a hidden input field to store the value of the test name
    var testNameInput = document.createElement('input');
    testNameInput.type = 'hidden';
    testNameInput.setAttribute('id', 'test-name-hidden_' + numForms); // Unique ID for each hidden input field
    testNameInput.setAttribute('name', 'test-name-hidden_' + numForms);
    form.appendChild(testNameInput);

    var questionLabel = document.createElement('label');
    questionLabel.innerHTML = '<h2>Question ' + numForms + ':</h2>';
    form.appendChild(questionLabel);

    var questionTextarea = document.createElement('textarea');
    var brake1 = document.createElement('br');
    questionTextarea.setAttribute('id', 'question_' + numForms);
    questionTextarea.setAttribute('name', 'question_' + numForms);
    questionTextarea.setAttribute('rows', '4');
    questionTextarea.setAttribute('cols', '50');
    questionTextarea.style.resize = 'none';
    form.appendChild(questionTextarea);
    form.appendChild(brake);

    var structuredCheckbox = document.createElement('input');
    structuredCheckbox.type = 'checkbox';
    structuredCheckbox.setAttribute('id', 'structured_' + numForms);
    structuredCheckbox.setAttribute('name', 'structured_' + numForms);
    structuredCheckbox.setAttribute('onclick', 'toggleOptions(' + numForms + ')');
    form.appendChild(structuredCheckbox);


    var structuredLabel = document.createElement('label');
    structuredLabel.setAttribute('for', 'structured_' + numForms);
    structuredLabel.innerHTML = 'Structured Question';
    form.appendChild(structuredLabel);
    form.appendChild(brake1);
    form.appendChild(brake2);


    var optionsCorrectAnswerDiv = document.createElement('div');
    optionsCorrectAnswerDiv.setAttribute('id', 'options_correct_answer_' + numForms);
    optionsCorrectAnswerDiv.classList.add('options-container');
    for (var j = 1; j <= 4; j++) {
        var optionFieldDiv = document.createElement('div');
        optionFieldDiv.classList.add('option-field');

        var optionLabel = document.createElement('label');
        optionLabel.setAttribute('for', 'option' + j + '_' + numForms);
        optionLabel.innerHTML = 'Option ' + j + ':' +'</br>';
        optionFieldDiv.appendChild(optionLabel);

        var optionInput = document.createElement('input');
        optionInput.type = 'text';
        optionInput.setAttribute('id', 'option' + j + '_' + numForms);
        optionInput.setAttribute('name', 'option' + j + '_' + numForms);
        optionFieldDiv.appendChild(optionInput);

        optionsCorrectAnswerDiv.appendChild(optionFieldDiv);

    }
    form.appendChild(optionsCorrectAnswerDiv);


    var correctAnswerTextDiv = document.createElement('div');
    correctAnswerTextDiv.setAttribute('id', 'correct-answer-text_' + numForms);
    correctAnswerTextDiv.style.display = 'none'; // Initially hide correct answer text input
    correctAnswerTextDiv.classList.add('correct-answer-container');
    var correctAnswerTextLabel = document.createElement('label');
    correctAnswerTextLabel.setAttribute('for', 'correct-answer-text_' + numForms);
    correctAnswerTextLabel.innerHTML = 'Correct Answer:' + '</br>';
    correctAnswerTextDiv.appendChild(correctAnswerTextLabel);
    var correctAnswerTextInput = document.createElement('input');
    correctAnswerTextInput.type = 'text';
    correctAnswerTextInput.setAttribute('id', 'correct-answer-text_' + numForms);
    correctAnswerTextInput.setAttribute('name', 'correct-answer-text_' + numForms);
    correctAnswerTextDiv.appendChild(correctAnswerTextInput);
    form.appendChild(correctAnswerTextDiv);


    var optTagDiv = document.createElement('div');
    optTagDiv.classList.add('opt-tag');
    optTagDiv.setAttribute('id', 'opt-tag_' + numForms);
    var correctAnswerSelectLabel = document.createElement('label');
    correctAnswerSelectLabel.setAttribute('for', 'correct-answer_' + numForms);
    correctAnswerSelectLabel.innerHTML = 'Correct Answer:' + '</br>';
    optTagDiv.appendChild(correctAnswerSelectLabel);
    var correctAnswerSelect = document.createElement('select');
    correctAnswerSelect.setAttribute('id', 'correct-answer_' + numForms);
    correctAnswerSelect.setAttribute('name', 'correct-answer_' + numForms);
    for (var k = 1; k <= 4; k++) {
        var option = document.createElement('option');
        option.value = 'option' + k + '_' + numForms;
        option.innerHTML = 'Option ' + k;
        correctAnswerSelect.appendChild(option);
    }
    optTagDiv.appendChild(correctAnswerSelect);
    form.appendChild(optTagDiv);
    form.appendChild(brake6);

    // Add a submit button instead of a regular button
    var submitButton = document.createElement('input');
    submitButton.type = 'submit'; // Set the input type to submit
    submitButton.classList.add('submit-question-btn');
    submitButton.value = 'Submit Question';

    // Add event listener to set the value of the test name field before submission
    submitButton.addEventListener('click', function() {
        var testName = document.getElementById('test-name').value;
        document.getElementById('test-name-hidden').value = testName;
    });

    form.appendChild(submitButton);

    // Add an "Add Question" button
    var addButton = document.createElement('button');
    addButton.type = 'button'; // Set the button type
    addButton.classList.add('add-question-btn');
    addButton.innerHTML = 'Add Question';
    addButton.addEventListener('click', function() {
        addQuestionForm(numForms + 1); // Increase the form index for the next question
    });
    form.appendChild(addButton);

    container.appendChild(form);
}
</script>

</div>

</body>
</html>
