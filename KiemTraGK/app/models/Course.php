<?php
class Course {
    public $id;
    public $name;
    public $credits;

    public function __construct($id, $name, $credits) {
        $this->id = $id;
        $this->name = $name;
        $this->credits = $credits;
    }
}
?>