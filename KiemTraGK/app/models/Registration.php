<?php
class Registration {
    public $studentId;
    public $courseId;

    public function __construct($studentId, $courseId) {
        $this->studentId = $studentId;
        $this->courseId = $courseId;
    }
}
?>