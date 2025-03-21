<?php
session_start();
require '../config/database.php';

class AuthController {
    public function login($username, $password) {
        global $pdo;
        $query = "SELECT * FROM students WHERE username = :username AND password = :password";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['username' => $username, 'password' => $password]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['user'] = $user;
            header("Location: ../views/courses/index.php");
        } else {
            echo "Login failed.";
        }
    }

    public function register($data) {
        global $pdo;
        $query = "INSERT INTO students (name, email, username, password) VALUES (:name, :email, :username, :password)";
        $stmt = $pdo->prepare($query);
        $stmt->execute($data);
    }
}
?>