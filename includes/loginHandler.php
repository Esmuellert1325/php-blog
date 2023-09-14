<?php
require_once '../MVC/service.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email =  filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($_POST["password"]);

    if (!empty($email) && !empty($password)) {
        $service = new Service();
        if ($service->connectDB()) {
            if ($service->loginUser($email, $password)) {
                header('Location: ../views/Home.php');
            }
            else {
                header('Location: ../index.php?message=incorrect-login');
            }
        }
    }
    else {
        header('Location: ../index.php?message=login-error');
    }
}