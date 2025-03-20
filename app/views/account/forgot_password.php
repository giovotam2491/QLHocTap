<?php include_once __DIR__ . '/../shares/header.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Quên mật khẩu</h2>
        <form action="/QLHocTap/account/reset_password_request" method="POST">
            <div class="form-group">
                <label for="email">Nhập email của bạn:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Gửi yêu cầu</button>
        </form>
    </div>
</body>
</html>
