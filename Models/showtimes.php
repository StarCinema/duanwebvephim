<?php
function insertShows($id_phim,$id_phong,$thoi_gian_bat_dau, $thoi_gian_ket_thuc, $trang_thai,$ngay_tao){
    $sql="insert into showtimes (id_phim,id_phong,thoi_gian_bat_dau, thoi_gian_ket_thuc, trang_thai,ngay_tao) 
    values ('$id_phim','$id_phong','$thoi_gian_bat_dau', '$thoi_gian_ket_thuc', '$trang_thai','$ngay_tao')";
    pdo_execute($sql);
}
function getShows(){
    $sql="SELECT showtimes.*, phim.ten_phim, phongchieu.ten_phong
        FROM showtimes
        JOIN phim ON phim.id_phim = showtimes.id_phim
        JOIN phongchieu ON phongchieu.id_phong = showtimes.id_phong
        where showtimes.trang_thai=0 or showtimes.trang_thai=1
        order by id desc";
    $list=pdo_query($sql);
    return $list;
}
function getOneShows($id){
    $sql = "SELECT showtimes.*,showtimes.trang_thai as trang_thai_show, phim.ten_phim,phim.anh_bia, phongchieu.ten_phong
        FROM showtimes
        JOIN phim ON phim.id_phim = showtimes.id_phim
        JOIN phongchieu ON phongchieu.id_phong = showtimes.id_phong
        WHERE showtimes.id = '$id'";

    $list=pdo_query_one($sql);
    return $list;
}
function deleteShows($id){
    $sql="update showtimes set trang_thai=2 where id='$id'";
    pdo_execute($sql);
}
function getTrashShows(){
    $sql="SELECT showtimes.*, phim.ten_phim, phongchieu.ten_phong
        FROM showtimes
        JOIN phim ON phim.id_phim = showtimes.id_phim
        JOIN phongchieu ON phongchieu.id_phong = showtimes.id_phong
        where showtimes.trang_thai=2 ";
    $list=pdo_query($sql);
    return $list;
}
function ckeckTime($id_phim,$id_phong,$thoi_gian_bat_dau, $thoi_gian_ket_thuc){
    $sql="select*from showtimes where id_phim='$id_phim' and id_phong='$id_phong' and thoi_gian_bat_dau='$thoi_gian_bat_dau'and thoi_gian_ket_thuc='$thoi_gian_ket_thuc' ";
    pdo_query($sql);
}
function ckeckTime2($id_phong,$thoi_gian_bat_dau, $thoi_gian_ket_thuc){
    $sql="select*from showtimes where id_phong='$id_phong' and thoi_gian_bat_dau='$thoi_gian_bat_dau'and thoi_gian_ket_thuc='$thoi_gian_ket_thuc' ";
    pdo_query($sql);
}
function updateShows($id,$id_phim,$id_phong,$thoi_gian_bat_dau, $thoi_gian_ket_thuc, $trang_thai){
    $sql="update showtimes set id_phim='$id_phim',id_phong='$id_phong',thoi_gian_bat_dau='$thoi_gian_bat_dau',thoi_gian_ket_thuc='$thoi_gian_ket_thuc',trang_thai='$trang_thai' where id='$id'";
    pdo_execute($sql);
}