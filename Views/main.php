<section class="banner-section ">
        <div class="banner-bg bg_img bg-fixed" data-background="<?php echo $path; ?>/public/assets/images/banner/banner01.jpg"></div>
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
                    <div class="widget widget-search">
                        <h5 class="title">tìm kiếm</h5>
                        <form class="search-form" action="film" method="post">
                            <input type="text" name="kyw" placeholder="Tìm kiếm phim" required>
                            <input type="submit" value="Tìm kiếm" name="btnSubmit" class="btn_search"><i
                                class="flaticon-loupe"></i>
                        </form>
                    </div>
                    <div class="widget-1 widget-trending-search">
                        <h3 class="title">Thể Loại</h3>
                        <div class="widget-1-body">
                            <ul>

                                <li>
                                    <h6 class="sub-title">
                                        <a href="filmByGenre">name</a>
                                    </h6>
                                </li>



                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="article-section padding-bottom">
                        <div class="section-header-1">
                            <h2 class="title">Phim Hoạt Hình</h2>
                            </form>
                        </div>
                        <div class="row mb-30-none justify-content-center">

                            <div class="col-sm-6 col-lg-4">
                                <div class="movie-grid">
                                    <div class="movie-thumb c-thumb">
                                        <a href="index.php?act=ct_phim&id=<?php echo $id ?>">
                                            <img src="<?php echo $path_image . $image ?>" alt="movie">
                                        </a>
                                    </div>
                                    <div class="movie-content bg-one">
                                        <h5 class="title m-0">
                                            <a href="index.php?act=ct_phim&id=<?php echo $id ?>"><?php echo $film ?></a>
                                        </h5>
                                        <ul class="movie-rating-percent">
                                            <li>
                                                <div class="thumb">
                                                    <img src="<?php echo $path ?>assets/images/movie/tomato.png"
                                                        alt="movie">
                                                </div>
                                                <span class="content">88%</span>
                                            </li>
                                            <li>
                                                <div class="thumb">
                                                    <img src="<?php echo $path ?>assets/images/movie/cake.png"
                                                        alt="movie">
                                                </div>
                                                <span class="content">88%</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="article-section padding-bottom">
                        <div class="section-header-1">
                            <h2 class="title">Phim Hành Động</h2>

                        </div>
                        <div class="row mb-30-none justify-content-center">

                            <div class="col-sm-6 col-lg-4">
                                <div class="movie-grid">
                                    <div class="movie-thumb c-thumb">
                                        <a href="index.php?act=ct_phim&id=">
                                            <img src="" alt="movie">
                                        </a>
                                    </div>
                                    <div class="movie-content bg-one">
                                        <h5 class="title m-0">
                                            <a href="index.php?act=ct_phim&id=">phim</a>
                                        </h5>
                                        <ul class="movie-rating-percent">
                                            <li>
                                                <div class="thumb">
                                                    <img src="<?php echo $path ?>assets/images/movie/tomato.png"
                                                        alt="movie">
                                                </div>
                                                <span class="content">88%</span>
                                            </li>
                                            <li>
                                                <div class="thumb">
                                                    <img src="<?php echo $path ?>assets/images/movie/cake.png"
                                                        alt="movie">
                                                </div>
                                                <span class="content">88%</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ==========Movie-Main-Section========== -->