<?php
require_once '../MVC/service.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email =  filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $username= htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    if (!empty($email) && !empty($username) && !empty($password)) {
        $service = new Service();
        if ($service->connectDB()) {
            if ($service->registerUser($email, $username, $password)) {
                header('Location: ../index.php?message=register-successful');
            }
        }
    }
    else {
        header('Location: ../index.php?message=register-error');
    }
}
else {
    header('Location: ../index.php');
}