<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-JWT-AUTH</title>
</head>
<body>
    <h2>Login Form</h2>
    <form action="" method="post" id="loginForm">
        <input type="text" name="username" id="username" placeholder="Username" > <br><br>
        <input type="password" name="password" id="password" placeholder="Password" > <br><br>
        <input type="submit" value="Submit">
    </form>

    <hr>
    <button onclick="fetchProtected()">Get Protected Data</button>
    <pre id="result"></pre>
</body>
<script src="script.js"></script>
</html>