<?php
session_start();
ob_start();
require_once './Models/pdo.php';
require_once './Views/header.php';
require_once './Models/taikhoan.php';
# Xử lý Swich case.
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'register':
            $error = $erUsername = $ername = $erEmail = $erPhone = $erPassword = "";
            $erCount = 0;
            if (isset($_POST['btn_signup'])) {
                $username = $_POST['username'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];
                $passwordHash = password_hash($password, PASSWORD_BCRYPT);
                $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
                $trangthai = 0;
                $vaitro = 0;
                #validate
                if (empty($username)) {
                    $erUsername = "Không được để trống username";
                    $erCount++;
                }
                if (empty($name)) {
                    $erName = "Không được để trống name";
                    $erCount++;
                }
                if (empty($email)) {
                    $erEmail = "Không được để trống email";
                    $erCount++;
                }
                if (empty($phone)) {
                    $erPhone = "Không được để trống phone";
                    $erCount++;
                }
                if (empty($password)) {
                    $erPassword = "Không được để trống password";
                    $erCount++;
                }
                if (!preg_match($passwordPattern, $password)) {
                    $erPassword = "Mật khẩu phải ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường và số.";
                    $erCount++;
                }
                #đăng ký
                if ($erCount == 0) {
                    #check tài khoản
                    $check = checkAccount($username, $name, $email);
                    if ($check) {
                        $error = "Tài khoản này đã tồn tại!";
                    } else {
                        insertAccount($username, $name, $email, $phone, $passwordHash, $vaitro, $trangthai);
                        echo "<script>
                        alert('Đăng ký thành công!');
                        window.location.href = 'index.php?act=logIn';
                        </script>";
                        exit();
                    }
                }
            }
            require_once './Views/Account/register.php';
            break;
        case 'logIn':
            require_once './Views/Account/login.php';
            break;
        case 'logOut':
            # chức năng đăng xuất
            break;
        case 'genre':
            # loại phim
            break;
        case 'film':
            # phim
            break;
        case 'showTimes':
            # lịch chiếu
            break;
        case 'moviesShowing':
            # phim đang chiếu
            break;
        case 'upcomingMovies':
            # phim sắp chiếu
            break;
        case 'cinema':
            # rạp chiếu 
            break;
        case 'movieReview':
            # review phim
            break;
        case 'topMovies':
            # top phim
            break;
        case 'movieBlog':
            # blog phim
            break;
        case 'search':
            # tim kiếm
            break;
        case 'movieDetails':
            # chi tiết phim
            break;
        default:
            require_once './Views/main.php';
            break;
    }
} else {
    require_once './Views/main.php';
}
require_once './Views/footer.php';
ob_end_flush();