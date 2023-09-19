<?php

use LDAP\Result;

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
        $usernameQuery = "SELECT * FROM users WHERE username = '$username'";

        if ($this->conn) {
            $emailResult = mysqli_query($this->conn, $emailQuery); 
            $usernameResult = mysqli_query($this->conn, $usernameQuery);
            
            if ($emailResult != NULL && $emailResult->num_rows > 0 || $usernameResult != NULL && $usernameResult->num_rows > 0) {
                header('Location: ../index.php?message=credentials-taken');
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

    public function loginUser($email, $password) {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        if (isset($this->conn)) {
            $result = mysqli_query($this->conn, $sql); 
            $row = mysqli_fetch_assoc($result);

            if (mysqli_num_rows($result) != 0) {
                $dbEmail = $row["email"]; 
                $dbPassword = $row["password"]; 

                if ($dbEmail === $email && password_verify($password, $dbPassword)) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Gets a specific column from the Users table
     * 
     * @param $email - The email address of the user 
     * @param $field - The name of the column 
     */
    public function getFieldByEmail($email, $field): string {
        $sql = "SELECT $field FROM users WHERE email = '$email'";

        if (isset($this->conn) && $field !== "password") {
            $result = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_assoc($result);

            return $row[$field];
        }
    }
}