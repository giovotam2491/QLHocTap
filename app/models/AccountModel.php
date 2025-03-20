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
    

}
