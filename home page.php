<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            background-image: url('image/books1.jpeg'); 
            background-size: cover;
            background-position: center;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); 
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: orangered;
        }
    </style>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            background-color: orangered;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 20vh;
        }
        h1 {
            color: darkcyan;
            margin-bottom: 20px;
            
        }
        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
           
        }
        .button {
            padding: 10px 20px;
            margin: 0 10px;
            background-color: darkred;
            color: skyblue;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: black;
        }
    </style>
</head>
<body>
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
    <a href="terms and conditions.php">terms and conditions</a>
    <a href="contact.php">Contact</a>
    <a href="about.php">About</a>
    <a href="home page.php">Home</a>
</div>
<div class="container">
    <h1>Welcome to Smart Revision Platform</h1>
    <div class="button-container">
        <a href="Signup_as_teacher_or_Student.php" class="button">Sign Up</a>
        <a href="login as techer or student.php" class="button">Log in</a>
    </div>
</div>
</body>
</html>