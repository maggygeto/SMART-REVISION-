<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Streams</title>
    <style>
        .note-stream {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            width: 200px;
            text-align: center;
            display: inline-block;
            cursor: pointer; /* Add cursor style to indicate clickable */
        }
    </style>
</head>
<body>
    <h1>Notes Streams</h1>
    <h2><?php echo isset($_GET['subject']) ? $_GET['subject'] : 'Subject Name'; ?></h2>

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

        // Get the subject from the query parameter
        $subject = isset($_GET['subject']) ? $_GET['subject'] : '';

        // SQL query to retrieve notes streams for the selected subject
        $sql = "SELECT DISTINCT class FROM notes WHERE subject = '$subject'";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row of data
            while ($row = mysqli_fetch_assoc($result)) {
                // Display each note stream as a card with a link to view subtopics
                echo '<a href="view_subtopics.php?subject=' . urlencode($subject) . '&class=' . urlencode($row["class"]) . '">';
                echo '<div class="note-stream">' . $row["class"] . '</div>';
                echo '</a>';
            }
        } else {
            echo "No notes streams found for this subject.";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
