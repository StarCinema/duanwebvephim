
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Thêm mới tài khoản</h1>

                    <!-- Add Product Form -->
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="index.php?act=addAcc" method="post" enctype="multipart/form-data" >
                                <!-- Product Name -->
                                <div class="form-group">
                                    <label for="productName">Tên đăng nhập</label>
                                    <input name="ten_dang_nhap" type="text" class="form-control" id="productName" placeholder="Nhập tên đăng nhập">
                                    <?php if(isset($erUsername)) echo "<small class='error-text'>$erUsername</small>"; ?>
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label for="productDescription">Họ và tên</label>
                                    <input name="ho_va_ten"type="text" class="form-control" id="productDescription" rows="3" placeholder="Nhập họ và tên">
                                    <?php if(isset($ername)) echo "<small class='error-text'>$ername</small>"; ?>
                                </div>
                                <!-- Description -->
                                <div class="form-group">
                                    <label for="productDescription">Email</label>
                                    <input name="email" type="text"class="form-control" id="productDescription" rows="3" placeholder="Nhập email">
                                    <?php if(isset($erEmail)) echo "<small class='error-text'>$erEmail</small>"; ?>
                                </div>
                                <!-- Description -->
                                <div class="form-group">
                                    <label for="productDescription">Mật khẩu </label>
                                    <input name="password"type="password" class="form-control" id="productDescription" rows="3" placeholder="Nhập mật khẩu">
                                    <?php if(isset($erPassword)) echo "<small class='error-text'>$erPassword</small>"; ?>
                                    <?php if(isset($error)) echo "<small class='error-text'>$error</small>"; ?>
                                </div>
                                <!-- Description -->
                                <div class="form-group">
                                    <label for="productDescription">Số điện thoại</label>
                                    <input name="sdt"type="text" class="form-control" id="productDescription" rows="3" placeholder="Nhập họ số điện thoại">
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

                                <!-- Product Image -->
                                <div class="form-group">
                                    <label for="productImage">Ảnh </label>
                                    <input name="image" type="file" class="form-control-file" id="productImage" multiple>

                                </div>

                 

                                <!-- Add Product Button -->
                                <input type="submit" class="btn btn-primary" name="them_btn" value="Thêm ">
                           
                            </form>
                        </div>
                    </div>

                </div>
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
