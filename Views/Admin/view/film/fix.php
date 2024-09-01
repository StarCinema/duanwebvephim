<?php
if(isset($oneFilm)&&is_array($oneFilm)){
    extract($oneFilm);
    $anh="../../Uploads/".$anh_bia;
}
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Sửa phim</h1>

                    <!-- Add Product Form -->
                    <div class="row">
                        <div class="col-lg-12">
                            <form  action="index.php?act=updateFilm" method="post" enctype="multipart/form-data" >
                                <!-- Product Name -->
                                <input name="id_phim" value="<?=$id_phim?>" type="hidden" class="form-control" id="productName" >
                                <div class="form-group">
                                    <label for="productName">Tên phim</label>
                                    <input name="ten_phim" type="text" class="form-control" id="productName" placeholder="Nhập tên phim"value="<?=$ten_phim?>">
                                    <span style="color:red;"><?php if (isset($loi_ten_phim)) {
                                            echo $loi_ten_phim;
                                            } else {
                                                $loi_ten_phim = "";
                                            } ?></span>
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label for="productDescription">Mô tả</label>
                                    <textarea name="mo_ta" class="form-control" id="productDescription" rows="3" placeholder="Nhập mô tả "><?=$mo_ta?></textarea>
                                    <span style="color:red;"><?php if (isset($loi_mo_ta)) {
                                           echo $loi_mo_ta;
                                        } else {
                                                $loi_mo_ta = "";
                                        } ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="filmTime">Thời lượng phim</label>
                                    <input name="thoi_gian" type="text" class="form-control" id="filmTime" placeholder="HH:MM - HH:MM"value="<?=$thoi_luong?>">
                                    <span style="color:red;"><?php if (isset($loi_thoi_gian)) {
                                         echo $loi_thoi_gian;
                                    } else {
                                        $loi_thoi_gian = "";
                                    } ?></span>
                                </div>
                                <div class="card  mb-4">
                                        <div class="card-header py-3">
                                              <h6 class="m-0 font-weight-bold text-primary">Ảnh bìa</h6>
                                        </div>
                                        <div class="card-body">
                                             <div class="row">
                          
                                                 <div class="col-sm-6 mb-3  product-image">
                                                    <img src="<?=$anh?>" width="250px" class="img-fluid" alt="Ảnh sản phẩm">
                                                 </div>
                   
                                            </div>
                                         </div>
                                </div>
                                <!-- Category -->
                                <div class="form-group">
                                    <label for="productCategory">Danh mục</label>                                  
                                    <select name="danh_muc" class="form-control" id="productCategory">
                                        <option value="0">Chọn danh mục</option>
                                        <?php 
                                        foreach ($listdanhmuc as $item){
                                            extract($item);
                                            if($oneFilm['id_danh_muc']==$id_danh_muc) $sl="selected";
                                            else $sl=""; 
                                          echo'<option  value="'.$id_danh_muc.'"'.$sl.'>'.$ten_danh_muc.'</option>';

                                            
                                        }
                                        ?>
                         
                                    </select>
                                    <span style="color:red;"><?php if (isset($loi_danh_muc)) {
                                             echo $loi_danh_muc;
                                           } else {
                                               $loi_danh_muc = "";
                                          } ?></span>

                                </div>

                                <!-- Product Image -->
                                <div class="form-group">
                                    <label for="productImage">Ảnh bìa</label>
                                    <input name="image" type="file" class="form-control-file" id="productImage" multiple>

                                </div>

                 

                                <!-- Add Product Button -->
                                <input type="submit" class="btn btn-primary" name="sua_btn" value="Cập nhập">
                           
                            </form>
                            <span style="color:red;"><?php if (isset($thong_bao)) {
                                  echo $thong_bao;
                                 } else {
                                  $thong_bao = "";
                                    } ?></span>
                               <span style="color:red;"><?php if (isset($$error)) {
                                       echo $error;
                                 } else {
                                         $error = "";
                                     } ?></span>
                        </div>
                    </div>

                </div>
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
