<?php
function loadall_comment(){
    $sql = "SELECT c.cmt_id, a.acc_name, m.product_name,c.content, c.date
    FROM comment c
    JOIN account a ON c.acc_id = a.acc_id
    JOIN product m ON c.product_id = m.product_id
    ";
    $result = pdo_query($sql);
    return $result;
}
function loadall_comment_by_product_id($product_id){
    $sql = "SELECT c.cmt_id, a.acc_name, m.product_name, c.content, c.date
            FROM comment c
            JOIN account a ON c.acc_id = a.acc_id
            JOIN product m ON c.product_id = m.product_id
            WHERE m.product_id = " . $product_id;

    $result = pdo_query($sql);
    return $result;
}

function delete_comment($id)
{
    $sql = "delete from comment where cmt_id=" . $id;
    pdo_execute($sql);
}
?>