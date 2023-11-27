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

?>