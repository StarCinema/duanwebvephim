
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Thêm mới phim</h1>

                    <!-- Add Product Form -->
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" enctype="multipart/form-data" >
                                <!-- Product Name -->
                                <div class="form-group">
                                    <label for="productName">Tên phim</label>
                                    <input name="ten_san_pham" type="text" class="form-control" id="productName" placeholder="Nhập tên sản phẩm">
                          
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label for="productDescription">Mô tả</label>
                                    <textarea name="mo_ta" class="form-control" id="productDescription" rows="3" placeholder="Nhập mô tả sản phẩm"></textarea>
                         
                                </div>

                                <!-- Category -->
                                <div class="form-group">
                                    <label for="productCategory">Danh mục</label>                                  
                                    <select name="danh_muc" class="form-control" id="productCategory">
                                        <option value="0">Chọn danh mục</option>
                                        <?php foreach ($listdanhmuc as $key => $dm) {
                                           ?>
                                            <option value="<?=$dm['id_danh_muc'] ?>"><?=$dm['ten_danh_muc'] ?></option>
                                           <?php
                                        } ?>
                         
                                    </select>

                                </div>

                                <!-- Product Image -->
                                <div class="form-group">
                                    <label for="productImage">Ảnh sản phẩm</label>
                                    <input name="productImages[]" type="file" class="form-control-file" id="productImage" multiple>

                                </div>

                 

                                <!-- Add Product Button -->
                                <input type="submit" class="btn btn-primary" name="them_btn" value="Thêm ">
                           
                            </form>
                        </div>
                    </div>

                </div>
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
