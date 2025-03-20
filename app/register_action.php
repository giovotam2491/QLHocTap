<?php
session_start();
require_once 'app/config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form và kiểm tra
    $username = trim($_POST['username']);
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($name) || empty($email) || empty($password)) {
        die("Vui lòng điền đầy đủ thông tin!");
    }

    // Kết nối đến database
    $database = new Database();
    $conn = $database->getConnection();

    // Kiểm tra xem username hoặc email đã tồn tại chưa
    $queryCheck = "SELECT id FROM users WHERE username = :username OR email = :email LIMIT 1";
    $stmtCheck = $conn->prepare($queryCheck);
    $stmtCheck->bindParam(':username', $username);
    $stmtCheck->bindParam(':email', $email);
    $stmtCheck->execute();

    if ($stmtCheck->rowCount() > 0) {
        die("Username hoặc Email đã tồn tại!");
    }

    // Mã hóa mật khẩu
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Lưu thông tin người dùng (mặc định role là student)
    $query = "INSERT INTO users (username, password, role, name, email) VALUES (:username, :password, 'student', :name, :email)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        // Nếu đăng ký thành công, có thể tự động đăng nhập và chuyển hướng
        $_SESSION['user'] = [
            'id'       => $conn->lastInsertId(),
            'username' => $username,
            'role'     => 'student',
            'name'     => $name,
            'email'    => $email,
        ];
        header("Location: index.php");
        exit;
    } else {
        echo "Đăng ký thất bại. Vui lòng thử lại!";
    }
} else {
    // Nếu không phải POST, chuyển hướng về trang đăng ký
    header("Location: register.php");
    exit;
}
?>
