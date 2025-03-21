<?php
require_once '../../../app/config/database.php';
include '../../../app/views/header.php'; // Thêm header



// Truy vấn lấy danh sách học phần
$query = "SELECT MaHP, TenHP, SoTinChi FROM HocPhan";
$stmt = $conn->prepare($query);
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>DANH SÁCH HỌC PHẦN</h2>
    <style>
        .container {
    width: 80%;
    margin: 0 auto;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    background-color: white;
}

.table th, .table td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: center;
}

.table th {
    background-color: #343a40;
    color: white;
}

.btn {
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    border: none;
}

.btn-success {
    background-color: #28a745;
    color: white;
}
    </style>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Mã Học Phần</th>
                <th>Tên Học Phần</th>
                <th>Số Tín Chỉ</th>
                <th>Đăng Kí</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?= htmlspecialchars($course['MaHP']) ?></td>
                    <td><?= htmlspecialchars($course['TenHP']) ?></td>
                    <td><?= htmlspecialchars($course['SoTinChi']) ?></td>
                    <td>
                        <button class="btn btn-success">Đăng Kí</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>