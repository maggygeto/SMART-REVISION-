<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Exams</title>
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 10px;
            width: 200px;
            text-align: center;
            display: inline-block;
        }
        .plus-icon {
            font-size: 24px;
            margin-left: 10px;
            cursor: pointer;
        }
        /* Style the form container */
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
    </style>
</head>
<body>
    <div class="card" onclick="openForm()">
        <h2>Create New Test</h2>
        <div class="plus-icon">+</div>
    </div>

    <!-- Form to create a new test -->
    <div id="createForm" class="form-popup">
        <div class="form-container">
            <span class="close" onclick="closeForm()">&times;</span>
            <form action="exam2.php" method="get">
                <label for="testName">Test Name:</label><br>
                <input type="text" id="testName" name="test_name"><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

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

    // Fetch distinct test names from the questions table
    $sql = "SELECT DISTINCT test_name FROM questions";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Output test names as cards
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card">';
            echo '<h2>' . htmlspecialchars($row['test_name']) . '</h2>';
            echo '<a href="exam2.php?test_name=' . urlencode($row['test_name']) . '">View Questions</a>';
            echo '</div>';
        }
    } else {
        echo "No tests found.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

    <script>
        // Function to open the form dialog
        function openForm() {
            document.getElementById("createForm").style.display = "block";
        }

        // Function to close the form dialog
        function closeForm() {
            document.getElementById("createForm").style.display = "none";
        }
    </script>

</body>
</html>
