<?php
class AccountModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function register($username, $fullname, $phone, $email, $password)
    {
        $query = "SELECT id FROM users WHERE username = :username OR email = :email LIMIT 1";
        $stmt  = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return "Tài khoản hoặc email đã tồn tại!";
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, password, role, full_name, phone, email) VALUES (:username, :password, 'student', :fullname, :phone, :email)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);

        return $stmt->execute() ? "success" : "Lỗi khi tạo tài khoản!";
    }
    public function login($username, $password)
    {
        $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt  = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
    public function storeResetToken($email, $token, $exp_time)
    {
        $query = "SELECT id FROM users WHERE email = :email LIMIT 1";
        $stmt  = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            return "Email không tồn tại!";
        }

        // Xóa token cũ nếu có
        $query = "DELETE FROM password_resets WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Lưu token mới
        $query = "INSERT INTO password_resets (email, token, exp_time) VALUES (:email, :token, :exp_time)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':exp_time', $exp_time);

        return $stmt->execute() ? "success" : "Lỗi khi lưu token!";
    }
    public function updatePasswordWithToken($token, $hashedPassword)
    {
        $query = "SELECT email FROM password_resets WHERE token = :token AND exp_time > NOW() LIMIT 1";
        $stmt  = $this->conn->prepare($query);
        $stmt->bindParam(':token', $token);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            return "Token không hợp lệ hoặc đã hết hạn!";
        }

        $email = $stmt->fetchColumn();

        $query = "UPDATE users SET password = :password WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Xóa token sau khi đặt lại mật khẩu thành công
        $query = "DELETE FROM password_resets WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return "success";
    }
    public function getAccountById($user_id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cập nhật thông tin tài khoản (full_name, phone, email)
    public function updateProfile($user_id, $full_name, $phone, $email) {
        $sql = "UPDATE users SET full_name = ?, phone = ?, email = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$full_name, $phone, $email, $user_id]);
    }


}
