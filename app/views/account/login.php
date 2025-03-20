<?php include_once __DIR__ . '/../shares/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    .gradient-custom-2 {
      background: #fccb90;
      background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
      background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }
    @media (min-width: 768px) {
      .gradient-form {
        height: 100vh !important;
      }
    }
    @media (min-width: 769px) {
      .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
      }
    }
  </style>
  <!-- Các liên kết CSS khác nếu cần -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <section class="h-100 gradient-form">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <!-- Phần form đăng nhập -->
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
                  <div class="text-center">
                    <img src="uploads/logo.png" style="width: 185px;" alt="logo.png">
                    <h4 class="mt-1 mb-5 pb-1">We are The Flash Team</h4>
                  </div>
                  <!-- Thêm action và method để giữ chức năng đăng nhập -->
                  <form action="/QLHocTap/account/checklogin" method="post">
                    <p>Hãy đăng nhập tài khoản của bạn</p>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example11">Tài Khoản:</label>
                      <input type="text" id="form2Example11" name="username" class="form-control" placeholder="" required />
                    </div>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example22">Mật Khẩu:</label>
                      <input type="password" id="form2Example22" name="password" class="form-control" required />
                    </div>
                    <div class="text-center pt-1 mb-5 pb-1">
                      <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Đăng nhập</button>
                      <a class="text-muted" href="/QLHocTap/account/forgot_password">Quên mật khẩu?</a>
                    </div>
                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">Bạn chưa có tài khoản?</p>
                      <a href="/QLHocTap/account/register" class="btn btn-outline-danger">Tạo tài khoản</a>
                    </div>
                  </form>
                </div>
              </div>
              <!-- Phần thông tin bên phải -->
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-3">
                  <h4 class="mb-4">Quản Lý Học Tập Trực Tuyến</h4>
                  <p class="small mb-0">
                    text
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>