<?php
function loadall_wishlist($iduser){
    $sql = "SELECT product.product_id,product.product_name,product.product_price,product.product_img FROM `wishlist`
            LEFT JOIN account ON wishlist.acc_id=account.acc_id
            LEFT JOIN product ON wishlist.product_id=product.product_id
            WHERE account.acc_id=$iduser";
    $result = pdo_query($sql);
    return $result;
}
function add_wishlist() {
    $product_id = $_POST['id'];
    $user_id = $_SESSION['acc_id']; 
    $sql = "INSERT INTO wishlist (acc_id, product_id) VALUES (?, ?)";
    pdo_execute($sql,[$user_id, $product_id]);
}
?>