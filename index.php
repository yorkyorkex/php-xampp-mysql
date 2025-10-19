<?php
// 匯入資料庫連線設定
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Database Connection Test</title>
</head>
<body>
  Hello<br>
  <?php
  // 如果連線成功會從 database.php 顯示 "You are connected!"
  ?>
</body>
</html>
