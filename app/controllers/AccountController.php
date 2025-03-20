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
        $this->model = new AccountModel($db);
    }

    /**
     * Hiển thị trang đăng ký
     */
    public function register()
    {
        require_once 'app/views/account/register.php';
    }

    /**
     * Xử lý form đăng ký (POST)
     */
    public function save()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username        = trim($_POST["username"] ?? '');
            $fullname        = trim($_POST["fullname"] ?? '');
            $phone           = trim($_POST["phone"] ?? '');
            $email           = trim($_POST["email"] ?? '');
            $password        = $_POST["password"] ?? '';
            $confirmPassword = $_POST["confirmpassword"] ?? '';

            if (empty($username) || empty($fullname) || empty($phone) || empty($email) || empty($password) || empty($confirmPassword)) {
                echo "Vui lòng điền đầy đủ thông tin!";
                return;
            }

            if ($password !== $confirmPassword) {
                echo "Mật khẩu nhập lại không khớp!";
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Email không hợp lệ!";
                return;
            }

            $result = $this->model->register($username, $fullname, $phone, $email, $password);
            
            if ($result === "success") {
                header("Location: /QLHocTap");
                exit();
            } else {
                echo $result;
            }
        } else {
            header("Location: /QLHocTap/account/register");
            exit();
        }
    }

    public function checklogin()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = trim($_POST["username"] ?? '');
            $password = $_POST["password"] ?? '';
    
            if (empty($username) || empty($password)) {
                echo "Vui lòng nhập đầy đủ thông tin!";
                return;
            }
    
            $user = $this->model->login($username, $password);
            if ($user) {
                // Lưu thông tin người dùng vào session
                $_SESSION['user'] = $user;
                header("Location: /QLHocTap");
                exit();
            } else {
                echo "Sai tài khoản hoặc mật khẩu!";
            }
        } else {
            header("Location: /QLHocTap/account/login");
            exit();
        }
    }
    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /QLHocTap");
        exit();
    }

    
}