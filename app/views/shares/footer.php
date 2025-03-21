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
    footer {
        display: flex;
        justify-content: space-between;
        padding: 20px;
        background-color:rgb(255, 255, 255);
        border-top: 1px solidrgb(255, 255, 255);
    }
    .footer-section {
        flex: 1;
        margin: 0 20px;
    }
    .footer-section h4 {
        margin-bottom: 15px;
    }
    .footer-section p, .footer-section a {
        margin: 5px 0;
        color: #333;
        text-decoration: none;
    }
    .social-icons img {
        width: 30px;
        margin-right: 10px;
    }
    .newsletter input {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: calc(100% - 120px);
    }
    .newsletter button {
        padding: 10px;
        border: none;
        background-color: #5ac8fa;
        color: white;
        border-radius: 4px;
        cursor: pointer;
    }
    </style>
</head>
<footer>
    <div class="footer-section">
        <h4>QUẢN LÝ HỌC TẬP TRỰC TUYẾN</h4>
        <p>Email: <a href="mailto:qlhttt@edu.vn">qlhttt@edu.vn</a></p>
        <p>Điện thoại: <a href="tel:0123456789">0123456789</a></p>
        <p>Điện thoại: <a href="tel:9876543210">9876543210</a></p>
    </div>

    <div class="footer-section">
        <h4>ĐƯỜNG LIÊN KẾT</h4>
        <p><a href="/QLHocTap/app/views/homepage">Trang chủ</a></p>
        <p><a href="/QLHocTap/account/profile">Hồ sơ</a></p>
        <p><a href="#">Khoá Học</a></p>
        <p><a href="#">Bài Tập</a></p>
        <p><a href="#">Điểm</a></p>
        <p><a href="#">Tham Gia Khoá Học</a></p>
    </div>

    <div class="footer-section newsletter">
        <h4>BÁO LỖI</h4>
        <input type="email" placeholder="Nhập email của bạn" required>
        <button type="submit">Gửi</button>
    </div>
</footer>