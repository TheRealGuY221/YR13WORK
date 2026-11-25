<?php
session_start();
require_once 'assets/common.php';
require_once 'assets/dbconnect.php';
$conn = dbconn();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    check_post();
    // Complete the order before handling quantity changes.
    if (isset($_POST['purchase'])) {
        if (!isset($_SESSION['userid'])) {
            header('login.php', 'Please login first.');
        }
        try {
            purchase($conn, $_SESSION['userid']);
            header('basket.php', 'Order completed successfully.');
        } catch (PDOException $e) {
            error_log($e->getMessage());
            header('basket.php', 'Order could not be saved.');
        } catch (RuntimeException $e) {
            header('basket.php', $e->getMessage());
        }
    }
    $id = number('id');
    $quantity = isset($_POST['remove']) ? 0 : number('quantity', 0);
    if (!$id || $quantity === false || $quantity === null) {
        header('basket.php', 'Invalid quantity.');
    }
    if (change_basket($conn, $id, $quantity)) {
        header('basket.php', 'Basket updated.');
    }
    header('basket.php', 'Insufficient stock.');
}
page('Your basket');
$total = 0;
$basket = $_SESSION['basket'] ?? [];
foreach ($basket as $id => $quantity):
    $p = product($conn, $id);
    $subtotal = $p ? $p['Price'] * $quantity : 0;
    $total += $subtotal;
?>
    <h3><?= h($p['Name'] ?? 'Unavailable product') ?></h3>
    <p>£<?= number_format($subtotal, 2) ?></p>
    <form method="post">
        <?php field(); ?>
        <input type="hidden" name="id" value="<?= h($id) ?>">
        <input type="number" name="quantity" min="0" value="<?= h($quantity) ?>" required>
        <button>Update</button>
        <button name="remove" value="1" formnovalidate>Remove</button>
    </form>
<?php endforeach; ?>
<h2>Total: £<?= number_format($total, 2) ?></h2>
<?php if (!$basket): ?>
<p>Your basket is empty.</p>
<?php elseif (isset($_SESSION['userid'])): ?>
<form method="post">
    <?php field(); ?>
    <button name="purchase" value="1">Complete order</button>
</form>
<?php else: ?>
<a href="login.php">Login to complete order</a>
<?php endif; ?>
<p><a href="products.php">Continue shopping</a></p>
<?php endpage(); ?>
