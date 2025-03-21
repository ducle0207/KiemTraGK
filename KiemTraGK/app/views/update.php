<?php
require_once '../../app/config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $maSV = $_POST['MaSV'];
    $hoTen = $_POST['HoTen'];
    $gioiTinh = $_POST['GioiTinh'];
    $ngaySinh = $_POST['NgaySinh'];
    $maNganh = $_POST['MaNganh'];
    
    // Xử lý upload hình ảnh nếu có
    $hinhPath = null;
    if ($_FILES['Hinh']['name']) {
        $hinhPath = 'images/' . basename($_FILES['Hinh']['name']);
        move_uploaded_file($_FILES['Hinh']['tmp_name'], '../../' . $hinhPath);
    }

    // Cập nhật thông tin sinh viên
    $query = "UPDATE SinhVien SET HoTen = :hoTen, GioiTinh = :gioiTinh, NgaySinh = :ngaySinh, MaNganh = :maNganh" . ($hinhPath ? ", Hinh = :hinh" : "") . " WHERE MaSV = :maSV";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':hoTen', $hoTen);
    $stmt->bindParam(':gioiTinh', $gioiTinh);
    $stmt->bindParam(':ngaySinh', $ngaySinh);
    $stmt->bindParam(':maNganh', $maNganh);
    $stmt->bindParam(':maSV', $maSV);
    
    if ($hinhPath) {
        $stmt->bindParam(':hinh', $hinhPath);
    }

    if ($stmt->execute()) {
        header('Location: list.php'); // Quay lại danh sách sinh viên
    } else {
        echo "Cập nhật không thành công!";
    }
}
?>