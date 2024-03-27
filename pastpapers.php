<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past Papers</title>
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
    </style>
</head>
<body>

<h1>Quick Fire Questions</h1>

<?php
session_start();
// Initialize overall score if not set
if (!isset($_SESSION['overall_score'])) {
    $_SESSION['overall_score'] = array();
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

// SQL query to fetch distinct test names
$sql = "SELECT DISTINCT test_name FROM questions";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card">';
        echo '<h2>' . $row['test_name'] . '</h2>';
        if (isset($_SESSION['overall_score'][$row['test_name']])) {
            echo '<h1>' . $_SESSION['overall_score'][$row['test_name']] . '%</h1>';
        } else {
            echo '<h1 style="display:none;">0%</h1>';
        }
        echo '<a href="test.php?test_name=' . urlencode($row['test_name']) . '">View Test</a>';
        echo '</div>';
    }
} else {
    echo "No past papers found.";
}

// Close the database connection
mysqli_close($conn);

?>

</body>
</html>
