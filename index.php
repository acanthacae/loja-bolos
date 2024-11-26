<?php
// Carregar os bolos do arquivo JSON
$cakesFile = 'data/cakes.json';
$cakes = [];

if (file_exists($cakesFile)) {
    $cakes = json_decode(file_get_contents($cakesFile), true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Bolos</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header>
        <h1>Catálogo de Bolos</h1>
        <a href="login.php">Admin</a>
    </header>

    <main>
        <section class="catalog">
            <?php if (!empty($cakes)): ?>
                <?php foreach ($cakes as $cake): ?>
                    <div class="cake">
                        <!-- Exibir a imagem do bolo -->
                        <img src="<?= htmlspecialchars($cake['image']); ?>" 
                             alt="<?= htmlspecialchars($cake['name']); ?>" 
                             class="cake-image">
                        <!-- Exibir informações do bolo -->
                        <h2><?= htmlspecialchars($cake['name']); ?></h2>
                        <p><span>Preço:</span> R$ <?= number_format($cake['price'], 2, ',', '.'); ?></p>
                        <p><?= htmlspecialchars($cake['description']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nenhum bolo disponível no momento. Por favor, volte mais tarde!</p>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
