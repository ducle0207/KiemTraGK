<?php
include_once '../config/database.php'; // Bao gồm tệp kết nối
class SinhVienController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $sinhViens = $this->model->getAllSinhVien();
        include 'views/sinhvien/index.php'; // Hiển thị danh sách sinh viên
    }public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->createSinhVien($_POST);
            header('Location: index.php?action=index');
        } else {
            $nganhHocs = $this->model->getAllNganhHoc(); // Lấy danh sách ngành học
            include 'views/create.php'; // Đảm bảo đường dẫn đúng
        }
    }

    public function edit($maSV) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST['maSV'] = $maSV; // Thêm mã sinh viên để cập nhật
            $this->model->updateSinhVien($_POST);
            header('Location: index.php?action=index'); // Chuyển hướng về trang danh sách
        } else {
            $sinhVien = $this->model->getSinhVienById($maSV);
            include 'views/sinhvien/edit.php'; // Hiển thị biểu mẫu sửa sinh viên
        }
    }

    public function delete($maSV) {
        $this->model->deleteSinhVien($maSV);
        header('Location: index.php?action=index'); // Chuyển hướng về trang danh sách
    }

    public function detail($maSV) {
        $sinhVien = $this->model->getSinhVienById($maSV);
        include 'views/sinhvien/detail.php'; // Hiển thị chi tiết sinh viên
    }
}
?>