<?php
class Database
{
    private $host = "localhost";
    private $db_name = "qlhoctap";
    private $username = "root";
    private $password = "";
    private $conn;

    public function getConnection()
    {
        if ($this->conn === null) {
            try {
                $this->conn = new PDO(
                    "mysql:host={$this->host};dbname={$this->db_name};charset=utf8",
                    $this->username,
                    $this->password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (PDOException $exception) {
                die("Kết nối thất bại: " . $exception->getMessage());
            }
        }
        return $this->conn;
    }
}
?>
