
    <style>
        <style>
    .product-image {
        text-align: center;
        margin-bottom: 20px; 
    }

    .product-image img {
        max-width: 40%;
        height: 100px; 
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        transition: transform 0.3s ease; 
    }

    .product-image img:hover {
        transform: scale(1.05); 
    }
    .product-image img {
    max-width: 100%; /* Đặt chiều rộng tối đa của ảnh bằng chiều rộng của phần tử chứa */
    height: auto; /* Đảm bảo tỷ lệ khung hình của ảnh được giữ nguyên */
    display: block; /* Đặt ảnh thành khối để có thể căn chỉnh tốt hơn */
}

</style>
    </style>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Chi tiết phim</h1>

        <!-- Product Details -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Thông tin phim</h6>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-2 font-weight-bold">Tên phim:</div>
                            <div class="col-sm-10"><?=$ten_phim?></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-2 font-weight-bold">Mô tả:</div>
                            <div class="col-sm-10"> <?=$mo_ta?>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-2 font-weight-bold">Thể loại:</div>
                            <div class="col-sm-10"><?=$ten_danh_muc?></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-2 font-weight-bold">Thời lượng</div>
                            <div class="col-sm-10"><?=$thoi_luong?></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-2 font-weight-bold">Thời gian tạo:</div>
                            <div class="col-sm-10"><?=$thoi_gian_tao?></div>
                        </div>

                         <!-- Column for Product Images -->
    
                         <div class="card mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ảnh bìa</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 mb-0 product-image"> <!-- Sử dụng col-sm-12 để ảnh chiếm toàn bộ chiều rộng của phần tử chứa -->
                <img src="../../uploads/<?=$anh_bia?>" class="img-fluid" width="200px" alt="Ảnh phim">
            </div>
        </div>
    </div>
</div>

         
            <!-- End Column for Product Images -->

                        <div class="row">
                            <div class="col-sm-10 offset-sm-2">
                                <a href="index.php?act=film" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
