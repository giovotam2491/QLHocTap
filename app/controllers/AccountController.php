<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

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

    public function login() {
        require_once 'app/views/account/login.php';
    }


    public function forgot_password()
    {
        require_once 'app/views/account/forgot_password.php';
    }
    
    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $username = trim($_POST['username'] ?? '');
            $fullname = trim($_POST['fullname'] ?? '');
            $phone    = trim($_POST['phone'] ?? '');
            $email    = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmpassword'] ?? '';
            $role     = $_POST['role'] ; // Mặc định là 'student'
    
            // Kiểm tra dữ liệu đầu vào, kiểm tra mật khẩu, v.v.
            if ($password !== $confirmPassword) {
                $_SESSION['error'] = "Mật khẩu không khớp!";
                header("Location: /QLHocTap/account/register");
                exit();
            }
    
            // Mã hóa mật khẩu (nên sử dụng password_hash)
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
            // Gọi model để lưu dữ liệu vào cơ sở dữ liệu
            $result = $this->model->register([
                'username' => $username,
                'fullname' => $fullname,
                'phone'    => $phone,
                'email'    => $email,
                'password' => $passwordHash,
                'role'     => $role  // Lưu vai trò của người dùng
            ]);
    
            if ($result) {
                // Thành công, chuyển hướng đến trang đăng nhập hoặc trang chính
                header("Location: /QLHocTap/account/login");
                exit();
            } else {
                $_SESSION['error'] = "Đăng ký thất bại, vui lòng thử lại!";
                header("Location: /QLHocTap/account/register");
                exit();
            }
        }
    }
    

    public function checklogin()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = trim($_POST["username"] ?? '');
            $password = $_POST["password"] ?? '';
    
            if (empty($username) || empty($password)) {
                $_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin!";
                header("Location: /QLHocTap/account/login");
                exit();
            }
    
            $user = $this->model->login($username, $password);
            if ($user) {
                // Lưu thông tin người dùng vào session và xóa thông báo lỗi nếu có
                $_SESSION['user'] = $user;
                unset($_SESSION['error']);
                header("Location: /QLHocTap");
                exit();
            } else {
                $_SESSION['error'] = "Sai tài khoản hoặc mật khẩu!";
                header("Location: /QLHocTap/account/login");
                exit();
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
    
    public function reset_password_request()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = trim($_POST["email"] ?? '');
            
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Email không hợp lệ!";
                return;
            }

            $token = bin2hex(random_bytes(50)); // Tạo mã token ngẫu nhiên
            $exp_time = date("Y-m-d H:i:s", strtotime("+1 hour")); // Hết hạn sau 1 giờ

            // Lưu token vào DB
            $result = $this->model->storeResetToken($email, $token, $exp_time);

            if ($result === "success") {
                $resetLink = "http://localhost/QLHocTap/account/reset_password?token=" . $token;
                
                require 'vendor/autoload.php';

                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);
                
                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'tainguyen6909@gmail.com';                     //SMTP username
                    $mail->Password   = 'dpmdzwzoauqvzppr';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 587;                               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    //Recipients
                    $mail->setFrom('tainguyen6909@gmail.com     ', 'Mailer');
                    $mail->addAddress('taivnfire@gmail.com', 'Joe User');     //Add a recipient
                    $mail->addAddress('ellen@example.com');               //Name is optional
                    // $mail->addReplyTo('info@example.com', 'Information');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');
                
                    //Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Here is the subject';
                    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo "Email không tồn tại!";
            }
        }
    }
    
    public function reset_password_submit()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $token = $_POST["token"] ?? '';
            $new_password = $_POST["password"] ?? '';
            $confirm_password = $_POST["confirm_password"] ?? '';
    
            if (empty($new_password) || empty($confirm_password) || $new_password !== $confirm_password) {
                echo "Mật khẩu không hợp lệ!";
                return;
            }
    
            $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
            $result = $this->model->updatePasswordWithToken($token, $hashedPassword);
    
            if ($result === "success") {
                echo "Mật khẩu đã được cập nhật thành công!";
            } else {
                echo "Token không hợp lệ hoặc đã hết hạn!";
            }
        }
    }
    public function profile() {
        require_once 'app/views/account/profile.php';

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['user_id'])) {
            header("Location: login");
            exit;
        }
        
        $user_id = $_SESSION['user_id'];
        $account = $this->model->getAccountById($user_id);
        if (!$account) {
            die("User not found");
        }
        
        $error = "";
        $success = "";

        // Xử lý khi form được submit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $full_name = trim($_POST['full_name'] ?? '');
            $phone     = trim($_POST['phone'] ?? '');
            $email     = trim($_POST['email'] ?? '');
            
            // Kiểm tra dữ liệu
            if (empty($full_name) || empty($phone) || empty($email)) {
                $error = "Các trường Họ tên, Số điện thoại và Email không được để trống.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Địa chỉ email không hợp lệ.";
            } else {
                // Cập nhật thông tin qua model
                if ($this->model->updateProfile($user_id, $full_name, $phone, $email)) {
                    $success = "Cập nhật thông tin thành công.";
                    // Lấy lại dữ liệu mới
                    $account = $this->model->getAccountById($user_id);
                } else {
                    $error = "Có lỗi xảy ra khi cập nhật thông tin.";
                }
            }
        }

    }
}
