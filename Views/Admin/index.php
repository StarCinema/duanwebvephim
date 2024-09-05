<?php
session_start();
require_once './view/header.php';
require_once '../../Models/pdo.php';
require_once '../../Models/danhmuc.php';
require_once '../../Models/phongChieu.php';
require_once '../../Models/taikhoan.php';
require_once '../../Models/phim.php';
require_once '../../Models/showtimes.php';

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
            $data = getFilm();
            require_once './view/film/list.php';
            break;
        case 'filmDetail':
            if (isset($_GET['idFilm'])) {
                $id_phim = $_GET['idFilm'];
                $data = getOneFilm($id_phim);
                extract($data);
            }
            require_once './view/film/deltai.php';
            break;
        case 'editFilm':
            if (isset($_GET['idFilm']) && $_GET['idFilm']) {
                $id_phim = $_GET['idFilm'];
                $oneFilm = getOneFilm($id_phim);
            }
            $listdanhmuc = getdanhmuc();
            require_once './view/film/fix.php';
            break;
        case 'updateFilm':
            $error = $loi_ten_phim = $loi_mo_ta = $loi_danh_muc = $loi_thoi_gian = "";
            $erCount = 0;
            if (isset($_POST['sua_btn']) && $_POST['sua_btn']) {
                $id_phim = $_POST['id_phim'];
                $ten_phim = $_POST['ten_phim'];
                $mo_ta = $_POST['mo_ta'];
                $thoi_gian = $_POST['thoi_gian'];
                $danh_muc = $_POST['danh_muc'];
                $img_name = $_FILES['image']['name'];
                $tmp = $_FILES['image']['tmp_name'];
                move_uploaded_file($tmp, '../../uploads/' . $img_name);
                if (empty($ten_phim)) {
                    $loi_ten_phim = "Không được để trống tên phim!";
                    $erCount++;
                }
                if (empty($mo_ta)) {
                    $loi_mo_ta = "Không được để trống mô tả!";
                    $erCount++;
                }
                if (empty($danh_muc)) {
                    $loi_danh_muc = "Không được để trống danh mục!";
                    $erCount++;
                }
                if (empty($thoi_gian)) {
                    $loi_thoi_gian = "Không được để trống thời lượng!";
                    $erCount++;
                }
                if ($erCount == 0) {
                    updateFilm($id_phim, $ten_phim, $mo_ta, $thoi_gian, $danh_muc, $img_name);
                    $thong_bao = "Cập nhập thành công!";
                    echo "<script>
                    alert('Cập nhập thành công!');
                    window.location.href = 'index.php?act=film';
                    </script>";
                    exit();
                } else {
                    $error = "Lỗi nhập liệu, vui lòng nhập lại!";
                }

            }
            $listdanhmuc = getdanhmuc();
            $data = getFilm();
            require_once './view/film/list.php';
            break;
        case 'addFilm':
            $listdanhmuc = getdanhmuc();
            $error = $loi_ten_phim = $loi_mo_ta = $loi_danh_muc = $loi_thoi_gian = $loi_anh = "";
            $erCount = 0;
            if (isset($_POST['addBtn'])) {
                $ten_phim = $_POST['ten_phim'];
                $mo_ta = $_POST['mo_ta'];
                $thoi_gian = $_POST['thoi_gian'];
                $danh_muc = $_POST['danh_muc'];
                $trangthai = 0;
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $ngay_tao = date('Y-m-d H:i:s');
                if (empty($ten_phim)) {
                    $loi_ten_phim = "Không được để trống tên phim!";
                    $erCount++;
                }
                if (empty($mo_ta)) {
                    $loi_mo_ta = "Không được để trống mô tả!";
                    $erCount++;
                }
                if (empty($danh_muc)) {
                    $loi_danh_muc = "Không được để trống danh mục!";
                    $erCount++;
                }
                if (empty($thoi_gian)) {
                    $loi_thoi_gian = "Không được để trống thời lượng!";
                    $erCount++;
                }
                if (empty($_FILES['anh']['name'])) {
                    $loi_hinh_anh = "Không được để trống ảnh!";
                    $erCount++;
                }
                if ($erCount == 0) {
                    $img_name = $_FILES['anh']['name'];
                    $tmp = $_FILES['anh']['tmp_name'];
                    move_uploaded_file($tmp, '../../uploads/' . $img_name);
                    insertFiml($ten_phim, $mo_ta, $thoi_gian, $danh_muc, $img_name, $ngay_tao, $trangthai);
                    $thong_bao = "Thêm mới thành công!";
                } else {
                    $error = "Lỗi nhập liệu, vui lòng nhập lại!";
                }

            }
            require_once './view/film/add.php';
            break;

        case 'trashCanFilm':
            $listTrash = getTrashFilm();
            require_once './view/film/list_delete.php';
            break;
        case 'deleteFilm';
            if (isset($_GET['idFilm'])) {
                $id_phim = $_GET['idFilm'];
                deleteFilm($id_phim);

            }

            $data = getFilm();
            require_once './view/film/list.php';
            break;
        case 'restoreFilm';
            if (isset($_GET['idFilm'])) {
                $id_phim = $_GET['idFilm'];
                restoreFilm($id_phim);

            }
            $listTrash = getTrashFilm();
            require_once './view/film/list_delete.php';
            break;
        case 'cinemaRoom':
            $data = getRoom();
            require_once './view/cinemaroom/list.php';
            break;
        case 'addRoom':
            $error = $loi_ten_phong = $loi_so_hang = $loi_so_ghe_moi_hang = "";
            $erCount = 0;
            if (isset($_POST['addBtn'])) {
                $ten_phong = $_POST['ten_phong'];
                $so_hang = $_POST['so_hang'];
                $so_ghe_moi_hang = $_POST['so_ghe_moi_hang'];
                $tong_so_ghe = $so_hang * $so_ghe_moi_hang;
                $trangthai = 0;
                if (empty($ten_phong)) {
                    $loi_ten_phong = 'Không được để trống tên phòng chiếu!';
                    $erCount++;
                }
                if (empty($so_hang)) {
                    $loi_so_hang = 'Không được để trống số hàng!';
                    $erCount++;
                }
                if (empty($so_ghe_moi_hang)) {
                    $loi_so_ghe_moi_hang = 'Không được để trống số ghế mỗi hàng!';
                    $erCount++;
                }
                if ($erCount == 0) {
                    insertRoom($ten_phong, $tong_so_ghe, $so_hang, $so_ghe_moi_hang, $trangthai);
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $ngay_tao = date('Y-m-d H:i:s');
                    $idRoom = getId();
                    // Tạo ghế và thêm vào cơ sở dữ liệu
                    for ($row = 1; $row <= $so_hang; $row++) {
                        for ($seat = 1; $seat <= $so_ghe_moi_hang; $seat++) {
                            $ten_ghe = chr(64 + $row) . $seat; // Tạo tên ghế (A1, B2, ...)
                            insertGhe($idRoom, $row, $seat, $trangthai, $ten_ghe);
                        }
                    }
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
            if (isset($_GET['idRoom'])) {
                $id_phong = $_GET['idRoom'];
            }
            $data = getOneRoom($id_phong);
            extract($data);
            require_once './view/cinemaroom/fix.php';
            break;
        case 'updateRoom':
            if (isset($_POST['updateBtn'])) {
                $id_phong = $_POST['id_phong'];
                $ten_phong = $_POST['ten_phong'];
                $so_hang = $_POST['so_hang'];
                $so_ghe_moi_hang = $_POST['so_ghe_moi_hang'];
                $tong_so_ghe = $so_hang * $so_ghe_moi_hang;
                $trangthai = 0;
                updateRoom($id_phong, $ten_phong, $tong_so_ghe, $so_hang, $so_ghe_moi_hang);
                deleteSeatsByRoom($id_phong);
                // Tạo ghế và thêm vào cơ sở dữ liệu
                for ($row = 1; $row <= $so_hang; $row++) {
                    for ($seat = 1; $seat <= $so_ghe_moi_hang; $seat++) {
                        $ten_ghe = chr(64 + $row) . $seat; // Tạo tên ghế (A1, B2, ...)
                        insertGhe($id_phong, $row, $seat, $trangthai, $ten_ghe);
                    }
                }
            }
            $data = getRoom();
            require_once './view/cinemaroom/list.php';
            break;
        case 'trashCanRoom':
            $data = getRoomTr();
            require_once './view/cinemaroom/list_delete.php';
            break;
        case 'restoreRoom':
            if (isset($_GET['idRoom'])) {
                $id_phong = $_GET['idRoom'];
                restoreRoom($id_phong);
            } else {
                $id_phong = "";
                restoreRoom($id_phong);
            }
            $data = getRoomTr();
            require_once './view/cinemaroom/list_delete.php';
            break;
        case 'roomDetail':
            if (isset($_GET['idRoom'])) {
                $id_phong = $_GET['idRoom'];
            }
            $data = getOneRoom($id_phong);
            $seats = getSeats($id_phong);
            $emptySeats = get0Seats($id_phong);
            extract($data);
            require_once './view/cinemaroom/detailRoom.php';
            break;
        case 'account':
            $listAllaccount = getAllaccount();
            require_once './view/account/list.php';
            break;
        case 'detailAcc':
            if (isset($_GET['idAcc']) && $_GET['idAcc']) {
                $id_taikhoan = $_GET['idAcc'];
                $oneAccount = getOneaccount($id_taikhoan);
            }
            require_once './view/account/detail.php';

            break;
        case 'addAcc':
            $error = $erUsername = $ername = $erEmail = $erPhone = $erPassword = $erVaitro = "";
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
                $vaitro = $_POST['vai_tro'];
                $hinh_anh = $_FILES['image']['name'];
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
                        insertAccount2($ten_dang_nhap, $ho_va_ten, $email, $hinh_anh, $phone, $passwordHash, $vaitro, $trangthai);
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
            if (isset($_GET['idAcc']) && $_GET['idAcc']) {
                $id_taikhoan = $_GET['idAcc'];
                deleteAccount($id_taikhoan);
            }
            $listAllaccount = getAllaccount();
            require_once './view/account/list.php';

            break;
        case 'editAccount':
            if (isset($_GET['idAcc']) && $_GET['idAcc']) {
                $id_taikhoan = $_GET['idAcc'];
                $oneAccount = getOneaccount($id_taikhoan);
            }
            require_once './view/account/fix.php';
            break;
        case 'trashCanAccount':
            $listTrash = getAllaccounttrash();
            require_once './view/account/list_delete.php';

            break;
        case 'restoreAcc':
            # code...xóa
            if (isset($_GET['idAcc']) && $_GET['idAcc']) {
                $id_taikhoan = $_GET['idAcc'];
                restoreAccount($id_taikhoan);
            }
            $listTrash = getAllaccounttrash();
            require_once './view/account/list_delete.php';

            break;
        case 'updateAccount':
            $error = $erUsername = $ername = $erPhone = "";
            $erCount = 0;
            if (isset($_POST['sua_btn'])) {
                $id_taikhoan = $_POST['id_taikhoan'];
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $ho_va_ten = $_POST['ho_va_ten'];

                $phone = $_POST['sdt'];

                $vaitro = $_POST['vai_tro'];
                $hinh_anh = $_FILES['image']['name'];
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

                    updateAccount($id_taikhoan, $ten_dang_nhap, $ho_va_ten, $hinh_anh, $phone, $vaitro);
                    echo "<script>
                        alert('Cập nhập thành công!');
                        window.location.href = 'index.php?act=account';
                        </script>";
                    exit();
                }
            }

            require_once './view/account/fix.php';
            break;
        case 'showFilm':
            $listAllShow = getShows();
            require_once './view/showFilm/list.php';
            break;
        case 'addShowFilm':
            $phim = getFilm();
            $data = getRoom();

            $erCount = 0;
            if (isset($_POST['add_btn']) && $_POST['add_btn']) {
                $id_phim = $_POST['id_phim'];
                $id_phong = $_POST['id_phong'];
                $thoi_gian_bat_dau = $_POST['thoi_gian_bat_dau'];
                $thoi_gian_ket_thuc = $_POST['thoi_gian_ket_thuc'];
                $trang_thai = 0;
                $ngay_tao = date("Y-m-d H:i:s");

                // Định dạng lại thời gian cho phù hợp với kiểu DATETIME của SQL
                if (!empty($thoi_gian_bat_dau)) {
                    $thoi_gian_bat_dau = date("Y-m-d H:i:s", strtotime($thoi_gian_bat_dau));
                }
                if (!empty($thoi_gian_ket_thuc)) {
                    $thoi_gian_ket_thuc = date("Y-m-d H:i:s", strtotime($thoi_gian_ket_thuc));
                }

                #validate
                if (empty($id_phim)) {
                    $erPhim = "Không được để trống tên phim";
                    $erCount++;
                }
                if (empty($id_phong)) {
                    $erPhong = "Không được để trống phòng";
                    $erCount++;
                }

                if (empty($thoi_gian_bat_dau)) {
                    $erTimesfirst = "Không được để trống thời gian";
                    $erCount++;
                }
                if (empty($thoi_gian_ket_thuc)) {
                    $erTimesend = "Không được để trống thời gian";
                    $erCount++;
                }
                if ($thoi_gian_bat_dau >= $thoi_gian_ket_thuc) {
                    $erTime = "Thời gian nhập vào không phù hợp";
                    $erCount++;
                }
                if ($erCount == 0) {
                    $check = ckeckTime($id_phim, $id_phong, $thoi_gian_bat_dau, $thoi_gian_ket_thuc);

                    if ($check) {
                        echo "<script>
                        alert('Thêm không thành công!');
                        window.location.href = 'index.php?act=addShowFilm';
                        </script>";
                        exit();
                    } else {
                        insertShows($id_phim, $id_phong, $thoi_gian_bat_dau, $thoi_gian_ket_thuc, $trang_thai, $ngay_tao);
                        echo "<script>
                        alert('Thêm thành công!');
                        window.location.href = 'index.php?act=showFilm';
                        </script>";
                        exit();

                    }
                }

            }

            require_once './view/showFilm/add.php';
            break;
        case 'showtimeDetail':
            if (isset($_GET['idShowtime']) && $_GET['idShowtime']) {
                $id = $_GET['idShowtime'];
                $oneShow = getOneShows($id);
            }

            require_once './view/showFilm/showtimeDetail.php';

            break;
        case 'deleteShowtime':
            if (isset($_GET['idShowtime']) && $_GET['idShowtime']) {
                $id = $_GET['idShowtime'];
                deleteShows($id);
            }
            $listAllShow = getShows();
            require_once './view/showFilm/list.php';

            break;
        case 'editShowtime':
            $phim = getFilm();
            $data = getRoom();
            if (isset($_GET['idShowtime']) && $_GET['idShowtime']) {
                $id = $_GET['idShowtime'];
                $oneShows = getOneShows($id);
            }

            require_once './view/showFilm/fix.php';
            break;
        case 'updateShowtime':
            $phim = getFilm();
            $data = getRoom();

            $erCount = 0;
            if (isset($_POST['up_btn']) && $_POST['up_btn']) {
                $id = $_POST['id'];
                $id_phim = $_POST['id_phim'];
                $id_phong = $_POST['id_phong'];
                $thoi_gian_bat_dau = $_POST['thoi_gian_bat_dau'];
                $thoi_gian_ket_thuc = $_POST['thoi_gian_ket_thuc'];
                $trang_thai = $_POST['trang_thai'];


                // Định dạng lại thời gian cho phù hợp với kiểu DATETIME của SQL
                if (!empty($thoi_gian_bat_dau)) {
                    $thoi_gian_bat_dau = date("Y-m-d H:i:s", strtotime($thoi_gian_bat_dau));
                }
                if (!empty($thoi_gian_ket_thuc)) {
                    $thoi_gian_ket_thuc = date("Y-m-d H:i:s", strtotime($thoi_gian_ket_thuc));
                }
                // $check=ckeckTime2($id_phong,$thoi_gian_bat_dau, $thoi_gian_ket_thuc);
                #validate
                if (empty($id_phim)) {
                    $erPhim = "Không được để trống tên phim";
                    $erCount++;
                }
                if (empty($id_phong)) {
                    $erPhong = "Không được để trống phòng";
                    $erCount++;
                }

                if (empty($thoi_gian_bat_dau)) {
                    $erTimesfirst = "Không được để trống thời gian";
                    $erCount++;
                }
                if (empty($thoi_gian_ket_thuc)) {
                    $erTimesend = "Không được để trống thời gian";
                    $erCount++;
                }

                if ($erCount == 0) {
                    updateShows($id, $id_phim, $id_phong, $thoi_gian_bat_dau, $thoi_gian_ket_thuc, $trang_thai);
                    echo "<script>
                        alert('Cập nhập thành công!');
                        window.location.href = 'index.php?act=showFilm';
                        </script>";
                    exit();
                }
            }
            require_once './view/showFilm/fix.php';
            break;
        case 'trashCanShowFilm':
            # code...
            $listDelete = getTrashShows();
            require_once './view/showFilm/listDelete.php';

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