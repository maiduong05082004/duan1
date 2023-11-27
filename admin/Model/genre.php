
<?php

function load_ten_dm($iddm){
    if($iddm>0){
    $sql="select*from genre where genre_id=".$iddm;
    $dm=pdo_query_one($sql);
    extract($dm);
    return $name;
    }else{
        return "";
    }
}
//admin_danhmuc
function insert_danhmuc($tenloai){
    $sql="insert into genre (genre_name) values ('$tenloai')";
    pdo_execute($sql);
}
function delete_danhmuc($id){
    $sql="delete from genre where genre_id=".$id;
    pdo_execute($sql);
}
function loadall_danhmuc(){
    $sql="select*from genre order by genre_id ASC ";
    $listdanhmuc=pdo_query($sql);
    return $listdanhmuc;
}

function loadone_danhmuc($id){
    $sql="select *from genre where genre_id=".$id;
    $dm=pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($id,$tenloai){
    $sql="update genre set genre_name = '.$tenloai.' where genre_id=".$id;
    pdo_execute($sql);
}
?>