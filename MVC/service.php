<?php
require_once '../includes/DatabaseConfig.php';


class Service {
    public $conn;
    private $sql;
    private $servername;
    private $username;
    private $password;
    private $databasename;
    private $port;

    public function __construct() {
        $this->conn = null;
        $this->sql = null;
        $dbc = new DatabaseConfig();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;
        $this->port = $dbc->port;
    }

    public function connectDB() {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename, $this->port);
        return $this->conn;
    }

    public function registerUser($email, $username, $password): bool {
        $emailQuery = "SELECT * FROM users WHERE email = '$email'";
        $usernameQuery = "SELECT * FROM users WHERE name = '$username'";

        if ($this->conn) {
            $emailResult = mysqli_query($this->conn, $emailQuery); 
            $usernameResult = mysqli_query($this->conn, $usernameQuery);
            
            if ($emailResult != NULL && $emailResult->num_rows > 0 || $usernameResult != NULL && $usernameResult->num_rows > 0) {
                echo "E-mail or username is taken!";
                header('Location: ../index.php?message=username-email-taken');
            }
            else {
                $secure_pass = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (email, username, password) values('$email', '$username', '$secure_pass')";
                mysqli_query($this->conn, $sql);
                return true;
            }
        }
        return false;
    }
}