<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
            justify-content: center; 
            align-items: center;
            height: 100vh;
        }

        .forgot-password-form {
            text-align: center;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group input[type="email"] {
            width: 300px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .forgot-password-btn {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .forgot-password-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <form class="forgot-password-form" id="forgot-password-form">
        <div class="input-group">
        Forgot your password?
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <p><h3>Note: The email will be sent to your email address<br/> even if it is different to your username</h3></P>
        <button type="submit" class="forgot-password-btn">Submit</button>
    </form>
</div>

<script>
    document.getElementById('forgot-password-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get the email entered by the user
        var email = document.getElementById('email').value;

        // Here, you can add your code to handle the password reset,
        // such as sending a password reset link to the provided email address.
        // For example:
        alert('Sending password reset link to ' + email + '...');
        // You can then perform the necessary action, such as sending an AJAX request to a server-side script.
    });
</script>
<hr>
<footer align="center"><h3>Copyright©;Smart Revision Platform 2024<h3></footer>
</body>
</html>
