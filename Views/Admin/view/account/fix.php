<?php
 if(isset($oneAccount)&& is_array($oneAccount)){
    extract($oneAccount);
    $anh="../../Uploads/".$hinh_anh;
}
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Sửa tài khoản</h1>

                    <!-- Add Product Form -->
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="index.php?act=updateAccount" method="post" enctype="multipart/form-data" >
                                <!-- Product Name -->
                                <input name="id_taikhoan" type="hidden" class="form-control" id="inputCategoryName"value="<?=$id_taikhoan ?>" >
                                <div class="form-group">
                                    <label for="productName">Tên đăng nhập</label>
                                    <input name="ten_dang_nhap" type="text" class="form-control" id="productName" placeholder="Nhập tên đăng nhập" value="<?=$ten_dang_nhap?>">
                                    <?php if(isset($erUsername)) echo "<small class='error-text'>$erUsername</small>"; ?>
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label for="productDescription">Họ và tên</label>
                                    <input name="ho_va_ten"type="text" class="form-control" id="productDescription" rows="3" placeholder="Nhập họ và tên"value="<?=$ho_va_ten?>">
                                    <?php if(isset($ername)) echo "<small class='error-text'>$ername</small>"; ?>
                                </div>
                                <!-- Description -->
                                
                                <!-- Description -->
                               
                                <!-- Description -->
                                <div class="form-group">
                                    <label for="productDescription">Số điện thoại</label>
                                    <input name="sdt"type="text" class="form-control" id="productDescription" rows="3" placeholder="Nhập họ số điện thoại"value="<?=$sdt?>">
                                    <?php if(isset($erPhone)) echo "<small class='error-text'>$erPhone</small>"; ?>
                                </div>
                              

                                <!-- Category -->
                                <div class="form-group">
                                    <label for="productCategory">Phân quyền</label>                                  
                                    <select name="vai_tro" class="form-control" id="productCategory">
                                        
                                        <option value="0">User</option>
                                        <option value="1">Admin</option>
                                    </select>
                                    
                                </div>
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
                                <!-- Product Image -->
                                <div class="form-group">
                                    <label for="productImage">Ảnh </label>
                                    <input name="image" type="file" class="form-control-file" id="productImage" multiple>

                                </div>

                 

                                <!-- Add Product Button -->
                                <input type="submit" class="btn btn-primary" name="sua_btn" value="Sửa ">
                           
                            </form>
                        </div>
                    </div>

                </div>
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
