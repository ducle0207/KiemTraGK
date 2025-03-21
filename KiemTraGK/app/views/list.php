<?php
require_once '../../app/config/database.php';
include '../../app/views/header.php'; // Thêm header

$query = "SELECT sv.MaSV, sv.HoTen, sv.GioiTinh, sv.NgaySinh, sv.Hinh, nh.TenNganh 
          FROM SinhVien sv 
          JOIN NganhHoc nh ON sv.MaNganh = nh.MaNganh";
$stmt = $conn->prepare($query);
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang Sinh Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center text-primary">TRANG SINH VIÊN</h2>
        <div class="d-flex justify-content-end mb-3">
            <a href="add.php" class="btn btn-success">Thêm Sinh Viên</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Mã SV</th>
                        <th>Họ Tên</th>
                        <th>Giới Tính</th>
                        <th>Ngày Sinh</th>
                        <th>Hình</th>
                        <th>Ngành</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student): ?>
                        <tr class="text-center align-middle">
                            <td><?= htmlspecialchars($student['MaSV']) ?></td>
                            <td><?= htmlspecialchars($student['HoTen']) ?></td>
                            <td><?= htmlspecialchars($student['GioiTinh']) ?></td>
                            <td><?= htmlspecialchars($student['NgaySinh']) ?></td>
                            <td><img src="/../../images/<?= htmlspecialchars($student['Hinh']) ?>" width="80" height="80" class="rounded" alt="Student Image"></td>
                            <td><?= htmlspecialchars($student['TenNganh']) ?></td>
                            <td>
                                <a href="edit.php?MaSV=<?= $student['MaSV'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                                <a href="details.php?MaSV=<?= $student['MaSV'] ?>" class="btn btn-info btn-sm">Chi Tiết</a>
                                <a href="delete.php?MaSV=<?= $student['MaSV'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
