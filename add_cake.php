<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cakes = json_decode(file_get_contents('data/cakes.json'), true);

    $newCake = [
        'id' => count($cakes) + 1,
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'description' => $_POST['description']
    ];

    $cakes[] = $newCake;
    file_put_contents('data/cakes.json', json_encode($cakes, JSON_PRETTY_PRINT));

    header("Location: admin.php");
    exit();
}
?>
