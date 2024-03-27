<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Subtopics</title>
    <style>
    .card {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin: 10px;
        width: 200px;
        text-align: center;
        height: fit-content;
        cursor: pointer;
    }

    .plus-icon {
        font-size: 24px;
        margin-left: 10px;
        cursor: pointer;
    }

    .subtopic {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin: 10px;
        width: 200px;
        text-align: center;
        display: inline-block;
        cursor: pointer; /* Add cursor pointer for better UX */
        position: relative; /* Required for positioning the popup menu */
    }

    .form-popup {
        display: none;
        position: fixed;
        z-index: 9;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4); /* Black with opacity */
    }

    /* Style the form inside the modal */
    .form-container {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* Close button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .subtopic-options {
        display: none; /* Hide the popup menu by default */
        position: absolute;
        top: calc(100% + 10px); /* Position it below the subtopic card */
        left: 0;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        z-index: 1; /* Ensure it appears above other elements */
        font-size: 16px; /* Larger font size */
        min-width: 150px; /* Minimum width */
        text-align: center; /* Center text */
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); /* Add shadow */
    }

    .subtopic-options span {
        display: block;
        margin-bottom: 5px; /* Add spacing between options */
        cursor: pointer;
    }


    .editable {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 8px;
        margin-bottom: 8px;
        
    }
 

    .save-button {
        display: none;
        margin-top: 8px;
    }
    </style>
</head>
<body>
  
    <h1>Subtopics</h1>
    <h2><?php echo isset($_GET['subject']) ? $_GET['subject'] : 'Subject Name'; ?></h2>
    <h3><?php echo isset($_GET['class']) ? $_GET['class'] : 'Class'; ?></h3>

    <div class="container">
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

        // Get the subject and class from the query parameters
        $subject = isset($_GET['subject']) ? $_GET['subject'] : '';
        $class = isset($_GET['class']) ? $_GET['class'] : '';

        // SQL query to retrieve subtopics for the selected subject and class
        $sql = "SELECT subtopic FROM notes WHERE subject = '$subject' AND class = '$class'";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row of data
            while ($row = mysqli_fetch_assoc($result)) {
                // Display each subtopic as a card with a link to view notes
                echo '<a href="view_notes.php?subject=' . urlencode($subject) . '&class=' . urlencode($class) . '&subtopic=' . urlencode($row["subtopic"]) . '">';
                
                echo '<div class="subtopic">';
                echo '<span class="editable">' . $row["subtopic"] . '</span>';
                // Popup menu for subtopic options
                echo '<div class="subtopic-options">';
                echo '<span class="rename">Rename</span>';
                echo '<br>';
                echo '<span>Delete</span>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
            }
        } else {
            echo "No subtopics found for this class.";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
    <div class="card" onclick="openForm()">
        <p>Add New Topic</p>
    </div>
    <!-- Form to create a new test -->
    <div id="createForm" class="form-popup">
        <div class="form-container">
            <span class="close" onclick="closeForm()">&times;</span>
            <form action="addNewTopic.php" method="get">
                <label for="subtopicName">Subtopic Name:</label><br>
                <input type="text" id="subtopicName" name="subtopic"><br>
                <!-- Assign the value of class from the GET request -->
                <input type="hidden" id="class" name="class" value="<?php echo isset($_GET['class']) ? $_GET['class'] : ''; ?>">
                <!-- Assign the value of subject from the GET request -->
                <input type="hidden" id="subject" name="subject" value="<?php echo isset($_GET['subject']) ? $_GET['subject'] : ''; ?>">
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <script>
        // Function to open the form dialog
        function openForm() {
            document.getElementById("createForm").style.display = "block";
        }

        // Function to close the form dialog
        function closeForm() {
            document.getElementById("createForm").style.display = "none";
        }

        function showOptions(event) {
            // Prevent the default context menu from appearing
            event.preventDefault();

            // Hide any previously displayed subtopic options
            hideAllOptions();

            // Show the options for the right-clicked subtopic
            const options = event.currentTarget.querySelector('.subtopic-options');
            if (options) {
                options.style.display = "block";
            }
        }

        // Function to hide all subtopic options
        function hideAllOptions() {
            const allOptions = document.querySelectorAll('.subtopic-options');
            allOptions.forEach(option => {
                option.style.display = "none";
            });
        }

        // Function to handle renaming of subtopic
        // Function to handle renaming of subtopic
// Function to handle renaming of subtopic
// Function to handle renaming of subtopic
function renameSubtopic(event) {
    event.preventDefault(); // Prevent default behavior

    const subtopic = event.target.closest('.subtopic');
    const editableSpan = subtopic.querySelector('.editable');
    const renameSpan = event.target.closest('.rename');

    if (editableSpan && renameSpan) {
        const currentName = editableSpan.textContent;
        const inputField = document.createElement('input');
        inputField.setAttribute('type', 'text');
        inputField.setAttribute('value', currentName);
        inputField.classList.add('editable-input');

        // Replace the span with the input field
        subtopic.replaceChild(inputField, editableSpan);

        // Change the Rename button to Save button

        // Add event listener for save button
        renameSpan.addEventListener('click', saveSubtopic);

        // Add event listener for blur event on input field
        inputField.addEventListener('blur', function() {
            // Replace input field with editable span
            subtopic.replaceChild(editableSpan, inputField);
            renameSpan.textContent = "Rename";
            renameSpan.classList.remove('save-button');
            renameSpan.classList.add('rename');
        });
    }
}

// Function to handle saving the subtopic
function saveSubtopic(event) {
    event.stopPropagation(); // Prevent click event from bubbling up

    const subtopic = event.target.closest('.subtopic');
    const editableSpan = subtopic.querySelector('.editable');
    const renameSpan = event.target.closest('.rename');
    const inputField = subtopic.querySelector('.editable-input');

    // Get the new name from input field
    const newName = inputField.value;

    // Update the UI
    subtopic.replaceChild(editableSpan, inputField);
    editableSpan.textContent = newName;
    renameSpan.textContent = "Rename";
    renameSpan.classList.remove('save-button');
    renameSpan.classList.add('rename');

    // TODO: Implement logic to update the subtopic name in the database
        // Get the new name from input field

// Send AJAX request to update the subtopic
const xhr = new XMLHttpRequest();
xhr.open("POST", "updateSubtopic.php", true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
            // Update the UI
            subtopic.replaceChild(editableSpan, inputField);
            editableSpan.textContent = newName;
            renameSpan.textContent = "Rename";
            renameSpan.classList.remove('save-button');
            renameSpan.classList.add('rename');
        } else {
            // Handle error
            console.error('Error:', xhr.status);
        }
    }
};
xhr.send("subtopic=" + encodeURIComponent(newName));
}


        // Add event listeners for right-click on subtopic cards
        const subtopics = document.querySelectorAll('.subtopic');
        subtopics.forEach(subtopic => {
            subtopic.addEventListener('contextmenu', showOptions);
        });

        // Add event listener for renaming subtopic
        const renameOptions = document.querySelectorAll('.rename');
        renameOptions.forEach(option => {
            option.addEventListener('click', renameSubtopic);
        });

        // Close all subtopic options when clicking outside
        window.addEventListener('click', function(event) {
            if (!event.target.closest('.subtopic')) {
                hideAllOptions();
            }
        });
    </script>
</body>
</html>
