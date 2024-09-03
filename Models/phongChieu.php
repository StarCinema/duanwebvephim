<?php 
#check phòng
function checkRoom($ten_phong){
$sql = "SELECT *FROM  phongchieu WHERE ten_phong = '$ten_phong'";
$check = pdo_query($sql);
return $check;
}
#thêm phòng
function insertRoom($ten_phong,$tong_so_ghe,$so_hang,$so_ghe_moi_hang,$trangthai){
    $sql = "INSERT INTO phongchieu(ten_phong,tong_so_ghe,so_hang,so_ghe_moi_hang,trang_thai) VALUES('$ten_phong','$tong_so_ghe','$so_hang','$so_ghe_moi_hang','$trangthai')";
    pdo_execute($sql);
}
#thêm ghế
function insertGhe ($id_phong,$so_hang,$so_ghe_moi_hang,$trangthai,$ten_ghe){
    $sql = "INSERT INTO ghe(id_phong,so_hang,so_ghe,trang_thai,ten_ghe) VALUES('$id_phong','$so_hang','$so_ghe_moi_hang','$trangthai','$ten_ghe')";
    pdo_execute($sql);
}
#tìm id phòng
function getId(){
    $sql = "SELECT MAX(id_phong) AS last_id FROM phongchieu";
    $idNewRoom = pdo_query_one($sql);
    return $idNewRoom['last_id'];
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
function updateRoom($id_phong,$ten_phong,$tong_so_ghe,$so_hang,$so_ghe_moi_hang){
    $sql = "UPDATE phongchieu SET ten_phong = '$ten_phong',tong_so_ghe = '$tong_so_ghe',so_hang = '$so_hang',so_ghe_moi_hang= '$so_ghe_moi_hang'  WHERE id_phong = '$id_phong'";
    pdo_execute($sql);
}
#xóa ghế thừa 
function deleteSeatsByRoom($id_phong) {
    pdo_execute("DELETE FROM ghe WHERE id_phong = ?", $id_phong);
}


#lấy sơ đồ ghế 
function getSeats($id_phong){
    $sql = "SELECT * FROM ghe WHERE id_phong = '$id_phong'";
    $seats = pdo_query($sql);
    return $seats;
}

#lấy số ghế trống
function get0Seats($id_phong) {
    $sql = "SELECT COUNT(*) as empty_seat_count FROM ghe WHERE id_phong = '$id_phong' AND trang_thai = 0";
    $empty_seat_count = pdo_query($sql);
    return (int) $empty_seat_count[0]['empty_seat_count'];
}
