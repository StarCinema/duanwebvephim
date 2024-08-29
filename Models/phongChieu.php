<?php 
#check phòng
function checkRoom($ten_phong){
$sql = "SELECT *FROM  phongchieu WHERE ten_phong = '$ten_phong'";
$check = pdo_query($sql);
return $check;
}
#thêm phòng
function insertRoom($ten_phong,$suc_chua,$trang_thai){
    $sql = "INSERT INTO phongchieu(ten_phong,suc_chua,trang_thai) VALUES('$ten_phong','$suc_chua','$trang_thai')";
    pdo_execute($sql);
}
#show all phòng
function getRoom(){
    $sql = "SELECT *FROM phongchieu WHERE trang_thai = 0";
    $data = pdo_query($sql);
    return $data;
}
#show 1 phòng
function getOneRoom($id_phong){
    $sql = "SELECT *FROM phongchieu WHERE id_phong = '$id_phong' AND trang_thai = 0";
    $data = pdo_query_one($sql);
    return $data;
}
#show thùng rác
function getRoomTr(){
    $sql = "SELECT *FROM phongchieu WHERE trang_thai = 1";
    $data = pdo_query($sql);
    return $data;
}
#xoa phong
function deleteRoom($id_phong){
    $sql = "UPDATE phongchieu SET trang_thai = 1 WHERE id_phong = '$id_phong'";
    pdo_execute($sql);
}
#khôi phục
function restoreRoom($id_phong){
    if(!$id_phong){
        $sql = "UPDATE phongchieu SET trang_thai = 0";
    }else{
        $sql = "UPDATE phongchieu SET trang_thai = 0 WHERE id_phong = '$id_phong'";
    }
    pdo_execute($sql);
}
#sửa phòng 
function updateRoom($id_phong,$ten_phong,$suc_chua){
    $sql = "UPDATE phongchieu SET ten_phong = '$ten_phong',suc_chua = '$suc_chua' WHERE id_phong = '$id_phong'";
    pdo_execute($sql);
}
