<?php
require_once '../../app/config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $maSV = $_POST['MaSV'];

    // Xóa sinh viên
    $query = "DELETE FROM SinhVien WHERE MaSV = :maSV";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':maSV', $maSV);

    if ($stmt->execute()) {
        header('Location: list.php'); // Quay lại danh sách sinh viên
    } else {
        echo "Xóa không thành công!";
    }
}
?>