<?php include_once __DIR__ . '/../shares/header.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Đặt lại mật khẩu</h2>
        <form action="/QLHocTap/account/reset_password_submit" method="POST">
            <input type="hidden" name="token" value="<?= $_GET['token'] ?>">
            <div class="form-group">
                <label for="password">Mật khẩu mới:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Xác nhận mật khẩu:</label>
                <input type="password" class="form-control" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-success">Xác nhận</button>
        </form>
    </div>
</body>
</html>
