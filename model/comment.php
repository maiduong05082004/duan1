<?php
function load_binhluan($idsp)
{
    $sql = "SELECT comment.content,comment.date,account.acc_name FROM `comment`
    LEFT JOIN account ON comment.acc_id=taikhoan.acc_id
    LEFT JOIN product ON comment.product_id=product.product_id
    WHERE product.product_id=$idsp";
    $result = pdo_query($sql);
    return $result;
}
?>