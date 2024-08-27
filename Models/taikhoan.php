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
#--------------- đăng nhập
#check tài khoản đăng nhập
function checkAccount2($email){
  $sql = "SELECT * FROM taikhoan WHERE email = '$email'";
  $check = pdo_query_one($sql);
  return $check;
}