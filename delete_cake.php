<?php
if (isset($_GET['id'])) {
    $cakes = json_decode(file_get_contents('data/cakes.json'), true);
    $cakes = array_filter($cakes, fn($cake) => $cake['id'] != $_GET['id']);
    file_put_contents('data/cakes.json', json_encode(array_values($cakes), JSON_PRETTY_PRINT));

    header("Location: admin.php");
    exit();
}
?>
