<style>
    .custom-img-height {
        max-height: 200px; /* Đặt chiều cao tối đa */
    }
</style>

<!-- Main Page -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Thêm Phòng Chiếu</h1>

    <!-- Content Row -->
    <div class="row">

        <!-- Form column -->
        <div class="col-lg-12">

            <!-- Form Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thêm Phòng Chiếu Mới</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="ten_phong">Tên Phòng Chiếu</label>
                            <input type="text" class="form-control" id="ten_phong" name="ten_phong" required>
                            <span style="color:red;"><?php if(isset($loi_ten_phong)){
                                echo $loi_ten_phong;} else { $loi_ten_phong = ""; }?></span>
                        </div>
                        <div class="form-group">
                            <label for="so_hang">Số Hàng</label>
                            <input type="number" class="form-control" id="so_hang" name="so_hang" required>
                            <span style="color:red;"><?php if(isset($loi_so_hang)){
                                echo $loi_so_hang;} else { $loi_so_hang = ""; }?></span>
                        </div>
                        <div class="form-group">
                            <label for="so_ghe_moi_hang">Số Ghế Mỗi Hàng</label>
                            <input type="number" class="form-control" id="so_ghe_moi_hang" name="so_ghe_moi_hang" required>
                            <span style="color:red;"><?php if(isset($loi_so_ghe_moi_hang)){
                                echo $loi_so_ghe_moi_hang;} else { $loi_so_ghe_moi_hang = ""; }?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" name="addBtn" value="Thêm Phòng Chiếu">
                    </form>
                    <span style="color:red;"><?php if(isset($thong_bao)){
                        echo $thong_bao;
                    } else { $thong_bao = ""; }?></span>
                </div>
            </div>

        </div>

    </div>


</div>
<!-- end main page-fluid -->
