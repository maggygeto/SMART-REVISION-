<!DOCTYPE html>
<html lang="en">
<head><style>
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            background-color: black;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: darkcyan;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        #terms {
            padding: 50px;
            border: 2px solid #ddd;
            border-radius: 5px;
            background-color:orangered;
            overflow-y: auto;
            max-height: 1000px;
            text-align: justify;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Terms and Conditions</h1>
        <div id="terms">
            <?php
            // Terms and Conditions content
            $termsAndConditions = "
                <h2>1. Acceptance of Terms</h2>
                <p>By accessing or using our Service, you agree to be bound by these Terms and our Privacy Policy. If you do not agree with any part of these Terms, you may not use our Service.</p>
                <h2>2. Use of the Service</h2>
                <p>You must have reached the age of majority in your jurisdiction to use our Service. By using our Service, you represent and warrant that you meet these eligibility requirements.</p>
                <h2>3. User Accounts</h2>
                <p>To access certain features of our Service, you may need to create a user account. You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.</p>                
                <h2>4. Content </h2>               
                You retain ownership of any content that you submit, post, or display on or through our Service. However, by submitting, posting, or displaying content on our Service, you grant us a non-exclusive, worldwide, royalty-free license to use, reproduce, modify, adapt, publish, translate, distribute, and display such content for the purpose of providing and improving our Service.</p> 
                
                <h2>5. Intellectual Property</h2>                
                <p> All intellectual property rights in our Service, including but not limited to copyrights, trademarks, and patents, are owned by or licensed to us. You may not use our intellectual property rights without our prior written consent.</p> 
                
                <h2>6. Limitation of Liability</h2>              
                <p>To the fullest extent permitted by applicable law, we shall not be liable for any indirect, incidental, special, consequential, or punitive damages, or any loss of profits or revenues, whether incurred directly or indirectly, or any loss of data, use, goodwill, or other intangible losses, resulting from (a) your access to or use of or inability to access or use our Service; (b) any conduct or content of any third party on our Service; (c) any content obtained from our Service; and (d) unauthorized access, use, or alteration of your transmissions or content.</p> 
                <h2>8. Changes to Terms</h2>             
                <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material, we will provide at least 30 days' notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p> 
                
                <h2>9. Contact Us </h2>              
                <p>If you have any questions about these Terms, please contact us at +254-759-543-328.</p>
            ";
            echo $termsAndConditions;
            ?>
        </div>
    </div>
</body>
</html>
