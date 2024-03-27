<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login Options</title>
    <style>
        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: right;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="home page.php">Log out</a>
    <a href="terms and conditions.php">terms and conditions</a>
    <a href="contact.php">Contact</a>
    <a href="about.php">About</a>
    <a href="home page.php">Home</a>
</div>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            justify-content: center; /* Center the content horizontally */
            align-items: center;
            height: 100vh;
        }

        .options {
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        .options a {
            display: block;
            margin-bottom: 20px;
            padding: 10px 20px;
            font-size: 18px;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease-in-out;
        }

        .options a:hover {
            background-color: #0056b3;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="options">
   <h2> Are you a Teacher or a Student? <h2>
    <br/>
    
        <a href="login_as_teacher.php">Log in as Teacher </a>
        <a href="login_as_student.php">Log in as Student </a>
    </div>
</div>
<hr>
<footer align="center"><h3>Copyright©;Smart Revision Platform 2024<h3></footer>
</body>
</html>
