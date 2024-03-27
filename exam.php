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
    </style>
</head>
<body>

<div class="exam-interface">
    <h1>Examination Interface - Add Questions</h1>

    <!-- Dropdown for selecting the number of forms -->
    <form action="" method="POST">
        <label for="test-name">Name of the Test:</label>
        <input type="text" id="test-name" name="test-name"><br><br>
        <label for="num-forms">Number of Question Forms:</label> 
        <select id="num-forms" name="num-forms">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="30">30</option>
        </select>
        <br><br>


         <!-- Hidden input field to store the number of previously added questions -->
        <input type="hidden" id="prev-questions" name="prev-questions" value="<?php echo $prev; ?>">
        <!-- Button to add question forms -->
        <input type="submit" name="submit" value="Add Question Forms"><br><br>
    </form>
    <!-- Container to hold dynamically added question forms -->
    <div id="question-forms-container">
    <?php
    session_start();
    $_SESSION['count'] = 0; 
    $prev = isset($_SESSION['count']) ? intval($_SESSION['count']) : 0;
    if (isset($_POST['submit'])) {
        $numForms = intval($_POST['num-forms']);
        $prev += $numForms; 
        $_SESSION['count'] = $prev;

        // Generate question forms
        $counter = 1;
        for ($i = $prev - $numForms; $i < $prev; $i++) {
            echo "<form class='question-form'>";
            // echo "<h2>Question $counter:</h2><br>";
            echo "<label for='question_$i'><h2>Question $counter:</h2></label><br>";
            echo "<textarea id='question_$i' name='question_$i' rows='4' cols='50' style='resize:none;'></textarea><br>";
            // Increment counter
            $counter++;

            // Checkbox for structured questions
            echo "<input type='checkbox' id='structured_$i' name='structured_$i' onclick='toggleOptions($i)'>";
            echo "<label for='structured_$i'>Structured Question</label><br><br>";

            // Options or Correct Answer (based on the checkbox status)
            echo "<div id='options_correct_answer_$i'>";
            for ($j = 1; $j <= 4; $j++) {
                echo "<div class='option-field'>";
                echo "<label for='option${j}_$i'>Option $j:</label><br>";
                echo "<input type='text' id='option${j}_$i' name='option${j}_$i'><br>";
                echo "</div>";
            }
            echo "</div>";

            // Correct Answer (text)
            echo "<div id='correct-answer-text_$i' style='display: none;'>";
            echo "<label for='correct-answer-text_$i'>Correct Answer:</label><br>";
            echo "<input type='text' id='correct-answer-text_$i' name='correct-answer-text_$i'><br>";
            echo "</div>";

            // Correct Answer (select)
            echo "<div class='opt-tag' id='opt-tag_$i' style='display: block;'>";
            echo "<label for='correct-answer_$i'>Correct Answer:</label><br>";
            echo "<select id='correct-answer_$i' name='correct-answer_$i'>";
            echo "<option value='option1_$i'>Option 1</option>";
            echo "<option value='option2_$i'>Option 2</option>";
            echo "<option value='option3_$i'>Option 3</option>";
            echo "<option value='option4_$i'>Option 4</option>";
            echo "</select><br><br>";
            echo "</div> <br>";

            // Add Question button
            echo "<button type='button' onclick='addQuestionForm(" . ($i + 2) . ")'>Add Question</button>";


            echo "</form>";
        }
    }
    ?>


        <script>
            function toggleOptions(formIndex) {
                var checkbox = document.getElementById('structured_' + formIndex);
                var optionsCorrectAnswerDiv = document.getElementById('options_correct_answer_' + formIndex);
                var correctAnswerTextDiv = document.getElementById('correct-answer-text_' + formIndex);
                var optTagDiv = document.getElementById('opt-tag_' + formIndex);

                if (checkbox.checked) {
                    optionsCorrectAnswerDiv.style.display = 'none';
                    correctAnswerTextDiv.style.display = 'block';
                    optTagDiv.style.display = 'none';
                } else {
                    optionsCorrectAnswerDiv.style.display = 'block';
                    correctAnswerTextDiv.style.display = 'none';
                    optTagDiv.style.display = 'block';
                }
            }
            document.getElementById('num-forms').addEventListener('change', function() {
                var numFormsSelect = document.getElementById('num-forms');
                var selectedNumForms = parseInt(numFormsSelect.value);
                var prevQuestionsInput = document.getElementById('prev-questions');
                prevQuestionsInput.value = selectedNumForms;
            });

            
            function addQuestionForm(numForms) {
                var container = document.getElementById('question-forms-container');
                var form = document.createElement('form');
                form.classList.add('question-form');
                var brake = document.createElement('br');
                var brake2 = document.createElement('br');
                var brake3 = document.createElement('br');
                var brake4 = document.createElement('br');
                var brake5 = document.createElement('br');
                var brake6 = document.createElement('br');
                

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

                var addButton = document.createElement('button');
                addButton.type = 'button';
                addButton.classList.add('add-question-btn');
                addButton.setAttribute('onclick', 'addQuestionForm(' + (numForms + 1) + ')');
                addButton.innerHTML = 'Add Question';
                form.appendChild(addButton);

                container.appendChild(form);
            }


            
        </script>
    </div>
</div>

</body>
</html>
