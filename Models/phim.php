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
    where danhmuc.trang_thai=0 and phim.trang_thai=0
    ORDER BY id_phim DESC";
    $data = pdo_query($sql);
    return $data;
}
#danh sách xóa
function getTrashFilm(){
    $sql = "SELECT danhmuc.ten_danh_muc , phim.* FROM phim
    INNER JOIN danhmuc ON danhmuc.id_danh_muc = phim.id_danh_muc
    where  phim.trang_thai=1
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
#update phim
function updateFilm($id_phim,$ten_phim ,$mo_ta ,$thoi_gian,$danh_muc ,$img_name){
    if($img_name==""){
        $sql="update phim set ten_phim='$ten_phim',mo_ta='$mo_ta',thoi_luong='$thoi_gian',id_danh_muc='$danh_muc' where id_phim='$id_phim'";
        pdo_execute($sql);
    }else{
        $sql="update phim set ten_phim='$ten_phim',mo_ta='$mo_ta',thoi_luong='$thoi_gian',id_danh_muc='$danh_muc',anh_bia='$img_name' where id_phim='$id_phim'";
        pdo_execute($sql);
    }
}
#delete phim
function deleteFilm($id_phim){
    $sql="update phim set trang_thai=1 where id_phim=$id_phim";
    pdo_execute($sql);
} 
#restore phim
function restoreFilm($id_phim){
    $sql="update phim set trang_thai=0 where id_phim=$id_phim";
    pdo_execute($sql);
} 

