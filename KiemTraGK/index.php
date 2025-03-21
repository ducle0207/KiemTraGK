<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
</head>
<body>
    <h1>Danh sách sinh viên</h1>
    <a href="index.php?action=create">Thêm sinh viên</a>
    <table border="1">
        <tr>
            <th>Mã SV</th>
            <th>Họ Tên</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Hình</th>
            <th>Hành Động</th>
        </tr>
        <?php foreach ($sinhViens as $sinhVien): ?>
        <tr>
            <td><?= $sinhVien['MaSV'] ?></td>
            <td><?= $sinhVien['HoTen'] ?></td>
            <td><?= $sinhVien['GioiTinh'] ?></td>
            <td><?= $sinhVien['NgaySinh'] ?></td>
            <td><img src="<?= $sinhVien['Hinh'] ?>" alt="Hình ảnh" width="50"></td>
            <td>
                <a href="index.php?action=detail&maSV=<?= $sinhVien['MaSV'] ?>">Xem</a>
                <a href="index.php?action=edit&maSV=<?= $sinhVien['MaSV'] ?>">Sửa</a>
                <a href="index.php?action=delete&maSV=<?= $sinhVien['MaSV'] ?>">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>