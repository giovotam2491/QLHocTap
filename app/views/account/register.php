<?php include_once __DIR__ . '/../shares/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .gradient-custom-3 {
      background: #84fab0;
      background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));
      background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));
    }
    .gradient-custom-4 {
      background: #84fab0;
      background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));
      background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));
    }
    .tabs {
      display: flex;
      position: relative;
      background-color: #fff;
      box-shadow: 0 0 1px 0 rgba(24, 94, 224, 0.15), 0 6px 12px 0 rgba(24, 94, 224, 0.15);
      padding: 0.7rem;
      margin: 0rem 7.2rem;
      border-radius: 99px;
    }
    .tabs * { z-index: 2; }
    .container input[type="radio"] { display: none; }
    .tab {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 30px;
      width: 80px;
      font-size: .9rem;
      color: black;
      font-weight: 500;
      border-radius: 99px;
      cursor: pointer;
      transition: color 0.15s ease-in;
    }
    .container input[type="radio"]:checked + label {
      color: #185ee0;
    }
    .container input[type="radio"]:checked + label > .notification {
      background-color: #185ee0;
      color: #fff;
      margin: 0px;
    }
    .container input[id="radio-1"]:checked ~ .glider {
      transform: translateX(0);
    }
    .container input[id="radio-2"]:checked ~ .glider {
      transform: translateX(100%);
    }
    .glider {
      position: absolute;
      display: flex;
      height: 40px;
      width: 80px;
      background-color: #e6eef9;
      z-index: 1;
      border-radius: 99px;
      transition: 0.25s ease-out;
    }
    @media (max-width: 700px) {
      .tabs { transform: scale(0.6); }
    }
  </style>
</head>
<body>
    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Tạo tài khoản</h2>

                                <!-- Chú ý: sửa thành thẻ form hợp lệ -->
                                <form method="POST" action="/QLHocTap/account/save">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="username">Tài khoản:</label>
                                        <input type="text" id="username" name="username" class="form-control form-control-lg" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="fullname">Họ và tên:</label>
                                        <input type="text" id="fullname" name="fullname" class="form-control form-control-lg" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="phone">Số điện thoại:</label>
                                        <input type="text" id="phone" name="phone" class="form-control form-control-lg" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="email">Email:</label>
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password">Mật khẩu:</label>
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="confirmpassword">Nhập lại mật khẩu:</label>
                                        <input type="password" id="confirmpassword" name="confirmpassword" class="form-control form-control-lg" required />
                                    </div>

                                    <div class="container mb-4">
                                        <div class="tabs">
                                            <!-- Thêm thuộc tính name="role" và value tương ứng -->
                                            <input type="radio" id="radio-1" name="role" value="student" checked>
                                            <label class="tab" for="radio-1">Học sinh</label>
                                            <input type="radio" id="radio-2" name="role" value="teacher">
                                            <label class="tab" for="radio-2">Giáo Viên</label>
                                            <span class="glider"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">
                                            Đăng ký
                                        </button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">
                                        Bạn đã có tài khoản? 
                                        <a href="/QLHocTap/account/login" class="fw-bold text-body"><u>Đăng nhập</u></a>
                                    </p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
