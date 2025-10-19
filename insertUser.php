<?php
// 匯入資料庫連線設定
include("database.php");

$username = "Patrick";
$password = "rock3";
$hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (user, password)
VALUES ('$username', '$hash' )";

try {
    mysqli_query($conn, $sql);
    echo "User is now registered";
} catch (mysqli_sql_exception) {
    echo "Could not register user";
}

mysqli_close($conn);
?>