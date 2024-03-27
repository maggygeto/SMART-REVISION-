<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $meetingLink = $_POST['meeting_link'];
    $invitees = $_POST['invitees'];

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

    // Get the ID of the last row in the zoom_meetings table
    $getLastRowIdQuery = "SELECT MAX(zoom_meeting_id) AS last_id FROM zoom_meetings";
    $result = mysqli_query($conn, $getLastRowIdQuery);
    $row = mysqli_fetch_assoc($result);
    $lastRowId = $row['last_id'];

    // Update the last row with the meeting link and invitees
    $updateQuery = "UPDATE zoom_meetings 
                    SET meeting_link = '$meetingLink', invitees = '$invitees' 
                    WHERE zoom_meeting_id = $lastRowId";

    if (mysqli_query($conn, $updateQuery)) {
        echo "Meeting link and invitees updated successfully for the last meeting.";
        header("Location: zclasses.php?success=1");
    } else {
        echo "Error updating meeting link and invitees: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
