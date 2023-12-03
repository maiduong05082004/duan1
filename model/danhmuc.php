<?php
    function insert_genre($tenloai){
        $sql="insert into genre(genre_name) values('$tenloai')";
        pdo_execute($sql);
    }
    function delete_genre($id){
        $sql="delete from genre where genre_id=".$id;
        pdo_execute($sql);
    }  
    function loadall_genre(){
        $sql="SELECT * FROM genre order by genre_id desc";
        $listdanhmuc=pdo_query($sql);
        return  $listdanhmuc;
    }
    function loadone_danhmuc($id){
        $sql="select * from genre where genre_id=".$id;
        $dm=pdo_query_one($sql);
        return $dm;
    }
    function update_danhmuc($id,$tenloai){
        $sql="update genre set genre_name=? where genre_id=?";
        pdo_execute($sql,$tenloai,$id);  
    }
    
?>