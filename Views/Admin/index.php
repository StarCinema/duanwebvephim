<?php
session_start();
require_once './view/header.php';
require_once '../../Models/pdo.php';
require_once '../../Models/danhmuc.php';
require_once '../../Models/phongChieu.php';
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
            # code...
            break;
        case 'trashCanAccount':
            # code...
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