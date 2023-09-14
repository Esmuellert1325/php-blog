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

        if ($location === "login" || $location === "" || $message === "register-successful") {
            echo "<form action='includes/formHandler.php' method='post'>
                <h1>Login to your account</h1>
                <input type='text' id='email' name='email'>
                <label for='email'>E-mail address</label>
                <input type='password' name='password'>
                <label for='email'>Password</label>
                <button type='submit'>Login</button>
            </form>
            <nav>
                <a href='http://localhost/php-blog/login'>Login</a>
                <a href='http://localhost/php-blog/register'>Register</a>
            </nav>";
        }
        else if ($location === "register") {
            echo "<form action='includes/formHandler.php' method='post'>
                <h1>Register new account</h1>
                <input type='text' id='email' name='email'>
                <label for='email'>E-mail address</label>
                <input type='text' name='username'>
                <label for='email'>Username</label>
                <input type='password' name='password'>
                <label for='email'>Password</label>
                <button type='submit'>Register</button>
            </form>
            <nav>
                <a href='http://localhost/php-blog/login'>Login</a>
                <a href='http://localhost/php-blog/register'>Register</a>
            </nav>";
        }
    ?>
</body>
</html>