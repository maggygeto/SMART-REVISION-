<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            width: 200px;
            text-align: center;
            display: inline-block;
        }
    </style>
</head>
<body>
    <h1>Distinct Subjects</h1>
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

        // SQL query to retrieve distinct subjects
        $sql = "SELECT DISTINCT subject FROM notes";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row of data
            while ($row = mysqli_fetch_assoc($result)) {
                // Display each subject as a card with a link to another page
                echo '<div class="card">';
                echo '<a href="notes_streams.php?subject=' . urlencode($row["subject"]) . '">' . $row["subject"] . '</a>';
                echo '</div>';
            }
        } else {
            echo "No subjects found.";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
