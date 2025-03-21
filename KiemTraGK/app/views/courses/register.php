<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Ký Học Phần</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 5% auto;
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        header {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            border-radius: 10px 10px 0 0;
        }
        h1 {
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <h1>DANH SÁCH HỌC PHẦN</h1>
    </header>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Mã Học Phần</th>
                    <th>Tên Học Phần</th>
                    <th>Số Tín Chỉ</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Kết nối đến cơ sở dữ liệu
                $servername = "localhost"; // Thay đổi nếu cần
                $username = "root"; // Tên đăng nhập
                $password = ""; // Mật khẩu
                $dbname = "your_database"; // Tên cơ sở dữ liệu

                // Tạo kết nối
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Kiểm tra kết nối
                if ($conn->connect_error) {
                    die("Kết nối thất bại: " . $conn->connect_error);
                }

                // Truy vấn học phần
                $sql = "SELECT ma_hoc_phan, ten_hoc_phan, so_tin_chi FROM courses"; // Thay đổi tên bảng và cột nếu cần
                $result = $conn->query($sql);

                // Hiển thị kết quả
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['ma_hoc_phan']}</td>
                                <td>{$row['ten_hoc_phan']}</td>
                                <td>{$row['so_tin_chi']}</td>
                                <td>
                                    <form action='../../controllers/courseController.php?action=register' method='POST'>
                                        <input type='hidden' name='code' value='{$row['ma_hoc_phan']}'>
                                        <button type='submit'>Đăng Ký</button>
                                    </form>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Không có học phần nào.</td></tr>";
                }

                // Đóng kết nối
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>