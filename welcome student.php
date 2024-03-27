<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Students</title>
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
    <a href="terms and conditions.php">terms and conditionsy</a>
    <a href="contact.php">Contact</a>
    <a href="about.php">About</a>
    <a href="home page.php">Home</a>
</div>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: darkgoldenrod;
            margin: 0;
            padding: 0;
        }

        .container {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        #startButton {
            background-color: darkred;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        #startButton:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>You have been signed in successfully, welcome dear student!</h1>
       <a href="#"> <button id="startButton">Okay, let's get started</button>
    </div>

    <script>
        document.getElementById("startButton").addEventListener("click", function() {
            alert("You clicked the 'Okay, let's get started' button!");
        });
    </script>
</body>
</html>
