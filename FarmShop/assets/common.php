<?php
function usermessage(){ $msg=$_SESSION['usermessage']??''; unset($_SESSION['usermessage']); return htmlspecialchars($msg); }
function h($v){return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');}
function go($page,$msg){$_SESSION['usermessage']=$msg; header('Location: '.$page); exit;}
function product_getter($conn){
    $stmt = $conn->prepare('SELECT * FROM Products');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function product($conn,$id,$lock=false){$stmt=$conn->prepare('SELECT * FROM Products WHERE ProductID=?'.($lock?' FOR UPDATE':''));$stmt->execute([$id]);return $stmt->fetch(PDO::FETCH_ASSOC);}
function token(){return $_SESSION['csrf']??=bin2hex(random_bytes(32));}
function check_post(){if($_SERVER['REQUEST_METHOD']!=='POST'||!hash_equals(token(),$_POST['csrf']??'')){http_response_code(400);exit('Invalid request');}}
function field(){echo '<input type="hidden" name="csrf" value="'.h(token()).'">';}
function number($name,$min=1){return filter_input(INPUT_POST,$name,FILTER_VALIDATE_INT,['options'=>['min_range'=>$min]]);}
// Set the quantity in the basket after checking stock.
function change_basket($conn, $id, $quantity){
    if ($quantity === 0) {
        unset($_SESSION['basket'][$id]);
        return true;
    }
    $p = product($conn, $id);
    if (!$p || $quantity < 1 || $quantity > $p['dailyStock']) {
        return false;
    }
    $_SESSION['basket'][$id] = $quantity;
    return true;
}

// Save the whole order, or undo all changes if anything fails.
function purchase($conn, $uid){
    $basket = $_SESSION['basket'] ?? [];
    if (!$basket) throw new RuntimeException('Basket is empty.');
    $conn->beginTransaction();
    try {
        $total = 0;
        $prices = [];
        foreach ($basket as $id => $quantity) {
            $p = product($conn, $id, true);
            if (!$p || $quantity < 1 || $quantity > $p['dailyStock']) {
                throw new RuntimeException('Insufficient stock. Update your basket.');
            }
            $prices[$id] = $p['Price'];
            $total += $p['Price'] * $quantity;
        }
        $stmt = $conn->prepare('INSERT INTO Orders (UserID, Total) VALUES (?, ?)');
        $stmt->execute([$uid, number_format($total, 2, '.', '')]);
        $order = $conn->lastInsertId();
        foreach ($basket as $id => $quantity) {
            $stmt = $conn->prepare('INSERT INTO OrderItems (OrderID, ProductID, Quantity, UnitPrice) VALUES (?, ?, ?, ?)');
            $stmt->execute([$order, $id, $quantity, $prices[$id]]);
            $stmt = $conn->prepare('UPDATE Products SET dailyStock = dailyStock - ? WHERE ProductID = ?');
            $stmt->execute([$quantity, $id]);
        }
        $conn->commit();
        unset($_SESSION['basket']);
        return $order;
    } catch (Throwable $e) {
        $conn->rollBack();
        throw $e;
    }
}
function reg_user($conn){$stmt=$conn->prepare('INSERT INTO user (Email,Password,Fname,Sname,Address,signuptime,PhoneNumber) VALUES (?,?,?,?,?,NOW(),?)');return $stmt->execute([$_POST['email'],password_hash($_POST['password'],PASSWORD_DEFAULT),$_POST['fname'],$_POST['sname'],$_POST['address'],$_POST['PhoneNumber']]);}
function login($conn,$email){$s=$conn->prepare('SELECT UserID,Password FROM user WHERE Email=?');$s->execute([$email]);return $s->fetch(PDO::FETCH_ASSOC);}
function page($title){echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width"><title>'.h($title).'</title><link rel="stylesheet" href="assets/styles.css"></head><body><div class="container">';require 'nav.php';echo '<main><h1>'.h($title).'</h1><p>'.usermessage().'</p>';}
function endpage(){echo '</main></div></body></html>';}
