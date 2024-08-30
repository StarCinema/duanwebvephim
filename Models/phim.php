<?php 
#thêm phim
function  insertFiml($ten_phim ,$mo_ta ,$thoi_gian,$danh_muc ,$img_name,$thoi_gian_tao,$trangthai){
    $sql = "INSERT INTO phim(ten_phim,id_danh_muc,thoi_luong,mo_ta,anh_bia,thoi_gian_tao,trang_thai) VALUES ('$ten_phim' ,'$danh_muc','$thoi_gian','$mo_ta ','$img_name','$thoi_gian_tao','$trangthai')";
    pdo_execute($sql);
}
#show phim
function getFilm(){
    $sql = "SELECT danhmuc.ten_danh_muc , phim.* FROM phim
    INNER JOIN danhmuc ON danhmuc.id_danh_muc = phim.id_danh_muc
    ORDER BY id_phim DESC";
    $data = pdo_query($sql);
    return $data;
}
#show 1 phim
function getOneFilm($id_phim){
    $sql = "SELECT danhmuc.ten_danh_muc , phim.* FROM phim
    INNER JOIN danhmuc ON danhmuc.id_danh_muc = phim.id_danh_muc
   WHERE id_phim = '$id_phim' ";
    $data = pdo_query_one($sql);
    return $data;
}