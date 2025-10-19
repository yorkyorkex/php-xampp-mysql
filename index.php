<?php
include("database.php");

// 檢查表單是否被提交
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // 密碼加密（建議）
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // SQL 語法：插入使用者資料
    $sql = "INSERT INTO users (user, password)
            VALUES ('$username', '$hash')";

    try {
        mysqli_query($conn, $sql);
        echo "✅ User registered successfully!";
    } catch (mysqli_sql_exception) {
        echo "❌ Could not register user!";
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
