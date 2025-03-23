<?php include_once __DIR__ . '/../shares/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- CSS của bạn -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.2.1/font-awesome-animation.min.css">
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
    .alert>.start-icon {
            margin-right: 0;
            min-width: 20px;
            text-align: center;
        }

        .alert>.start-icon {
            margin-right: 5px;
        }

        .greencross
        {
        font-size:18px;
            color: #25ff0b;
            text-shadow: none;
        }

        .alert-simple.alert-danger
        {
        border: 1px solid rgba(241, 6, 6, 0.81);
        background-color: rgba(220, 17, 1, 0.16);
        box-shadow: 0px 0px 2px #ff0303;
        color: #ff0303;
        transition:0.5s;
        cursor:pointer;
        }

        .alert-danger:hover
        {
        background-color: rgba(220, 17, 1, 0.33);
        transition:0.5s;
        }

        .danger
        {
        font-size: 18px;
        color: #ff0303;
        text-shadow: none;
        }
  </style>
</head>
<body>
  <section class="h-100 gradient-form">
    <div class="container py-5 h-100">
      <?php
      if (session_status() !== PHP_SESSION_ACTIVE) {
          session_start();
      }
      if (isset($_SESSION['error'])): ?>
          <div class="col-sm-12">
              <div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
                  <button type="button" class="close font__size-18" data-dismiss="alert">
                      <span aria-hidden="true">
                          <i class="fa fa-times danger"></i>
                      </span>
                      <span class="sr-only">Close</span>
                  </button>
                  <i class="start-icon far fa-times-circle faa-pulse animated"></i>
                  <strong class="font__weight-semibold">Lỗi!</strong> <?php echo htmlspecialchars($_SESSION['error']); ?>
              </div>
          </div>
      <?php 
          unset($_SESSION['error']);
      endif;
      ?>
      <div class="row d-flex justify-content-center align-items-center h-100">
        <!-- Phần form đăng nhập -->
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
                  <div class="text-center">
                    <img src="https://i.pinimg.com/736x/1e/c5/5d/1ec55d2107231cf6e355099648586c50.jpg" style="width: 185px;" alt="logo.png">
                    <h4 class="mt-1 mb-5 pb-1">We are The Flash Team</h4>
                  </div>
                  <form action="/QLHocTap/account/checklogin" method="post">
                    <p><b>Hãy đăng nhập tài khoản của bạn</b></p>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example11">Tài Khoản:</label>
                      <input type="text" id="form2Example11" name="username" class="form-control" required />
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
                      <a href="/QLHocTap/account/register" class="btn btn-outline-danger my-2 my-sm-0 ml-2">Tạo tài khoản</a>
                    </div>
                  </form>
                </div>
              </div>
              <!-- Phần thông tin bên phải -->
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-3">
                  <h4 class="mb-4">Quản Lý Học Tập Trực Tuyến</h4>
                  <p class="small mb-0">text</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(function(){
      // Sau 3 giây, thông báo lỗi sẽ fade out trong 1 giây
      setTimeout(function(){
        $(".alert").fadeOut(2000);
      }, 5000);
    });
  </script>
</body>
</html>
<?php include_once __DIR__ . '/../shares/footer.php'; ?>
