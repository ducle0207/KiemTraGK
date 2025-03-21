<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sinh Viên</title>
    <link rel="stylesheet" href="../../app/css/style.css">
    <style>
        nav {
            background-color: #007bff; /* Màu xanh dương */
            padding: 10px;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }
        nav ul li {
            margin-right: 15px;
        }
        nav ul li a {
            color: white; /* Màu chữ trắng */
            text-decoration: none;
            font-weight: bold;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../../public/index.php">Test1</a></li>
                <li><a href="../students/list.php">Sinh Viên</a></li>
                <li><a href="../courses/list.php">Học Phần</a></li>
                <li><a href="../courses/register.php">Đăng Ký</a></li>
                <li><a href="../auth/login.php">Đăng Nhập</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>
