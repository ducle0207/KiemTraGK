<?php
require '../config/database.php';

class CourseController {
    public function createCourse($data) {
        global $pdo;
        $query = "INSERT INTO courses (name, credits) VALUES (:name, :credits)";
        $stmt = $pdo->prepare($query);
        $stmt->execute($data);
    }

    public function getCourses() {
        global $pdo;
        $query = "SELECT * FROM courses";
        $stmt = $pdo->query($query);
        return $stmt->fetchAll();
    }
}
?>