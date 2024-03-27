<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Teacher Invitations</title>
 <style>
  .invitation-table {
    width: 100%;
    border-collapse: collapse;
}

.invitation-table th, .invitation-table td {
    padding: 8px;
    text-align: left;
    border: 1px solid #ddd;
}

.invitation-table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.invitation-table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.invitation-table tr:hover {
    background-color: #ddd;
}

 </style>
</head>
<body>
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

// SQL query to select invitation information where invitees are students or teachers_students
$sql = "SELECT zoom_meeting_id, meeting_topic, meeting_agenda, meeting_date_and_time, meeting_link,
               DATE_ADD(meeting_date_and_time, INTERVAL 2 HOUR) AS meeting_ending
        FROM zoom_meetings 
        WHERE invitees IN ('teachers', 'teachers_students')";
$result = mysqli_query($conn, $sql);
echo "<h2 style='text-align:center;'>The students are inviting you to a meeting</h2>";
echo "<h3 style='text-align:center;'>Click the link below to join the meeting</h3>";
// Check if there are any invitations
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
     echo "<table class='invitation-table'>";
     echo "<tr><th>Meeting ID</th><th>Meeting Topic</th><th>Meeting Agenda</th><th>Meeting Date and Time</th><th>Meeting Ending</th><th>Meeting Link</th></tr>";
 
     // Output data of each row
     while ($row = mysqli_fetch_assoc($result)) {
         echo "<tr>";
         echo "<td>" . $row["zoom_meeting_id"] . "</td>";
         echo "<td>" . $row["meeting_topic"] . "</td>";
         echo "<td>" . $row["meeting_agenda"] . "</td>";
         echo "<td>" . $row["meeting_date_and_time"] . "</td>";
         echo "<td>" . $row["meeting_ending"] . "</td>";
         echo "<td><a href='" . $row["meeting_link"] . "' target='_blank'>" . $row["meeting_link"] . "</a></td>";
         echo "</tr>";
     }
 
     // Close the table
     echo "</table>";
     echo "</br>";
     echo "</br>";
     echo "<hr>";
    }
 else {
    echo "No invitations found.";
}

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>
