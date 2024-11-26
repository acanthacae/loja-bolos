<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$cakes = json_decode(file_get_contents('data/cakes.json'), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Admin - Gerenciar Bolos</title>
</head>
<body>
    <h1>Gerenciar Bolos</h1>
    <a href="logout.php">Sair</a>
    <form action="add_cake.php" method="post">
        <h2>Adicionar Bolo</h2>
        <input type="text" name="name" placeholder="Nome do bolo" required>
        <input type="text" name="price" placeholder="Preço" required>
        <textarea name="description" placeholder="Descrição"></textarea>
        <button type="submit">Adicionar</button>
    </form>
    <h2>Lista de Bolos</h2>
    <ul>
        <?php foreach ($cakes as $cake): ?>
            <li>
                <?= htmlspecialchars($cake['name']) ?> - R$ <?= number_format($cake['price'], 2, ',', '.') ?>
                <a href="delete_cake.php?id=<?= $cake['id'] ?>">Excluir</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
