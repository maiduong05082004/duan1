<?php
function load_soluong_phim_dm()   {
    $sql ="SELECT movie_genre.genre_name AS genre_name, COUNT(*)
    AS total_movies 
    FROM movie JOIN movie_genre ON movie.genre_id = movie_genre.genre_id 
    GROUP BY movie_genre.genre_name";
    $listsoluongphim= pdo_query($sql);
    return $listsoluongphim;
}
function load_doanhthu() {
    $sql = "SELECT * FROM `doanhthu`";
    $listdoanhthu=pdo_query($sql);
    return $listdoanhthu;
}
function loadall_sp_of_genre(){
    $sql="SELECT c.genre_name, COUNT(p.product_id) AS product_count
    FROM genre c
    JOIN product p ON c.genre_id = p.genre_id
    GROUP BY c.genre_name";
    $listsanpham= pdo_query($sql);
    return $listsanpham;
}
function tongdoanhthutheongay(){
    $sql="SELECT DATE(ngaydathang) as SaleDate, SUM(CAST(bill_total AS DECIMAL(10, 2))) as TotalSales
    FROM bill
    GROUP BY DATE(ngaydathang)
    ORDER BY DATE(ngaydathang)";
        $listdoanhthu=pdo_query($sql);
        return $listdoanhthu;
}
function tonghangdaban(){
    $sql="SELECT g.genre_name, SUM(p.product_quantity) AS total_sold
    FROM product p
    JOIN genre g ON p.genre_id = g.genre_id
    GROUP BY g.genre_name";
    $listtonghang=pdo_query($sql);
    return $listtonghang;
}
?>