<?php
require_once 'app/config/database.php';
require_once 'app/models/AccountModel.php';

class AccountController
{
    private $model;

    public function __construct()
    {
        // Khởi tạo kết nối database
        $database = new Database();
        $db       = $database->getConnection();
        // Khởi tạo model
        $this->model = new AccountModel($db);
    }

    /**
     * Hiển thị trang đăng ký
     */
    public function register()
    {
        // Gọi view register
        require_once 'app/views/account/register.php';
    }

    /**
     * Xử lý form đăng ký (POST)
     */
    public function save()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Lấy dữ liệu từ form
            $username        = trim($_POST["username"]);
            $fullname        = trim($_POST["fullname"]);
            $phone           = trim($_POST["phone"]);
            $email           = trim($_POST["email"]);
            $password        = $_POST["password"];
            $confirmPassword = $_POST["confirmpassword"];

            // Kiểm tra nhập lại mật khẩu
            if ($password !== $confirmPassword) {
                echo "Mật khẩu nhập lại không khớp!";
                return;
            }

            // Gọi hàm đăng ký từ model
            $result = $this->model->register($username, $fullname, $phone, $email, $password);

            // Kiểm tra kết quả
            if ($result === "success") {
                // Đăng ký thành công -> chuyển hướng sang trang đăng nhập
                header("Location: /QLHocTap/account/login");
                exit();
            } else {
                // Hiển thị lỗi
                echo $result;
            }
        } else {
            // Nếu người dùng không gửi POST, có thể chuyển hướng về trang đăng ký
            header("Location: /QLHocTap/account/register");
            exit();
        }
    }

    /**
     * Hiển thị form đăng nhập (nếu có)
     */
    public function login()
    {
        require_once 'app/views/account/login.php';
    }

    public function checkLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Lấy tài khoản từ DB
            $account = $this->model->getAccountByUsername($username);
            
            // Nếu tài khoản tồn tại
            if ($account) {
                // Kiểm tra mật khẩu
                if (password_verify($password, $account->password)) {
                    // Đăng nhập thành công, tạo session
                    session_start();
                    $_SESSION['username'] = $account->username;
                    $_SESSION['role'] = $account->role; // Lưu role vào session (nếu có)
                    header('Location: /QLHocTap');
                    exit;
                } else {
                    echo "Password incorrect.";
                }
            } else {
                echo "Account not found.";
            }
        }
    }
}
