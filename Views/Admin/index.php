<?php
session_start();
require_once './view/header.php';
require_once '../../Models/pdo.php';
require_once '../../Models/danhmuc.php';
require_once '../../Models/phongChieu.php';
require_once '../../Models/phim.php';
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
            $data =getFilm();
            require_once './view/film/list.php';
            break;
        case 'filmDetail':
            if (isset($_GET['idFilm'])){
                $id_phim = $_GET['idFilm'];
                $data = getOneFilm($id_phim);
                extract($data);
            }
            require_once './view/film/deltai.php';
            break;
        case 'editFilm':
            require_once './view/film/fix.php';
            break;
        case 'addFilm':
            $listdanhmuc = getdanhmuc();
            $error = $loi_ten_phim = $loi_mo_ta = $loi_danh_muc = $loi_thoi_gian = $loi_anh = "";
            $erCount = 0;
            if (isset($_POST['addBtn'])){
                $ten_phim = $_POST['ten_phim'];
                $mo_ta = $_POST['mo_ta'];
                $thoi_gian = $_POST['thoi_gian'];
                $danh_muc = $_POST['danh_muc'];
                $trangthai = 0;
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $ngay_tao = date('Y-m-d H:i:s');
                if(empty($ten_phim)){
                    $loi_ten_phim = "Không được để trống tên phim!";
                    $erCount ++;
                }
                if(empty($mo_ta)){
                    $loi_mo_ta = "Không được để trống mô tả!";
                    $erCount ++;
                }
                if(empty($danh_muc)){
                    $loi_danh_muc = "Không được để trống danh mục!";
                    $erCount ++;
                }
                if(empty($thoi_gian)){
                    $loi_thoi_gian = "Không được để trống thời lượng!";
                    $erCount ++;
                }
                if (empty($_FILES['anh']['name'])) {
                    $loi_hinh_anh = "Không được để trống ảnh!";
                    $erCount++;
                }
                if ($erCount == 0){
                    $img_name = $_FILES['anh']['name'];
                    $tmp = $_FILES['anh']['tmp_name'];
                    move_uploaded_file($tmp,'../../uploads/'.$img_name );
                    insertFiml($ten_phim ,$mo_ta ,$thoi_gian,$danh_muc ,$img_name,$ngay_tao,$trangthai);
                    $thong_bao = "Thêm mới thành công!";
                }else {
                    $error = "Lỗi nhập liệu, vui lòng nhập lại!";
                }

            }
            require_once './view/film/add.php';
            break;
        case 'trashCanFilm':
            require_once './view/film/list_delete.php';
            break;
        case 'cinemaRoom':
            $data = getRoom();
            require_once './view/cinemaroom/list.php';
            break;
        case 'addRoom':
            $error = $loi_ten_phong  =$loi_so_hang= $loi_so_ghe_moi_hang = "";
            $erCount = 0;
            if (isset($_POST['addBtn'])){
                $ten_phong = $_POST['ten_phong'];
                $so_hang = $_POST['so_hang'];
                $so_ghe_moi_hang = $_POST['so_ghe_moi_hang'];
                $tong_so_ghe = $so_hang * $so_ghe_moi_hang;
                $trangthai = 0;
                if(empty($ten_phong)){
                    $loi_ten_phong = 'Không được để trống tên phòng chiếu!';
                    $erCount++;
                }
                if(empty($so_hang)){
                    $loi_so_hang = 'Không được để trống số hàng!';
                    $erCount++;
                }
                if(empty($so_ghe_moi_hang)){
                    $loi_so_ghe_moi_hang = 'Không được để trống số ghế mỗi hàng!';
                    $erCount++;
                }
                if ($erCount == 0){
                    insertRoom($ten_phong,$tong_so_ghe,$so_hang,$so_ghe_moi_hang,$trangthai);
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngay_tao = date('Y-m-d H:i:s');
                    $idRoom = getId();
                    insertSeatMap ($idRoom,$so_hang,$so_ghe_moi_hang,$trangthai,$ngay_tao);
                    $thong_bao = "Thêm thành công";
                }
            }
            require_once './view/cinemaroom/add.php';
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
                $so_hang = $_POST['so_hang'];
                $so_ghe_moi_hang = $_POST['so_ghe_moi_hang'];
                $tong_so_ghe = $so_hang * $so_ghe_moi_hang;
                $trangthai = 0;
                updateRoom($id_phong,$ten_phong,$tong_so_ghe,$so_hang,$so_ghe_moi_hang);
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
            require_once './view/ticket/list.php';
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