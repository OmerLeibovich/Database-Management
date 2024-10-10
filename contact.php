<!DOCTYPE html>
<html>
<head>
    <title>Contact Us - Dolev55 Hotel</title>
    <link href="StyleS.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <?php require("topnav.php"); ?>
    <h1>This website is about Dolev55 Hotel</h1>
    <p>Thank you for visiting our new website. We hope you like it!</p>
    <h1>Contact Us</h1>
    <p>Phone: 050-555-5555</p>
    <p>Email: rrr@gmail.com</p>
    <img src="images/pool.jpg" style="width: 500px; height: 300px;"> 
    <p>If you have any questions, please feel free to contact us.</p>
    <form id="form">
        <div>
            <label for="username">Full Name:</label><br>
            <input type="text" id="username"><br>
        </div>
        <div>
            <label for="mail">Email:</label><br>
            <input type="text" id="mail"><br>
        </div>
        <div>
            <label for="phone">Phone Number:</label><br>
            <input type="text" id="phone"><br>
        </div>
        <div>
            <label for="content">Content:</label><br>
            <textarea id="content"></textarea><br>
        </div>
        <button type="submit" onclick="error(); errormail(); success();">Submit</button>
        <a href="contact.php"><button type="button">Cancel</button></a>
    </form>
    <script src="error.js"></script>
    <script>
        const form = document.getElementById('form');
        const username = document.getElementById('username');
        const mail = document.getElementById('mail');
        const phone = document.getElementById('phone');
        const content = document.getElementById('content');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const usernamevalue = username.value;
            const mailvalue = mail.value;
            const phonevalue = phone.value;
            const contentvalue = content.value;
            localStorage.setItem('user-name', usernamevalue);
            localStorage.setItem('Mail', mailvalue);
            localStorage.setItem('Phone', phonevalue);
            localStorage.setItem('Content', contentvalue);
        });
    </script>
</body>



