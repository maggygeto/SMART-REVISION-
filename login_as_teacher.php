<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher login</title>
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
            justify-content: flex-start; /* Align to the left */
            align-items: center;
            height: 100vh;
            padding: 0 20px; /* Add some padding to the container */
        }

        .form-container {
            width: 45%; /* Set a width for the form */
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .link-container {
            margin-top: 20px;
            text-align: center;
        }

        .link-container a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .link-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2>Teacher Log in</h2>
        <form id="teacher-login-form" action="teacher_login_process.php" method="post">
            <div class="form-group">
                <label for="tsc">TSC No:</label>
                <input type="text" id="tsc" name="tsc" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <p align="left"><a href="forgot password.php">Forgot password?</a></p>
            <div class="form-group">
                <input type="submit" value="Log in">
            </div>
        </form>
        <div class="link-container">
         <p align="left">   <a href="signup as teacher.php">Don't have an account? Sign up</a></p>
        </div>
    </div>
</div>
<hr>
<footer align="center"><h3>Copyright©;Smart Revision Platform 2024<h3></footer>
</body>
</html>
