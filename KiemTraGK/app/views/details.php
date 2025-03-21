<?php
require_once '../../app/config/database.php';
include '../../app/views/header.php'; // Thêm header

// Kiểm tra mã sinh viên
if (!isset($_GET['MaSV'])) {
    echo "Mã sinh viên không hợp lệ!";
    exit;
}

$maSV = $_GET['MaSV'];

// Lấy thông tin sinh viên
$query = "SELECT SinhVien.*, NganhHoc.TenNganh FROM SinhVien 
          JOIN NganhHoc ON SinhVien.MaNganh = NganhHoc.MaNganh 
          WHERE SinhVien.MaSV = :maSV";
$stmt = $conn->prepare($query);
$stmt->bindParam(':maSV', $maSV);
$stmt->execute();
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    echo "Không tìm thấy sinh viên!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Chi Tiết Sinh Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .detail-container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .detail-item {
            margin: 10px 0;
        }
        .detail-item label {
            font-weight: bold;
        }
        .back-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .back-button:hover {
            background-color: #45a049;
        }
        img {
            max-width: 100px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<h2>Thông Tin Chi Tiết Sinh Viên</h2>
<div class="detail-container">
    <div class="detail-item">
        <label>Họ Tên:</label>
        <span><?= htmlspecialchars($student['HoTen']) ?></span>
    </div>
    <div class="detail-item">
        <label>Giới Tính:</label>
        <span><?= htmlspecialchars($student['GioiTinh']) ?></span>
    </div>
    <div class="detail-item">
        <label>Ngày Sinh:</label>
        <span><?= htmlspecialchars($student['NgaySinh']) ?></span>
    </div>
    <div class="detail-item">
        <label>Ngành Học:</label>
        <span><?= htmlspecialchars($student['TenNganh']) ?></span>
    </div>
    <div class="detail-item">
        <label>Hình:</label>
        <img src="../../images/<?= htmlspecialchars($student['Hinh']) ?>" alt="Student Image">
    </div>
</div>

<a href="list.php" class="btn btn-secondary">Back to List</a>

</body>
</html>