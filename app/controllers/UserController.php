<?php
require_once "app/models/UserModel.php";

class UserController
{
    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];

            $user = new User();
            if ($user->createUser($username, $password, $email)) {
                echo "Đăng ký thành công!";
            } else {
                echo "Đăng ký thất bại!";
            }
        }
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $user = new User();
            $result = $user->login($username, $password);

            if ($result) {
                session_start();
                $_SESSION["user"] = $result;
                echo "Đăng nhập thành công!";
            } else {
                echo "Sai tài khoản hoặc mật khẩu!";
            }
        }
    }
}
?>
