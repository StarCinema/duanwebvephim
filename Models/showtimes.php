<?php
function insertShows($id_phim,$id_phong,$thoi_gian_bat_dau, $thoi_gian_ket_thuc, $trang_thai,$ngay_tao){
    $sql="insert into showtimes (id_phim,id_phong,thoi_gian_bat_dau, thoi_gian_ket_thuc, trang_thai,ngay_tao) 
    values ('$id_phim','$id_phong','$thoi_gian_bat_dau', '$thoi_gian_ket_thuc', '$trang_thai','$ngay_tao')";
    pdo_execute($sql);
}
function getShows(){
    $sql="select*from showtimes
     join phim on showtimes.id_phim=phim.id_phim
     join phongchieu on showtimes.id_phong=phongchieu.id_phong
     order by id";
    $list=pdo_query($sql);
    return $list;
}