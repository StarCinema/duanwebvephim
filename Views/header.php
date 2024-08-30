<?php
$path = 'http://localhost/duanwebvephim';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?php echo $path; ?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $path; ?>/public/assets/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $path; ?>/public/assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo $path; ?>/public/assets/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo $path; ?>/public/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo $path; ?>/public/assets/css/odometer.css">
    <link rel="stylesheet" href="<?php echo $path; ?>/public/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $path; ?>/public/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo $path; ?>/public/assets/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo $path; ?>/public/assets/css/jquery.animatedheadline.css">
    <link rel="stylesheet" href="<?php echo $path; ?>/public/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo $path; ?>/public/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="shortcut icon" href="<?php echo $path; ?>/public/assets/images/favicon.png"
        type="image/x-icon">
    <title>Duan đặt vé xem phim</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="overlay"></div>
    <a href="#0" class="scrollToTop">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- ==========Overlay========== -->

    <!-- ==========Header-Section========== -->
    <header class="header-section">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="index.php">
                        <h5>Star Cinema</h5>

                    </a>
                </div>
                <ul class="menu">
                    <li class="">
                        <a href="index.php" class="active">Trang Chủ</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="">Phim</a>
                        <ul class="submenu">
                            <li>
                                <a href="index.php?act=genre">Loại phim</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="contact">Liên hệ</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#0">Xem Thêm</a>
                        <ul class="submenu">
                            <li>

                                <a href="">Quản lý vé đặt</a>

                                <a href="my_ticket">Quản lý vé đặt</a>

                            </li>
                        </ul>
                    </li>
                    <?php
                     if(!isset($_SESSION['user'])){
                        ?>

                    <div class="logIn">
                        <li class="header-button pr-0">
                            <a href="index.php?act=logIn">Đăng nhập</a>
                        </li>
                    </div>
                    <?php} else{?>
                        <div class="logIn">
                        
                    </div>
                    <?php
                    }?>
                    <li class="menu-item-has-children">
                        <i class="fa-solid fa-user" style="margin-left: 10px">
                        </i>
                        <ul class="submenu">
                        <?php
                            if(isset($_SESSION['user'])){
                            if ($_SESSION['user']['vai_tro'] == 0){
                                ?>
                                <li style="margin: inherit; color: #000">Xin chào<b>,<?php echo $_SESSION['user']['ten_dang_nhap'] ?> </b><br>
                                <a href='index.php?act=logOut'>Đăng xuất</a>
                            </li>
                              <?php
                            }
                            if ($_SESSION['user']['vai_tro'] == 1){
                                ?>
                                <li style="margin: inherit; color: #000">Xin chào<b>,<?php echo $_SESSION['user']['ten_dang_nhap'] ?> </b><br>
                                <a href='Views\Admin\index.php'>Đăng nhập Admin</a>
                                <a href='index.php?act=logOut'>Đăng xuất</a>
                               
                            </li>
                              <?php
                            }


                            }else {
                                ?>
                                <li style="margin: inherit; color: #000"><b>Tài khoản khách</b><br>
                              
                            </li>
                              <?php
                            }
                            ?> 
                        </ul>
                    </li>
                </ul>
                <div class="header-bar d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>



   