<!-- ==========Movie-Section========== -->
<section class="movie-section padding-top padding-bottom">
    <div class="container">
        <div class="row flex-wrap-reverse justify-content-center">
            <div class="col-lg-3 col-sm-10  mt-50 mt-lg-0">
                <!-- <div class="widget widget-search">
                    <h5 class="title">tìm kiếm</h5>
                    <form class="search-form" action="film" method="post">
                        <input type="text" name="kyw" placeholder="Tìm kiếm phim" required>
                        <input type="submit" value="Tìm kiếm" name="btnSubmit" class="btn_search"><i
                            class="flaticon-loupe"></i>
                    </form>
                </div> -->
                <div class="widget-1 widget-trending-search">
                    <h3 class="title">Thể Loại</h3>
                    <div class="widget-1-body">
                        <ul>
                        <?php 
                            foreach ($loai_phim as $key => $loai) {
                                // Chuyển chữ cái đầu tiên của tên danh mục thành chữ thường
                                $ten_danh_muc = lcfirst($loai['ten_danh_muc']);
                            ?>
                                <li>
                                    <a href="index.php?act=film&id_danhmuc=<?=$loai['id_danh_muc'] ?>"><?= htmlspecialchars($ten_danh_muc) ?></a>
                               </li>
                            <?php
                            }
                            ?>



                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 mb-50 mb-lg-0">
                <div class="filter-tab tab">
                    <div class="filter-area">
                        <div class="filter-main">
                            <div class="left">
                                <!-- <div class="item">
                                
                                </div> -->
                            </div>
                            <ul class="grid-button tab-menu">

                                <li>
                                    <i class="fas fa-th"></i>
                                </li>
                                <li class="active">
                                    <i class="fas fa-bars"></i>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="tab-area">
                        <div class="tab-item">
                            <div class="row mb-10 justify-content-center">
                                <?php foreach ($list_film as $movie_grid) {
                                    extract($movie_grid); ?>
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="movie-grid">
                                            <div class="movie-thumb c-thumb">
                                                <a href="index.php?act=movieDetails&idFilm=<?= $id_phim?>">
                                                    <img src="Uploads/<?= $anh_bia ?>" alt="movie">
                                                </a>
                                            </div>
                                            <div class="movie-content bg-one">
                                                <h5 class="title m-0">
                                                    <a
                                                        href="index.php?act=movieDetails&idFilm=<?= $id_phim?>"><?= $ten_phim ?></a>
                                                </h5>
                                                <ul class="movie-rating-percent">
                                                    <li>
                                                        <div class="thumb">
                                                            <img src="<?php echo $path ?>/public/assets/images/movie/tomato.png"
                                                                alt="movie">

                                                        </div>
                                                        <span class="content">88%</span>
                                                    </li>
                                                    <li>
                                                        <div class="thumb">
                                                            <img src="<?php echo $path ?>/public/assets/images/movie/cake.png"
                                                                alt="movie">
                                                        </div>
                                                        <span class="content">88%</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                } ?>

                            </div>
                        </div>
                        <div class="tab-item active">
                            <div class="movie-area mb-10">
                                <?php foreach ($list_film as $value) {
                                    extract($value); ?>
                                    <div class="movie-list">
                                        <div class="movie-thumb c-thumb">
                                            <a href="index.php?act=movieDetails&idFilm=<?= $id_phim?>"
                                                class="w-100 bg_img h-100" data-background="Uploads/<?= $anh_bia ?>">
                                                <img class="d-sm-none" src="Uploads/<?= $anh_bia ?>" alt="movie">
                                            </a>
                                        </div>
                                        <div class="movie-content bg-one">
                                            <h5 class="title">
                                                <a
                                                    href="index.php?act=movieDetails&idFilm=<?= $id_phim?>"><?php echo $ten_phim ?></a>
                                            </h5>
                                            <p class="duration"><?= $thoi_luong ?></p>
                                            <div class="movie-tags">
                                                <a href="#0"><?= $ten_danh_muc ?></a>
                                            </div>
                                            <div class="release">
                                                <span>Ngày khởi chiếu : </span> <a
                                                    href="#0"><?php echo $thoi_gian_tao ?></a>
                                            </div>
                                            <ul class="movie-rating-percent">
                                                <li>
                                                    <div class="thumb">
                                                        <img src="<?php echo $path ?>/public/assets/images/movie/tomato.png"
                                                            alt="movie">
                                                    </div>
                                                    <span class="content">88%</span>
                                                </li>
                                                <li>
                                                    <div class="thumb">
                                                        <img src="<?php echo $path ?>/public/assets/images/movie/cake.png"
                                                            alt="movie">
                                                    </div>
                                                    <span class="content">88%</span>
                                                </li>
                                            </ul>
                                            <div class="book-area">
                                                <div class="book-ticket">
                                                    <div class="react-item">
                                                        <a href="#0">
                                                            <div class="thumb">
                                                                <img src="<?php echo $path ?>/public/assets/images/icons/heart.png"
                                                                    alt="icons">
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="react-item mr-auto">
                                                        <a href="#0">
                                                            <div class="thumb">
                                                                <img src="<?php echo $path ?>/public/assets/images/icons/book.png"
                                                                    alt="icons">
                                                            </div>
                                                            <span><a
                                                                    href="index.php?act=ct_phim&id=<?php echo $id_phim ?>">Đặt
                                                                    vé</a></span>
                                                        </a>
                                                    </div>
                                                    <div class="react-item">
                                                        <a href="#0" class="popup-video">
                                                            <div class="thumb">
                                                                <img src="<?php echo $path ?>/public/assets/images/icons/play-button.png"
                                                                    alt="icons">
                                                            </div>
                                                            <span>watch trailer</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Movie-Section========== -->