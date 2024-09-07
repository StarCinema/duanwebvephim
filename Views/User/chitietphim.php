<style>
    /* Ẩn ban đầu */
    .booking-section, .overlay {
        display: none;
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }

    /* Khi hiển thị */
    .booking-section.active, .overlay.active {
        display: block;
        opacity: 1;
    }

    /* Overlay tối khi hiển thị booking */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 10;
    }

    .booking-section {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 20px;
    width: 700px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
    z-index: 20;
    border-radius: 10px;
    color: #333; /* Đặt màu chữ tối hơn */
}

.booking-section h3 {
    color: #000; /* Đặt màu tiêu đề đậm hơn */
}

.custom-select, .form-group label {
    color: #333; /* Màu chữ cho các label và text */
}


    /* Form Elements Styling */
    .form-group {
        width: 70%;
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

/* Điều chỉnh chiều dài của select trong booking-section */
.booking-section .custom-select {
    width: 100%; /* Tăng chiều rộng lên 100% trong booking section */
    border: 1px solid #ddd;
    border-radius: 5px;
}



</style>

<section class="details-banner bg_img" data-background="public/assets/images/banner/banner03.jpg">
    <div class="container">
        <div class="details-banner-wrapper">
            <div class="details-banner-thumb">
                <img src="Uploads/<?=$anh_bia?>" alt="movie">
                <a href="https://www.youtube.com/embed/KGeBMAgc46E" class="video-popup">
                    <img src="public/assets/images/movie/video-button.png" alt="movie">
                </a>
            </div>
            <div class="details-banner-content offset-lg-3">
                <h3 class="title"><?=$ten_phim?></h3>
                <div class="tags">
                    <a href="#0">English</a>
                    <a href="#0">Hindi</a>
                    <a href="#0">Telegu</a>
                    <a href="#0">Tamil</a>
                </div>
                <a href="#0" class="button"><?=$ten_danh_muc?></a>
                <div class="social-and-duration">
                    <div class="duration-area">
                        <div class="item">
                            <i class="fas fa-calendar-alt"></i><span><?=$thoi_gian_tao?></span>
                        </div>
                        <div class="item">
                            <i class="far fa-clock"></i><span><?=$thoi_luong?></span>
                        </div>
                    </div>
                    <ul class="social-share">
                        <li><a href="#0"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#0"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#0"><i class="fab fa-pinterest-p"></i></a></li>
                        <li><a href="#0"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#0"><i class="fab fa-google-plus-g"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ==========Banner-Section========== -->

<!-- ==========Book-Section========== -->
<section class="book-section bg-one">
    <div class="container">
        <div class="book-wrapper offset-lg-3">
            <div class="left-side">
                <div class="item">
                    <div class="item-header">
                        <div class="thumb">
                            <img src="public/assets/images/movie/tomato2.png" alt="movie">
                        </div>
                        <div class="counter-area">
                            <span class="counter-item odometer" data-odometer-final="88">0</span>
                        </div>
                    </div>
                    <p>tomatometer</p>
                </div>
                <div class="item">
                    <div class="item-header">
                        <div class="thumb">
                            <img src="public/assets/images/movie/cake2.png" alt="movie">
                        </div>
                        <div class="counter-area">
                            <span class="counter-item odometer" data-odometer-final="88">0</span>
                        </div>
                    </div>
                    <p>audience Score</p>
                </div>
                <div class="item">
                    <div class="item-header">
                        <h5 class="title">4.5</h5>
                        <div class="rated">
                            <i class="fas fa-heart"></i>
                            <i class="fas fa-heart"></i>
                            <i class="fas fa-heart"></i>
                            <i class="fas fa-heart"></i>
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                    <p>Users Rating</p>
                </div>
                <div class="item">
                    <div class="item-header">
                        <div class="rated rate-it">
                            <i class="fas fa-heart"></i>
                            <i class="fas fa-heart"></i>
                            <i class="fas fa-heart"></i>
                            <i class="fas fa-heart"></i>
                            <i class="fas fa-heart"></i>
                        </div>
                        <h5 class="title">0.0</h5>
                    </div>
                    <p><a href="#0">Rate It</a></p>
                </div>
            </div>
            <a href="javascript:void(0);" class="custom-button" id="btn-dat-ve">Đặt vé</a>
        </div>
    </div>
</section>
<!-- ==========Book-Section========== -->

<!-- ==========Movie-Section========== -->
<section class="movie-details-section padding-top padding-bottom">
    <div class="container">
        <div class="row justify-content-center flex-wrap-reverse mb--50">
            <?php include "Views/aside.php"; ?>
            <div class="col-lg-9 mb-50">
                <div class="movie-details">
                    <h3 class="title">photos</h3>
                    <div class="details-photos owl-carousel">
                        <div class="thumb">
                            <a href="public/assets/images/movie/movie-details01.jpg" class="img-pop">
                            <img src="public/assets/images/movie/movie-details01.jpg" alt="movie">
                            </a>
                        </div>
                        <div class="thumb">
                            <a href="public/assets/images/movie/movie-details02.jpg" class="img-pop">
                                <img src="public/assets/images/movie/movie-details02.jpg" alt="movie">
                            </a>
                        </div>
                        <div class="thumb">
                            <a href="public/assets/images/movie/movie-details03.jpg" class="img-pop">
                                <img src="public/assets/images/movie/movie-details03.jpg" alt="movie">
                            </a>
                        </div>
                        <div class="thumb">
                            <a href="public/assets/images/movie/movie-details01.jpg" class="img-pop">
                                <img src="public/assets/images/movie/movie-details01.jpg" alt="movie">
                            </a>
                        </div>
                        <div class="thumb">
                            <a href="public/assets/images/movie/movie-details02.jpg" class="img-pop">
                                <img src="public/assets/images/movie/movie-details02.jpg" alt="movie">
                            </a>
                        </div>
                        <div class="thumb">
                            <a href="public/assets/images/movie/movie-details03.jpg" class="img-pop">
                                <img src="public/assets/images/movie/movie-details03.jpg" alt="movie">
                            </a>
                        </div>
                    </div>

                        <form action="index.php?act=comment" method="post" style="margin: 0 0 40px 0;">
                            <input type="text" name="comment" placeholder="Viết bình luận..." style="height: 100px; margin: 0 0 30px 0">

                            </input>
                            <div class="" style="width: 150px;">
                                <input class="custom-button" type="submit" name="send_comment" value="Gửi">
                            </div>
                        </form>
    
                    <div class="tab summery-review">
                        <ul class="tab-menu">
                            <li class="active">
                                Bình luận 
                            </li>
                            <li>
                                Mô tả 
                            </li>
                        </ul>
                        <div class="tab-area">
                        <div class="tab-item  active">

                                    <div class="movie-review-item">
                                        <div class="author">
                                            <div class="thumb">
                                                <a href="#0">
                                                    <img src="/public/assets/images/cast/cast02.jpg" alt="cast">
                                                </a>
                                            </div>
                                            <div class="movie-review-info">
                                                <span class="reply-date">time cmt</span>
                                                <h6 class="subtitle"><a href="#0">user name</a></h6>
                                                <span><i class="fas fa-check"></i> verified review</span>
                                            </div>
                                        </div>
                                        <div class="movie-review-content">
                                            <div class="review">
                                                <i class="flaticon-favorite-heart-button"></i>
                                                <i class="flaticon-favorite-heart-button"></i>
                                                <i class="flaticon-favorite-heart-button"></i>
                                                <i class="flaticon-favorite-heart-button"></i>
                                                <i class="flaticon-favorite-heart-button"></i>
                                            </div>
                                            <h6 class="cont-title">Tên phim</h6>
                                            <p>content</p>
                                            <div class="review-meta">
                                                <a href="#0">
                                                    <i class="flaticon-hand"></i><span>8</span>
                                                </a>
                                                <a href="#0" class="dislike">
                                                    <i class="flaticon-dont-like-symbol"></i><span>0</span>
                                                </a>
                                                <a onclick="return confirm('Bạn có muốn xóa bình luận này không?')" href="index.php?act=delete_comment">
                                                    Xóa bình luận
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                  
                                <div class="load-more text-center">
                                    <a href="#0" class="custom-button transparent">load more</a>
                                </div>
                            </div>
                            <div class="tab-item">
                                <div class="item">
                                    <h5 class="sub-title">Synopsis</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vehicula eros sit amet est tincidunt aliquet. Fusce laoreet ligula ac ultrices eleifend. Donec hendrerit fringilla odio, ut feugiat mi convallis nec. Fusce elit ex, blandit vitae mattis sit amet, iaculis ac elit. Ut diam mauris, viverra sit amet dictum vel, aliquam ac quam. Ut mi nisl, fringilla sit amet erat et, convallis porttitor ligula. Sed auctor, orci id luctus venenatis, dui dolor euismod risus, et pharetra orci lectus quis sapien. Duis blandit ipsum ac consectetur scelerisque. </p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========Movie-Booking-Section========== -->
<div class="overlay" id="overlay"></div>
<section class="booking-section" id="booking-section">
    <div class="booking-wrapper">
    <h3 >Lịch chiếu</h3>
        
        <form action="index.php?act=bookticket" method="post">
            <!-- Chọn ngày chiếu -->
            <div class="form-group">
                <label for="ngay_chieu">Chọn ngày chiếu</label>
                <select name="ngay_chieu" id="ngay_chieu" class="custom-select">
                    <option value="">Chọn ngày</option>
                    <option value="2024-09-10">10/09/2024</option>
                    <option value="2024-09-11">11/09/2024</option>
                    <option value="2024-09-12">12/09/2024</option>
                </select>
            </div>

            <!-- Chọn phòng chiếu -->
            <div class="form-group">
                <label for="phong_chieu">Chọn phòng chiếu</label>
                <select name="phong_chieu" id="phong_chieu" class="custom-select">
                    <option value="">Chọn phòng</option>
                    <option value="1">Phòng 1</option>
                    <option value="2">Phòng 2</option>
                    <option value="3">Phòng 3</option>
                </select>
            </div>

            <!-- Chọn xuất chiếu -->
            <button id="view-showtime" class="custom-button" disabled>Xem xuất chiếu</button>


        </form>
    </div>
</section>


<!-- JavaScript -->
<script>
    document.getElementById('btn-dat-ve').addEventListener('click', function() {
        document.getElementById('booking-section').classList.add('active');
        document.getElementById('overlay').classList.add('active');
    });

    // Đóng khi click ngoài overlay
    document.getElementById('overlay').addEventListener('click', function() {
        document.getElementById('booking-section').classList.remove('active');
        document.getElementById('overlay').classList.remove('active');
    });
</script>