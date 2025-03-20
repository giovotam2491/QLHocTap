<?php
require_once "BaseModel.php";

class User extends BaseModel
{
    protected $table = "users";

    // Thêm người dùng mới
    public function createUser($username, $password, $email)
    {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT); // Mã hóa mật khẩu
        $query = "INSERT INTO {$this->table} (username, password, email) VALUES (:username, :password, :email)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $hashed_password);
        $stmt->bindParam(":email", $email);
        return $stmt->execute();
    }

    // Kiểm tra đăng nhập
    public function login($username, $password)
    {
        $query = "SELECT * FROM {$this->table} WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
?>
