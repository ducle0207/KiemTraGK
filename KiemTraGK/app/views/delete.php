<?php
require_once '../../app/config/database.php';
include '../../app/views/header.php'; // Thêm header

// Kiểm tra mã sinh viên
if (!isset($_GET['MaSV'])) {
    echo "<div class='alert alert-danger text-center'>Mã sinh viên không hợp lệ!</div>";
    exit;
}

$maSV = $_GET['MaSV'];

// Lấy thông tin sinh viên để hiển thị
$query = "SELECT * FROM SinhVien WHERE MaSV = :maSV";
$stmt = $conn->prepare($query);
$stmt->bindParam(':maSV', $maSV, PDO::PARAM_STR);
$stmt->execute();
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    echo "<div class='alert alert-danger text-center'>Không tìm thấy sinh viên!</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xóa Sinh Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm mx-auto" style="max-width: 500px;">
            <div class="card-body text-center">
                <h2 class="text-danger">Xóa Sinh Viên</h2>
                <p>Bạn có chắc chắn muốn xóa sinh viên <strong><?= htmlspecialchars($student['HoTen']) ?></strong>?</p>
                <form action="delete_action.php" method="POST">
                    <input type="hidden" name="MaSV" value="<?= htmlspecialchars($student['MaSV']) ?>">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                    <a href="list.php" class="btn btn-secondary">Quay Lại Danh Sách</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>