roo<?php
session_start();
require_once 'assets/common.php';
require_once 'assets/dbconnect.php';
$conn = dbconn();

// Add the requested quantity to the basket.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    check_post();
    $id = number('id');
    $quantity = number('quantity');
    if (!$id || !$quantity) {
        header('products.php', 'Enter a valid quantity.');
    }
    $newQuantity = ($_SESSION['basket'][$id] ?? 0) + $quantity;
    if (change_basket($conn, $id, $newQuantity)) {
        header('products.php', 'Product added to basket.');
    } else {
        header('products.php', 'Not enough stock.');
    }
}
page('Products');
foreach (product_getter($conn) as $p):
?>
    <h2><?= h($p['Name']) ?></h2>
    <p><?= h($p['description']) ?></p>
    <p>£<?= number_format($p['Price'], 2) ?></p>
    <p>Stock: <?= h($p['dailyStock']) ?></p>
    <form method="post">
        <?php field(); ?>
        <input type="hidden" name="id" value="<?= h($p['ProductID']) ?>">
        <input type="number" name="quantity" min="1" value="1" required>
        <button>Add to basket</button>
    </form>
    <hr>
<?php endforeach; endpage(); ?>
