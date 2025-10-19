<?php
include("database.php");

// 檢查表單是否被提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 使用 filter_input 過濾使用者輸入（防止 XSS）
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    // 驗證輸入是否為空
    if (empty($username)) {
        echo "Please enter a username";
    } elseif (empty($password)) {
        echo "Please enter a password";
    } else {
        // 對密碼加密（hash）
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // 插入資料到資料庫
        $sql = "INSERT INTO users (user, password)
                VALUES ('$username', '$hash')";

        try {
            mysqli_query($conn, $sql);
            echo "You are now registered!";
        } catch (mysqli_sql_exception) {
            echo "Could not register user!";
        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2>Welcome to Fakebook!</h2>
        username:<br>
        <input type="text" name="username" required><br>
        password:<br>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="submit" value="register">
    </form>
</body>
</html>
