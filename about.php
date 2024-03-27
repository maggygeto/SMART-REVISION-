<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            background-color: black;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
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

        .container {
            width: 80%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: yellowgreen;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        p {
            line-height: 1.6;
            color: #666;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        .slideshow-container {
            display: none;
            text-align: center;
            margin-bottom: 20px;
        }

        .user-count {
            text-align: center;
            font-size: 24px;
            color: #333;
        }
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

<div class="container">
    <h1>About Us</h1>
    <p>Welcome to our colorful and dynamic website! At Smart Revision Platform, we are dedicated to providing a user-friendly and efficient online experience for our visitors. Here's what sets us apart:</p>
    <ul>
        <li><strong>User-Friendly Navigation:</strong> Our website features a simple and intuitive navigation bar that allows users to easily access key sections.</li>
        <li><strong>Clear and Concise Content:</strong> We strive to present information in a clear and concise manner, ensuring that visitors can quickly find the information they need.</li>
        <li><strong>Responsive Design:</strong> Our website is built using responsive design principles, ensuring a seamless experience across devices and screen sizes.</li>
        <li><strong>Fast Loading Times:</strong> We prioritize speed and efficiency, with fast loading times that minimize waiting for our users.</li>
        <li><strong>Effective Call-to-Action:</strong> Each page includes clear and compelling calls-to-action that encourage visitors to take the next step.</li>
        <li><strong>Accessible Design:</strong> We adhere to accessibility standards to ensure that our website is inclusive and can be enjoyed.</li>
    </ul>
    <div class="slideshow-container">
        <p>This is where the slideshow would be if we had one!</p>
    </div>
    <p class="user-count">We have served <span id="user-count">1000</span> satisfied users!</p>
</div>

</body>
</html>
