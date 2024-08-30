<?php
session_start();
require_once './view/header.php';
require_once '../../Models/pdo.php';
require_once '../../Models/danhmuc.php';
require_once '../../Models/phongChieu.php';
require_once '../../Models/taikhoan.php';

# Xử lý Swich case.
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'genre':
            $listdanhmuc = getdanhmuc();
            // var_dump($listdanhmuc);
            require_once './view/genre/list.php';
            break;
        case 'addGenre':
            if (isset($_POST['add_Btn']) && $_POST['add_Btn']) {
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $check = checkdanhmuc($ten_danh_muc);
                if ($ten_danh_muc != "" && $check == false) {
                    insertdanhmuc($ten_danh_muc);
                    $thong_bao = "Thêm danh mục thành công.";

                } else {
                    $thong_bao = "Thông tin bị trống hoặc đã tồn tại. Mời bạn nhập lại thông tin.";
                }
            }
            $listdanhmuc = getdanhmuc();
            require_once './view/genre/list.php';

            break;
        case 'deleteGenre':
            if (isset($_GET['idGenre']) && $_GET['idGenre']) {
                $id_danh_muc = $_GET['idGenre'];
                deletedanhmuc($id_danh_muc);
            }
            $listdanhmuc = getdanhmuc();
            require_once './view/genre/list.php';
            break;
        case 'trashCanGenre':
            $listdelete = getdanhmucdelete();
            require_once './view/genre/list_delete.php';
            break;
        case 'restoreGenre':
            # code...khôi phục
            if (isset($_GET['idGenre']) && $_GET['idGenre']) {
                $id_danh_muc = $_GET['idGenre'];
                restoredanhmuc($id_danh_muc);
            }
            $listdelete = getdanhmucdelete();
            require_once './view/genre/list_delete.php';

            break;
        case 'restoreGenreAll':
            restoreAlldanhmuc();
            $listdelete = getdanhmucdelete();
            require_once './view/genre/list_delete.php';
            break;
        case 'editGenre':
            if (isset($_GET['idGenre']) && $_GET['idGenre']) {
                $id_danh_muc = $_GET['idGenre'];
                $getone = getonedanhmuc($id_danh_muc);
            }
            require_once './view/genre/fix.php';
            break;
        case 'updateGenre':
            if (isset($_POST['sua_btn']) && $_POST['sua_btn']) {
                $id_danh_muc = $_POST['id_danh_muc'];
                $ten_danh_muc = $_POST['ten_danh_muc'];
                updatedanhmuc($id_danh_muc, $ten_danh_muc);
                $thong_bao = "Cập nhập thành công.";
            }
            $listdanhmuc = getdanhmuc();
            require_once './view/genre/list.php';
            break;

        case 'film':
            $listdanhmuc = getdanhmuc();
            require_once './view/film/list.php';
            break;
        case 'filmDetail':
            require_once './view/film/deltai.php';
            break;
        case 'editFilm':
            require_once './view/film/fix.php';
            break;
        case 'addFilm':
            $listdanhmuc = getdanhmuc();
            require_once './view/film/add.php';
            break;
        case 'trashCanFilm':
            require_once './view/film/list_delete.php';
            break;
        case 'cinemaRoom':
            if (isset($_POST['addBtn'])) {
                $ten_phong = $_POST['nameRoom'];
                $suc_chua = $_POST['sucChua'];
                $trang_thai = 0;
                $check = checkRoom($ten_phong);
                #validate
                if (empty($ten_phong) || empty($suc_chua) || $check != false) {
                    $thong_bao = "Thông tin bị trống hoặc đã tồn tại. Mời bạn nhập lại thông tin.";
                } else {
                    insertRoom($ten_phong, $suc_chua, $trang_thai);
                    $thong_bao = "Thêm mới phòng thành công.";
                }
            }
            $data = getRoom();
            require_once './view/cinemaroom/list.php';
            break;
        case 'deleteRoom':
            if (isset($_GET['idRoom']) && $_GET['idRoom']) {
                $id_phong = $_GET['idRoom'];
                deleteRoom($id_phong);
            }
            $data = getRoom();
            require_once './view/cinemaroom/list.php';
            break;
        case 'editRoom':
            if(isset($_GET['idRoom'])){
                $id_phong = $_GET['idRoom'];
            }
            $data =  getOneRoom($id_phong);
            extract($data);
            require_once './view/cinemaroom/fix.php';
            break;
            case 'updateRoom':
            if(isset($_POST['updateBtn'])){
                $id_phong = $_POST['id_phong'];
                $ten_phong = $_POST['ten_phong'];
                $suc_chua = $_POST['suc_chua'];
                updateRoom($id_phong,$ten_phong,$suc_chua);
                $thong_bao = 'Sửa thành công!';
            }
                $data = getRoom();
                require_once './view/cinemaroom/list.php';
                break;
        case 'trashCanRoom':
            $data = getRoomTr();
            require_once './view/cinemaroom/list_delete.php';
            break;
        case 'restoreRoom':
            if(isset($_GET['idRoom'])){
                $id_phong = $_GET['idRoom'];
                restoreRoom($id_phong);
            }else{
                $id_phong = "";
                restoreRoom($id_phong);  
            }
            $data = getRoomTr();
            require_once './view/cinemaroom/list_delete.php';
            break;
        case 'account':
            $listAllaccount=getAllaccount();
            require_once './view/account/list.php';
            break;
        case 'detailAcc':
            if(isset($_GET['idAcc'])&& $_GET['idAcc']){
                $id_taikhoan=$_GET['idAcc'];
                $oneAccount=getOneaccount($id_taikhoan);
            }
            require_once './view/account/detail.php';
           
            break;
        case 'addAcc':
            $error = $erUsername = $ername = $erEmail = $erPhone = $erPassword =$erVaitro= "";
            $erCount = 0;
            if (isset($_POST['them_btn'])) {
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $ho_va_ten = $_POST['ho_va_ten'];
                $email = $_POST['email'];
                $phone = $_POST['sdt'];
                $password = $_POST['password'];
                $passwordHash = password_hash($password, PASSWORD_BCRYPT);
                $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
                $trangthai = 0;
                $vaitro =$_POST['vai_tro'];
                $hinh_anh=$_FILES['image']['name'];
                $tmp = $_FILES['image']['tmp_name'];
                move_uploaded_file($tmp, '../../Uploads/' . $hinh_anh);

                #validate
                if (empty($ten_dang_nhap)) {
                    $erUsername = "Không được để trống username";
                    $erCount++;
                }
                if (empty($ho_va_ten)) {
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
              
                if ($erCount == 0) {
                    #check tài khoản
                    $check = checkAccount($ten_dang_nhap, $ho_va_ten, $email);
                    if ($check) {
                        $error = "Tài khoản này đã tồn tại!";
                    } else {
                        insertAccount2($ten_dang_nhap, $ho_va_ten, $email,$hinh_anh, $phone, $matkhau, $vaitro, $trangthai);
                        echo "<script>
                        alert('Đăng ký thành công!');
                        window.location.href = 'index.php?act=account';
                        </script>";
                        exit();
                    }
                }
            }
            require_once './view/account/add.php';

            break;
            
        case 'deleteAccount':
            # code...xóa
            if(isset($_GET['idAcc'])&& $_GET['idAcc']){
                $id_taikhoan=$_GET['idAcc'];
                deleteAccount($id_taikhoan);
            }
            $listAllaccount=getAllaccount();
            require_once './view/account/list.php';

            break;
        case 'editAccount':
            if(isset($_GET['idAcc'])&& $_GET['idAcc']){
                $id_taikhoan=$_GET['idAcc'];
                $oneAccount=getOneaccount($id_taikhoan);
            }
            require_once './view/account/fix.php';
            break;
        case 'trashCanAccount':
            $listTrash=getAllaccounttrash();
            require_once './view/account/list_delete.php';

            break;
        case 'restoreAcc':
                # code...xóa
                if(isset($_GET['idAcc'])&& $_GET['idAcc']){
                    $id_taikhoan=$_GET['idAcc'];
                    restoreAccount($id_taikhoan);
                }
                $listTrash=getAllaccounttrash();
                require_once './view/account/list_delete.php';
    
                break;
        case 'updateAccount':
            $error = $erUsername = $ername = $erPhone ="";
            $erCount = 0;
            if (isset($_POST['sua_btn'])) {
                $id_taikhoan=$_POST['id_taikhoan'];
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $ho_va_ten = $_POST['ho_va_ten'];
                
                $phone = $_POST['sdt'];
                
                $vaitro =$_POST['vai_tro'];
                $hinh_anh=$_FILES['image']['name'];
                $tmp = $_FILES['image']['tmp_name'];
                move_uploaded_file($tmp, '../../Uploads/' . $hinh_anh);

                #validate
                if (empty($ten_dang_nhap)) {
                    $erUsername = "Không được để trống username";
                    $erCount++;
                }
                if (empty($ho_va_ten)) {
                    $erName = "Không được để trống name";
                    $erCount++;
                }
                
                if (empty($phone)) {
                    $erPhone = "Không được để trống phone";
                    $erCount++;
                }
                
                if ($erCount == 0) {
                    #check tài khoản
                    $check = checkAccount1($ten_dang_nhap, $ho_va_ten);
                    if ($check) {
                        $error = "Tài khoản này đã tồn tại!";
                    } else {
                        updateAccount($id_taikhoan,$ten_dang_nhap, $ho_va_ten, $hinh_anh, $phone, $vaitro);
                        echo "<script>
                        alert('Cập nhập thành công!');
                        window.location.href = 'index.php?act=account';
                        </script>";
                        exit();
                    }
                }
            }
            require_once './view/account/fix.php';
            break;
        case 'showFilm':
            # code...
            break;
        case 'trashCanShowFilm':
            # code...
            break;
        case 'ticket':
            # code...
            break;
        case 'trashCanTicket':
            # code...
            break;
        case 'comment':
            # code...
            break;
        case 'trashCanComment':
            # code...
            break;
        case 'orderTicket':
            # code...
            break;
        default:
            require_once './view/main.php';
            break;
    }
} else {
    require_once './view/main.php';
}

require_once './view/footer.php';