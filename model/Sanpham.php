<?php
    function insert_sanpham($tensp,$giasp,$hinh,$mota,$view,$iddm){
        $sql="insert into product(product_name,product_price,product_img,product_content,product_view,genre_id) values('$tensp','$giasp','$hinh','$mota', '$view', '$iddm')";
        pdo_execute($sql);
    }
    function delete_sanpham($id){
        $sql="delete from product where product_id=".$id;
        pdo_execute($sql);
    }

    
   
    function loadall_sanpham_home(){
        $sql="SELECT * FROM product where 1 order by product_id desc limit 0,8";
        
        $listsanpham=pdo_query($sql);
        return  $listsanpham;
    }
    function loadall_sanpham($kyw,$iddm){
        $sql="SELECT * FROM product where 1";
        if ($kyw!="") {
            $sql.=" and product_name like '%".$kyw."%'";
        }
        if ($iddm>0) {
            $sql.=" and genre_id='".$iddm."'";
        }
        $sql.=" order by product_id desc";
        $listsanpham=pdo_query($sql);
        return  $listsanpham;
    }
    function load_ten_dm($iddm){
        if ($iddm>0) {
            $sql="select * from genre where genre_id=".$iddm;
            $dm=pdo_query_one($sql); 
            extract($dm);
            return $genre_name;
        }else{
            return "";
        }
       
    }
    function loadone_sanpham($id){
        $sql="select * from product where product_id=".$id;
        $sp=pdo_query_one($sql);    
        return $sp;
    }
    function load_sanpham_cungloai($id,$iddm){
        $sql="select * from product where genre_id=".$iddm." AND product_id <>".$id;
        $listsanpham=pdo_query($sql);
        return  $listsanpham;
    }
    function update_sanpham($idSP,$iddm,$tensp,$giasp,$hinh,$mota){
        if($hinh!=""){
        $sql="update product set genre_id='".$iddm."',product_name='".$tensp."',product_price='".$giasp."',product_img='".$hinh."',product_content='".$mota."' where product_id=".$idSP;
    }
    else
    $sql="update product set genre_id='".$iddm."', product_name='".$tensp."',product_price='".$giasp."',product_content='".$mota."' where product_id=".$idSP;
        pdo_execute($sql);  
    }
?>