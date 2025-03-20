<?php
class DefaultController {
    public function index() {
        $this->home(); // Gọi trang login mặc định
    }

    public function home() {
        include_once "app/views/account/login.php";
    }
}
?>
