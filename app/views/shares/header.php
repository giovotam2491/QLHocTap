<?php if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Các thẻ meta, CSS như cũ -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Quản Lý Học Tập Trực Tuyến</title>
    <style>
        .header {
            background-color: #151515;
        }
        .btn-yellow {
            background-color: #FFC107;
            color: black;
        }
        .navbar-nav .nav-item .nav-link:hover {
            color: #FFC107;
        }
        .btn-yellow:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark header">
    <a class="navbar-brand" href="/QLHocTap">
        <img src="https://i.pinimg.com/736x/1e/c5/5d/1ec55d2107231cf6e355099648586c50.jpg" alt="Logo" style="width: 40px; height: 40px;">
        Quản Lý Học Tập
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
        <?php if(isset($_SESSION['user'])): ?>
            <li class="nav-item">
                <a class="nav-link" href="/QLHocTap/shares/homepage">Trang chủ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/QLHocTap/account/profile">Hồ sơ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Khoá Học</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Bài Tập</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Điểm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Tham Gia Khoá Học</a>
            </li>
        <?php endif; ?>
    </ul>

        <form class="form-inline my-2 my-lg-0">
            <?php if(isset($_SESSION['user'])): ?>
                <!-- Nếu đã đăng nhập -->
                <span class="navbar-text mr-2">
                    Chào, <?php echo htmlspecialchars($_SESSION['user']['full_name']); ?>
                </span>
                <a href="/QLHocTap/account/logout" class="btn btn-outline-light my-2 my-sm-0">Logout</a>
            <?php else: ?>
                <!-- Nếu chưa đăng nhập -->
                <a href="/QLHocTap/account/login" class="btn btn-outline-light my-2 my-sm-0">Login</a>
                <a href="/QLHocTap/account/register" class="btn btn-outline-warning my-2 my-sm-0 ml-2">Sign-up</a>
            <?php endif; ?>
        </form>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
