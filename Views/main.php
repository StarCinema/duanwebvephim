<section class="banner-section ">
    <div class="banner-bg bg_img bg-fixed"
        data-background="<?php echo $path; ?>/public/assets/images/banner/banner01.jpg"></div>
    <div class="container text-center">
        <div class="banner-content w-100">
            <h1 class="title  cd-headline clip"><span class="d-block">Đặt vé</span>
                <span class="color-theme cd-words-wrapper p-0 m-0">
                    <b class="is-visible">Xem phim</b>
                    <b>STAR Cinema</b>

                </span>
            </h1>
        </div>
    </div>
</section>
<!-- ==========Movie-Main-Section========== -->
<section class="movie-section padding-top padding-bottom bg-two">
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
            <div class="col-lg-9">
                <div class="article-section padding-bottom">
                    <div class="section-header-1">
                        <h2 class="title">Xem phim tại Star Cinema</h2>
                    </div>
                    <div class="row mb-30-none justify-content-center">
                 
                    <?php
                    foreach ($data as $key => $phim) {
                        ?>
                      

                            <div class="col-sm-6 col-lg-4">
                                <div class="movie-grid">
                                    <div class="movie-thumb c-thumb">
                                        <a href="index.php?act=movieDetails&idFilm=<?= $phim['id_phim'] ?>">
                                            <img src="Uploads/<?= $phim['anh_bia'] ?>" alt="<?= $phim['anh_bia'] ?>">

                                        </a>
                                    </div>
                                    <div class="movie-content bg-one">
                                        <h5 class="title m-0">
                                            <a
                                                href="index.php?act=movieDetails&idFilm=<?= $phim['id_phim'] ?>"><?= $phim['ten_phim'] ?></a>
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
                    }
                    ?>
   </div>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- ==========Movie-Main-Section========== -->