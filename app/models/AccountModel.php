<?php
class AccountModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    /**
     * Hàm đăng ký người dùng mới
     *
     * @param string $username
     * @param string $fullname
     * @param string $phone
     * @param string $email
     * @param string $password
     * @return string
     */
    public function register($username, $fullname, $phone, $email, $password)
    {
        // Kiểm tra xem username hoặc email đã tồn tại chưa
        $query = "SELECT id FROM users WHERE username = :username OR email = :email LIMIT 1";
        $stmt  = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Nếu tìm thấy user có username hoặc email trùng
        if ($stmt->rowCount() > 0) {
            return "Tài khoản hoặc email đã tồn tại!";
        }
        

        // Hash mật khẩu
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Thêm tài khoản mới vào database
        // Ở đây mình cho mặc định role = 'student' khi người dùng tự đăng ký
        $query = "INSERT INTO users (username, password, role, full_name, phone, email)
                  VALUES (:username, :password, 'student', :fullname, :phone, :email)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            return "success"; // Đăng ký thành công
        } else {
            return "Lỗi khi tạo tài khoản!";
        }
    }
    public function getAccountByUsername($username)
    {
        $query = "SELECT * FROM account WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
}
