<?php
#--------------- đăng ký
#thêm tài khoản
function insertAccount($ten_dang_nhap, $ho_va_ten, $email, $phone, $matkhau, $vaitro, $trangthai)
{
    $sql = "INSERT INTO taikhoan(ten_dang_nhap,ho_va_ten,email,sdt,mat_khau,vai_tro,trang_thai) 
VALUES('$ten_dang_nhap','$ho_va_ten','$email','$phone','$matkhau','$vaitro','$trangthai')";
    pdo_execute($sql);
}
#check tài khoản
function checkAccount($ten_dang_nhap, $ho_va_ten, $email)
{
    $sql = "SELECT * FROM taikhoan WHERE ten_dang_nhap = '$ten_dang_nhap' OR ho_va_ten = '$ho_va_ten' OR email = '$email'";
    $check = pdo_query_one($sql);
    return $check;
}
function checkAccount1($ten_dang_nhap, $ho_va_ten)
{
    $sql = "SELECT * FROM taikhoan WHERE ten_dang_nhap = '$ten_dang_nhap' OR ho_va_ten = '$ho_va_ten'";
    $check = pdo_query_one($sql);
    return $check;
}
#--------------- đăng nhập
#check tài khoản đăng nhập
function checkAccount2($email){
  $sql = "SELECT * FROM taikhoan WHERE email = '$email'";
  $check = pdo_query_one($sql);
  return $check;
}
#-----tài khoản
#lấy danh sách tài khoản
function getAllaccount(){
    $sql="select*from taikhoan where trang_thai=0 order by id_taikhoan";
    $listAll=pdo_query($sql);
    return $listAll;
}
function getOneaccount($id_taikhoan) {
    $sql="select*from taikhoan where id_taikhoan=$id_taikhoan";
    $oneAcc=pdo_query_one($sql);
    return $oneAcc;
    
}
function insertAccount2($ten_dang_nhap, $ho_va_ten, $email,$hinh_anh, $phone, $matkhau, $vaitro, $trangthai)
{
    $sql = "INSERT INTO taikhoan(ten_dang_nhap,ho_va_ten,email,hinh_anh,sdt,mat_khau,vai_tro,trang_thai) 
VALUES('$ten_dang_nhap','$ho_va_ten','$email','$hinh_anh','$phone','$matkhau','$vaitro','$trangthai')";
    pdo_execute($sql);
}
function deleteAccount($id_taikhoan){
    $sql="update taikhoan set trang_thai=1 where id_taikhoan=$id_taikhoan";
    pdo_execute($sql);
}
function restoreAccount($id_taikhoan){
    $sql="update taikhoan set trang_thai=0 where id_taikhoan=$id_taikhoan";
    pdo_execute($sql);
}
function restoreAllAccount(){
    $sql="update taikhoan set trang_thai=0 where trang_thai=1";
    pdo_execute($sql);
}
function getAllaccounttrash(){
    $sql="select*from taikhoan where trang_thai=1 order by id_taikhoan";
    $listAll=pdo_query($sql);
    return $listAll;
}
function updateAccount($ten_dang_nhap, $ho_va_ten, $hinh_anh, $phone, $vaitro){
    if($hinh_anh==""){
        $sql="update taikhoan set ten_dang_nhap='$ten_dang_nhap',ho_va_ten='$ho_va_ten',sdt='$phone',vai_tro='$vaitro'";
        
    }

}