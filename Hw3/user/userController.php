<?php
// 引入名為 'userModel.php' 的外部 PHP 文件，這個文件可能包含與用戶數據交互的相關函數和數據庫連接代碼。
require('userModel.php');

// 從 HTTP 請求中獲取名為 'act' 的參數，該參數用於區分不同的操作（例如 'login' 或 'register'）。
$act = $_REQUEST['act'];

// 使用 switch/case 來根據 'act' 參數的值執行不同的操作。
switch ($act) {
    case "login":
        // 從 HTTP POST 請求中獲取 'username' 和 'password' 參數。
        $username = $_POST["username"];
        $password = $_POST['password'];
        
        // 調用 'login' 函數，並將 'username' 和 'password' 傳遞給它。
        $result = login($username, $password);
        
        // 將 'result' 數據轉換為 JSON 格式並輸出。
        echo json_encode($result);
        return; // 結束腳本的執行。
        
    case "register":
        // 從 HTTP POST 請求中獲取 'username'、'password' 和 'role' 參數。
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        
        // 調用 'addUser' 函數，並將 'username'、'password' 和 'role' 傳遞給它。
        addUser($username, $password, $role);
        
        // 將一個空的 JSON 數組輸出（通常表示成功）。
        echo json_encode(array());
        return; // 結束腳本的執行。
}
?>
