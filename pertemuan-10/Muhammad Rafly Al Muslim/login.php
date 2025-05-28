<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    if (!empty($username)) {
        $_SESSION['user'] = $username;
        header("Location: form.php");
        exit;
    } else {
        $error = "Username tidak boleh kosong!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        <label>Username: <input type="text" name="username" required></label><br><br>
        <button type="submit">Login</button>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    </form>
</body>
</html>
