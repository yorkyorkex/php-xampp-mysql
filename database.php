<?php
// Database connection settings
$db_server = "localhost";
$db_user   = "root";
$db_pass   = "";
$db_name   = "businessdb";

try {
    // 嘗試建立連線
    $conn = mysqli_connect(
        $db_server,
        $db_user,
        $db_pass,
        $db_name
    );
} catch (mysqli_sql_exception $e) {
    // 若連線失敗，顯示錯誤訊息
    echo "Could not connect!";
}

// 驗證是否成功連線
if ($conn) {
    echo "You are connected!";
}
?>
