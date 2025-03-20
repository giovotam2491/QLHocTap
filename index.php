<?php
session_start();
require_once 'app/config/database.php';

// Xử lý URL
$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

// Xác định controller và action
$controllerName = isset($url[0]) && $url[0] != '' ? ucfirst($url[0]) . 'Controller' : 'DefaultController';
$action = isset($url[1]) && $url[1] != '' ? $url[1] : 'index';

// Kiểm tra file controller có tồn tại không
$controllerPath = 'app/controllers/' . $controllerName . '.php';
if (!file_exists($controllerPath)) {
    showErrorPage(404, "Controller '$controllerName' không tồn tại.");
}

require_once $controllerPath;
$controller = new $controllerName();

// Kiểm tra method trong controller có tồn tại không
if (!method_exists($controller, $action)) {
    showErrorPage(404, "Action '$action' không tồn tại trong $controllerName.");
}

// Gọi action với tham số còn lại
try {
    call_user_func_array([$controller, $action], array_slice($url, 2));
} catch (Exception $e) {
    showErrorPage(500, "Lỗi hệ thống: " . $e->getMessage());
}

// Hàm xử lý lỗi
function showErrorPage($code, $message)
{
    http_response_code($code);
    echo "<h2>Lỗi $code</h2><p>$message</p>";
    exit;
}
?>
