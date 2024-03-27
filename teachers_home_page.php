<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Homepage</title>
    <link rel="stylesheet" href="css/style.css">
     <style>
        .teacher-name {
        font-size: 14px; /* Adjust font size as needed */
        font-weight: bold;
        color: #fff; /* Text color */
        text-shadow: 2px 2px 4px #ff0000, 0 0 25px #ff00de, 0 0 5px #007fff; /* Text shadow with multiple colors */
        margin-top: 5px; /* Adjust margin as needed */
}
     </style>
</head>
<body>

<div class="navbar">
    <div class="logo">
        <p><span>R</span>EV</p>
    </div>
    <div class="nav-ietms">
    <a href="#features">Home</a>
    <a href="teachersExam.php">Examiner</a>
    <a href="Notes.php">Tnotes</a>
    <a href="zoomlink.php">Zoomlink</a>
    <a href="teacher_invitation.php">Invitation</a>
    <a href="students_inquiries.php">Student Inquiries</a>

    </div>
    <div class="navbar-icons">
        <a href="#" class="profile-icon"><img src="image/profile_icon.png" alt="Profile"></a>
        <span class="teacher-name">
            <?php
            session_start();
            // Check if the teacher's name is set in the session
            if(isset($_SESSION['teacher_email'])) {
                echo $_SESSION['teacher_email'];
            }
            ?>
        </span>
        <a href="login_as_teacher.php" class="logout-button">Logout</a>
        <a href="#" class="theme-switch"><img src="image/moon_icon.png" alt="Switch Theme"></a>
    </div>
    <!-- Add more navbar items as needed -->
</div>

<section id="hero" class="hero-section">
    <img src="image/teacher_hero_image.jpeg" alt="Smart Revision Platform" style="width: 100%;">
    <div class="hero-text">
        <h1>Welcome to Smart Revision Platform</h1>
        <p>Empowering teachers with enhanced teaching tools and effective classroom management solutions.</p>
    </div>
</section>

<section id="features" class="features-section">
    <h2 style="text-align:center; margin-bottom:20px; font-size:2rem;">Features</h2>
    <div class="feature">
        <h3>Gradebook Integration</h3>
        <p>Effortlessly manage and organize grades with our integrated gradebook feature.</p>
    </div>
    <div class="feature">
        <h3>Student Progress Tracking</h3>
        <p>Monitor student progress in real-time and identify areas for improvement with our tracking tools.</p>
    </div>
    <div class="feature">
        <h3>Assignment Management</h3>
        <p>Create, distribute, and collect assignments seamlessly with our assignment management system.</p>
    </div>
</section>

<h2 style="text-align:center; padding:20px;">How It Works</h2>
<section id="how-it-works" class="works">
    <div class="container">
        <div class="step">
            <h3>Step 1: Create Assignments and set Exams</h3>
            <p>Easily create and customize assignments tailored to your curriculum and students' needs.</p>
        </div>
        <div class="step">
            <h3>Step 2: Grade Assignments & Exams</h3>
            <p>Efficiently grade assignments and provide feedback to students for their learning improvement.</p>
        </div>
        <div class="step">
            <h3>Step 3: Track Student Progress</h3>
            <p>Monitor student progress and performance to identify strengths and areas for growth.</p>
        </div>
    </div>
</section>


<section id="events" class="events-section">
    <h2 style="text-align:center; padding-block:20px;">Upcoming Events</h2>
    <div class="event">
        <img src="image/event1.jpeg" alt="Event 1">
        <h3>Webinar: Exam Preparation Strategies</h3>
        <p>Date: May 15, 2024</p>
        <p>Join our webinar to learn effective strategies for exam preparation, including time management techniques, study tips, and stress management.</p>
    </div>
    <div class="event">
        <img src="image/event2.jpeg" alt="Event 2">
        <h3>Mock Exam Day</h3>
        <p>Date: June 1, 2024</p>
        <p>Participate in our mock exam day to simulate exam conditions and test your knowledge. Receive feedback and tips for improvement.</p>
    </div>
    <div class="event">
        <img src="image/event3.jpeg" alt="Event 3">
        <h3>Guest Speaker: Subject Expert</h3>
        <p>Date: June 10, 2024</p>
        <p>Join us for a guest speaker session with a subject expert who will share insights and tips for mastering challenging topics.</p>
    </div>
    <!-- Add more events as needed -->
</section>


<footer>
    <div class="footer-container">
        <div class="footer-links">
            <a href="#features">Features</a>
            <a href="#hero">Hero Section</a>
            <a href="#how-it-works">How it Works</a>
            <a href="#events">Events</a>
            <!-- Add more links to other sections if needed -->
        </div>
        <div class="social-icons">
            <a href="https://www.facebook.com"><img src="image/facebook_icon.png" alt="Facebook"></a>
            <a href="https://twitter.com"><img src="image/twitter_icon.png" alt="Twitter"></a>
            <a href="https://www.instagram.com"><img src="image/instagram_icon.png" alt="Instagram"></a>
            <!-- Add more social media icons as needed -->
        </div>
    </div>
    <p>&copy; Smart Revision Platform 2024</p>
</footer>


</body>
</html>
