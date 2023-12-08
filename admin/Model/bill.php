<?php
function loadbill(){
    $sql="SELECT idbill, ngaydathang, bill_total, bill_name, bill_address, bill_email, bill_status
    FROM bill
    GROUP BY ngaydathang
    ORDER BY ngaydathang desc";
return pdo_query($sql);
}
function displayStatus($status) {
    switch ($status) {
        case 1:
            return 'Đang xử lý';
        case 2:
            return 'Đang giao hàng';
        case 3:
            return 'Đã giao hàng';
        default:
            return 'Hủy đơn hàng';
    }
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
function reduceProductQuantityForBill($billId) {
    // Lấy danh sách sản phẩm trong đơn hàng
    $sql = "SELECT product_id, product_quantity FROM cart WHERE idbill = ?";
    $products = pdo_query($sql, $billId);

    // Giảm số lượng cho mỗi sản phẩm
    foreach ($products as $product) {
        $productId = $product['product_id'];
        $quantitySold = $product['product_quantity'];
        $sqlUpdate = "UPDATE product SET product_quantity = product_quantity - ? WHERE product_id = ?";
        pdo_execute($sqlUpdate, $quantitySold, $productId);
    }
}
?>