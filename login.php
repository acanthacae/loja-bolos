<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users = json_decode(file_get_contents('data/users.json'), true);
    $username = $_POST['username'];
    $password = $_POST['password'];

    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $_SESSION['user'] = $username;
            header("Location: admin.php");
            exit();
        }
    }

    $error = "Usuário ou senha inválidos.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post">
        <label>Usuário: <input type="text" name="username" required></label>
        <label>Senha: <input type="password" name="password" required></label>
        <button type="submit">Entrar</button>
    </form>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
</body>
</html>
