<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <title>Blog - Login</title>
</head>
<body>
    
    <?php
        $url = $_SERVER["REQUEST_URI"]; 
        $parts = explode('/', $url);
        $location = end($parts);
        $message;

        if (isset($_GET["message"])) $message = $_GET["message"];

        if ($location === "login" || $location === "" || (isset($message) && $message === "register-successful") || (isset($message) && $message === "incorrect-login")) {
            echo "<form id='login-form' action='includes/loginHandler.php' method='post'>
                <h1>Login to your account</h1>
                <input type='text' id='email' name='email'>
                <label for='email'>E-mail address</label>
                <input type='password' name='password'>
                <label for='email'>Password</label>
                <button type='submit'>Login</button>";
            if (isset($message) && $message === "register-successful") {
                echo "<span class='register-success'>Succesfully registered!</span>";
            }
            else if (isset($message) && $message === "login-error") {
                echo "<span class='login-error'>Please fill out all the fields!</span>";
            }
            else if (isset($message) && $message === "incorrect-login") {
                echo "<span class='login-error'>Incorrect login credentials!</span>";
            }
            echo "</form>
            <nav>
                <a href='http://localhost/php-blog/login'>Login</a>
                <a href='http://localhost/php-blog/register'>Register</a>
            </nav>";
        }
        else if ($location === "register" || (isset($message) && $message === "register-error") || (isset($message) && $message === "credentials-taken")) {
            echo "<form action='includes/registerHandler.php' method='post'>
                <h1>Register new account</h1>
                <input type='text' id='email' name='email'>
                <label for='email'>E-mail address</label>
                <input type='text' name='username'>
                <label for='email'>Username</label>
                <input type='password' name='password'>
                <label for='email'>Password</label>
                <button type='submit'>Register</button>";
            if (isset($message) && $message === "register-error") {
                echo "<span class='register-error'>Please fill out all the fields!</span>";
            }
            else if (isset($message) && $message === "credentials-taken") {
                echo "<span class='register-error'>The given e-mail or Username is already taken!</span>";
            }
            echo "</form>
            <nav>
                <a href='http://localhost/php-blog/login'>Login</a>
                <a href='http://localhost/php-blog/register'>Register</a>
            </nav>";
        }
    ?>
</body>
</html>