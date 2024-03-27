<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Retrieve form data
     $meetingTopic = $_POST['meeting_topic'];
     $meetingAgenda = $_POST['meeting_agenda'];
     $meetingDateTime = $_POST['meeting_datetime'];


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

     // Prepare SQL statement to insert meeting details into the database
     $sql = "INSERT INTO zoom_meetings (meeting_topic, meeting_agenda, meeting_date_and_time)
             VALUES ('$meetingTopic', '$meetingAgenda', '$meetingDateTime')";

     // Execute SQL statement
     if (mysqli_query($conn, $sql)) {
         echo "Meeting details inserted successfully.";
     } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     }

     // Close the database connection
     mysqli_close($conn);
    // Retrieve form data

    // Encode meeting details for passing them as URL parameters
    $encodedMeetingTopic = urlencode($meetingTopic);
    $encodedMeetingAgenda = urlencode($meetingAgenda);
    $encodedMeetingDateTime = urlencode($meetingDateTime);

    // Redirect users to Zoom website to create meeting
     // Construct the Zoom meeting link
     $zoomMeetingLink = "https://zoom.us/meeting/schedule?topic=$encodedMeetingTopic&agenda=$encodedMeetingAgenda&start_time=$encodedMeetingDateTime";

     // JavaScript code to open the Zoom meeting link in a new tab
     echo '<script>window.open("' . $zoomMeetingLink . '", "_blank");</script>';
   

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Zoom Meeting</title>
</head>
<body>
    <h1>Create Zoom Meeting</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="meeting_topic">Meeting Topic:</label><br>
        <input type="text" id="meeting_topic" name="meeting_topic" required><br>
        <label for="meeting_agenda">Meeting Agenda:</label><br>
        <textarea id="meeting_agenda" name="meeting_agenda" required></textarea><br>
        <label for="meeting_datetime">Meeting Date and Time:</label><br>
        <input type="datetime-local" id="meeting_datetime" name="meeting_datetime" required><br><br>
        
        <button type="submit">Create Zoom Meeting</button>
    </form>

     <br><br><br><br><hr><br>
     
     <form method="post" action="updateZoomlink.php">
     <h2>Specify Invitees</h2>
     <label for="invitees">Select Invitees:</label><br>
        <select id="invitees" name="invitees">
         <option value="students">Invite Students</option>
         <option value="teachers">Invite Teachers</option>
         <option value="teachers_students">Invite Teachers and Students</option>
       </select> <br><br>
        <label for="meeting_link">Zoom Meeting Link:</label><br>
        <input type="text" id="meeting_link" name="meeting_link" required><br><br>
        <button type="submit">Submit Meeting Link</button>
    </form>
    <?php
       if (isset($_GET['success']) && $_GET['success'] == 1) {
           echo "<p>Meeting link and invitees updated successfully.</p>";
       }
?>
   
   
    <form action="">
   
        
   

        <br><br>
        </form>
</body>
</html>
