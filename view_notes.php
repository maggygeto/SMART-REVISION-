<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Notes</title>
    <style>
        .note {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
           
            text-align: center;
            display: inline-block;
        }
        .draft-container {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
        }
        .sideways{
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 90%;
            margin-inline: auto;

        }
    </style>
</head>
<body>
    <div class="sideways">
    <div class="left">
    <h1>Notes</h1>
    <h2><?php echo isset($_GET['subject']) ? $_GET['subject'] : 'Subject Name'; ?></h2>
    <h3><?php echo isset($_GET['class']) ? $_GET['class'] : 'Class'; ?></h3>
    <h4><?php echo isset($_GET['subtopic']) ? $_GET['subtopic'] : 'Subtopic'; ?></h4>

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
 
         // Get the subject, class, and subtopic from the query parameters
         $subject = isset($_GET['subject']) ? $_GET['subject'] : '';
         $class = isset($_GET['class']) ? $_GET['class'] : '';
         $subtopic = isset($_GET['subtopic']) ? $_GET['subtopic'] : '';
 
         // SQL query to retrieve notes for the selected subject, class, and subtopic
         $sql = "SELECT note_id, description FROM notes WHERE subject = '$subject' AND class = '$class' AND subtopic = '$subtopic'";
 
         // Execute the query
         $result = mysqli_query($conn, $sql);
 
         // Check if there are any results
         if (mysqli_num_rows($result) > 0) {
             // Loop through each row of data
             while ($row = mysqli_fetch_assoc($result)) {
                 // Display each note as a card with an editable content area and a save button
                 echo '<div class="note" contenteditable="true" data-note-id="' . $row["note_id"] . '">' . $row["description"] . '</div>';
                 echo "<br>";
                 echo "&nbsp;";
                 echo "&nbsp;";
                 echo '<button class="save-button" data-note-id="' . $row["note_id"] . '">Save</button>';
             }
         } else {
             echo "No notes found for this subtopic.";
         }
 
         // Close the database connection
         mysqli_close($conn);
         ?>
     </div>
     </div>
     <div class="right">
     <!-- Drafted Content Container -->
     <div class="water" style='width:fit-content;'>
     <h3 style='text-align:center'>Drafted Content</h3>
     <form action="updatenotes.php" method="post">
        <input type="hidden" name="subject" value="<?php echo isset($_GET['subject']) ? $_GET['subject'] : ''; ?>">
        <input type="hidden" name="class" value="<?php echo isset($_GET['class']) ? $_GET['class'] : ''; ?>">
        <input type="hidden" name="subtopic" value="<?php echo isset($_GET['subtopic']) ? $_GET['subtopic'] : ''; ?>">

        <div class="draft-container">
            <?php
            // Loop through local storage to display drafted content
            foreach ($_COOKIE as $key => $value) {
                if (strpos($key, 'draft_note_') === 0) {
                    $noteId = substr($key, strlen('draft_note_'));
                    echo '<div class="draft" name="drafted_notes">' . $value . '</div>';

                }
            }
            ?>
        </div>
        &nbsp;
        &nbsp;
        <button type="submit" class="save-button">Save Draft</button>
    </form>
    </div>
    </div>
    </div>
 
    

    <script>
        // Function to load drafted notes from local storage and display them
        function loadDraftedNotes() {
            const draftContainer = document.querySelector('.draft-container');
            draftContainer.innerHTML = ''; // Clear previous content
            
            // Loop through local storage to retrieve drafted notes
            for (let i = 0; i < localStorage.length; i++) {
                const key = localStorage.key(i);
                if (key.startsWith('draft_note_')) {
                    const noteId = key.substring('draft_note_'.length);
                    const noteContent = localStorage.getItem(key);
                    const draftElement = document.createElement('div');
                    draftElement.classList.add('draft');
                    draftElement.textContent = noteContent;
                    draftContainer.appendChild(draftElement);
                }
            }
        }

        // Call the function to load drafted notes when the page loads
        loadDraftedNotes();
        
        // Add event listeners for save buttons
        const saveButtons = document.querySelectorAll('.save-button');
        saveButtons.forEach(button => {
            button.addEventListener('click', saveNote);
        });

        // Function to handle saving the note
        function saveNote(event) {
            const noteId = event.target.getAttribute('data-note-id');
            const noteContent = document.querySelector('.note[data-note-id="' + noteId + '"]').textContent;

            // Save the note content to local storage
            localStorage.setItem('draft_note_' + noteId, noteContent);

            // Update drafted notes display
            loadDraftedNotes();

            // Optionally, you can provide feedback to the user upon successful save
            console.log("Note saved as draft!");
        }
    </script>
</body>
</html>
