<?php
function addcart() {
    $product_id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $user_id = $_SESSION['acc_id']; 
    $sql = "INSERT INTO cart (user_id, product_id, quantity, added_on) VALUES (?, ?, ?, NOW())";
    pdo_execute($sql,[$user_id, $product_id, $quantity]);
}


?>