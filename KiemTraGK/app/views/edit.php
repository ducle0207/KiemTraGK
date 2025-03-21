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
$query = "SELECT * FROM SinhVien WHERE MaSV = :maSV";
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
    <title>Cập Nhật Thông Tin Sinh Viên</title>
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
        form {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="file"] {
            margin-bottom: 15px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        img {
            margin-top: 10px;
            max-width: 100px;
        }
    </style>
</head>
<body>

<h2>Cập Nhật Thông Tin Sinh Viên</h2>
<form action="update.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="MaSV" value="<?= htmlspecialchars($student['MaSV']) ?>">
    
    <label>Họ Tên:</label>
    <input type="text" name="HoTen" value="<?= htmlspecialchars($student['HoTen']) ?>" required>

    <label>Giới Tính:</label>
    <select name="GioiTinh" required>
        <option value="Nam" <?= $student['GioiTinh'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
        <option value="Nữ" <?= $student['GioiTinh'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
    </select>

    <label>Ngày Sinh:</label>
    <input type="date" name="NgaySinh" value="<?= htmlspecialchars($student['NgaySinh']) ?>" required>

    <label>Hình:</label>
    <input type="file" name="Hinh" accept="image/*">
    <img src="../../images/<?= htmlspecialchars($student['Hinh']) ?>" alt="Student Image">

    <label>Ngành Học:</label>
    <select name="MaNganh" required>
        <?php
        $query = "SELECT * FROM NganhHoc";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $nganhHocs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($nganhHocs as $nganh) {
            $selected = ($nganh['MaNganh'] == $student['MaNganh']) ? 'selected' : '';
            echo "<option value='" . htmlspecialchars($nganh['MaNganh']) . "' $selected>" . htmlspecialchars($nganh['TenNganh']) . "</option>";
        }
        ?>
    </select>

    <input type="submit" value="Cập Nhật">
    <a href="list.php" class="btn btn-secondary">Back to List</a>
</form>

</body>
</html>