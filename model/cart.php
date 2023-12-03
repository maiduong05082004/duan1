<?php
function addcart() {
    $product_id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $user_id = $_SESSION['acc_id']; 
    $sql = "INSERT INTO cart (user_id, product_id, quantity, added_on) VALUES (?, ?, ?, NOW())";
    pdo_execute($sql,[$user_id, $product_id, $quantity]);
}
function loadall_bill($iduser){
    $sql="select * from bill where acc_id=".$iduser;
    $listbill=pdo_query($sql);    
    return $listbill;
}
function loadone_bill_user($iduser){
    $sql="select * from bill where acc_id=".$iduser." ORDER BY ngaydathang DESC";
    $listbilluser=pdo_query($sql);    
    return $listbilluser;
}
function loadall_cart_user($idbill){
    $sql="select * from cart where idbill=".$idbill;
    $listbill=pdo_query($sql);    
    return $listbill;
}
?>