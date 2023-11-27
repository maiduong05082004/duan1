<?php
//home_sanpham
function loadall_product_home(){

    $sql = 'SELECT * FROM product where 1 order by product_id desc limit 0,9';
    
    $listsanpham = pdo_query($sql);
    return $listsanpham;
    
    
    }
    
    //hiển thị top 10 sản phẩm có lượt xem cao nhất
    function loadall_product_top10(){
    //thừa
    $sql = "SELECT * FROM product where 1 order by product_view desc limit 0,10";
    
    $listsanpham = pdo_query($sql);
    return $listsanpham;
    
    
    }
//admin_sanpham
function insert_product($tensp,$giasp,$hinh,$mota,$soluong,$view,$iddm){
    $sql = "INSERT INTO product (product_name,product_price,product_img,product_content,product_quantity,product_view,genre_id) VALUES ('$tensp', '$giasp', '$hinh', '$mota',$soluong, '$view', '$iddm')";
    pdo_execute($sql);
}
function delete_product($id){
    $sql="delete from product where product_id=".$id;
    pdo_execute($sql);
}
function loadall_product($kyw = "", $iddm = 0) {
    $sql = "SELECT * FROM product WHERE 1";

    if ($kyw != "") {
        $sql .= " AND product_name LIKE '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " AND genre_id = '" . $iddm . "'";
    }

    $sql .= " ORDER BY product_id DESC";
    $listsanpham = pdo_query($sql);

    return $listsanpham;
}

function loadone_sanpham($id){
    $sql="select * from product where product_id=".$id;
    $dm=pdo_query_one($sql);
    return $dm;
}
function update_sanpham($id,$name,$price,$hinh,$content,$soluong,$view,$genre_id){
    if($hinh!="")
        $sql="update product set genre_id='".$genre_id."',product_name ='".$name."',product_price='".$price."',product_content='".$content."',product_img='".$hinh."',product_view='".$view."',product_quantity='".$soluong."' where product_id=".$id;
    else
        $sql="update product set genre_id='".$genre_id."',product_name ='".$name."',roduct_price='".$price."',product_content ='".$content."',product_quantity='".$soluong."' where product_id=".$id;
    pdo_execute($sql);
}
function loadsp_cungLoai($id,$iddm){
    $sql="select*from product where genre =$iddm and product_id <> $id";
    $result=pdo_query($sql);
    return $result;
}


?>
