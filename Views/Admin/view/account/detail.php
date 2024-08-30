
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
</style>
    </style>
    <?php
    if(isset($oneAccount)&& is_array($oneAccount)){
        extract($oneAccount);
        $anh="../../Uploads/".$hinh_anh;
    }
    ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Chi tiết tài khoản</h1>

        <!-- Product Details -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Thông tin tài khoản</h6>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-2 font-weight-bold">Tên tài khoản:</div>
                            <div class="col-sm-10"><?=$ten_dang_nhap?></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-2 font-weight-bold">Họ và tên:</div>
                            <div class="col-sm-10"> <?=$ho_va_ten?>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-2 font-weight-bold">Email:</div>
                            <div class="col-sm-10"><?=$email?></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-2 font-weight-bold">Số điện thoại:</div>
                            <div class="col-sm-10"><?=$sdt?></div>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-sm-2 font-weight-bold">Vai trò:</div>
                            <div class="col-sm-10"><?php if($vai_tro==0){
                                        echo"user";
                                    }else if($vai_tro==1){
                                        echo"Admin";
                                    } ?></div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-2 font-weight-bold">Trạng thái:</div>
                            <div class="col-sm-10"><?php if($trang_thai==0){
                                        echo"Đang hoạt động";
                                    
                                    }else if($trang_thai==1){
                                        echo"Không hoạt động";
                                    } ?></div>
                        </div>
                         <!-- Column for Product Images -->
    
                <div class="card  mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Ảnh bìa</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          
                                <div class="col-sm-6 mb-3  product-image">
                                    <img src="<?=$anh?>" class="img-fluid" alt="Ảnh sản phẩm">
                                </div>
                   
                        </div>
                    </div>
                </div>
         
            <!-- End Column for Product Images -->

                        <div class="row">
                            <div class="col-sm-10 offset-sm-2">
                                <a href="index.php?act=account" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
