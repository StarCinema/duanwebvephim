<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Thêm mới phim</h1>

    <!-- Add Product Form -->
    <div class="row">
        <div class="col-lg-12">
            <form method="post" enctype="multipart/form-data">
                <!-- Product Name -->
                <div class="form-group">
                    <label for="productName">Tên phim</label>
                    <input name="ten_phim" type="text" class="form-control" id="productName"
                        placeholder="Nhập tên phim">
                    <span style="color:red;"><?php if (isset($loi_ten_phim)) {
                        echo $loi_ten_phim;
                    } else {
                        $loi_ten_phim = "";
                    } ?></span>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="productDescription">Mô tả</label>
                    <textarea name="mo_ta" class="form-control" id="productDescription" rows="3"
                        placeholder="Nhập mô tả phim"></textarea>
                    <span style="color:red;"><?php if (isset($loi_mo_ta)) {
                        echo $loi_mo_ta;
                    } else {
                        $loi_mo_ta = "";
                    } ?></span>
                </div>
                <div class="form-group">
                    <label for="filmTime">Thời lượng phim</label>
                    <input name="thoi_gian" type="text" class="form-control" id="filmTime" placeholder="HH:MM - HH:MM">
                    <span style="color:red;"><?php if (isset($loi_thoi_gian)) {
                        echo $loi_thoi_gian;
                    } else {
                        $loi_thoi_gian = "";
                    } ?></span>
                </div>
                <!-- Category -->
                <div class="form-group">
                    <label for="productCategory">Danh mục</label>
                    <select name="danh_muc" class="form-control" id="productCategory">
                        <option value="0">Chọn danh mục</option>
                        <?php foreach ($listdanhmuc as $key => $dm) {
                            ?>
                            <option value="<?= $dm['id_danh_muc'] ?>"><?= $dm['ten_danh_muc'] ?></option>
                            <?php
                        } ?>

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
                    <input name="anh" type="file" class="form-control-file" id="productImage" multiple>
                    <span style="color:red;"><?php if (isset($loi_anh)) {
                        echo $loi_anh;
                    } else {
                        $loi_anh = "";
                    } ?></span>

                </div>



                <!-- Add Product Button -->
                <input type="submit" class="btn btn-primary" name="addBtn" value="Thêm ">

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