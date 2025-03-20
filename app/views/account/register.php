<?php include_once __DIR__ . '/../shares/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    .gradient-custom-3 {
    background: #84fab0;
    background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));
    background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
    }
    .gradient-custom-4 {
    background: #84fab0;
    background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));
    background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
    }
  </style>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

                <form>

                    <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form3Example1cg">Họ và tên</label>
                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" />
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form3Example3cg">Số điện thoại hoặc Email</label>
                    <input type="email" id="form3Example3cg" class="form-control form-control-lg" />
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form3Example4cg">Mật khẩu</label>
                    <input type="password" id="form3Example4cg" class="form-control form-control-lg" />
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form3Example4cdg">Nhập lại mật khẩu</label>
                    <input type="password" id="form3Example4cdg" class="form-control form-control-lg" />
                    </div>

                    <div class="d-flex justify-content-center">
                    <button  type="button" data-mdb-button-init
                        data-mdb-ripple-init class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Đăng ký</button>
                    </div>

                    <p class="text-center text-muted mt-5 mb-0">Bạn đã có tài khoản? <a href="/QLHocTap"
                        class="fw-bold text-body"><u>Đăng nhập</u></a></p>

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