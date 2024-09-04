<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Sửa Suất Chiếu</h1>

    <!-- Content Row -->
    <div class="row">

        <!-- Form column -->
        <div class="col-lg-12">

            <!-- Form Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thêm Suất Chiếu</h6>
                </div>
                <div class="card-body">
                    <form action="index.php?act=addShowFilm" method="post">
                        <!-- Phim -->
                        <div class="form-group">
                            <label for="phim">Phim:</label>
                            <select id="phim" name="id_phim" class="form-control">
                                <!-- Example options -->
                                 <?php foreach ($phim as $item){
                                    extract($item);?>
                                    <option value="<?=$id_phim?>"><?=$ten_phim?></option>
                                <?php
                                 }
                                 ?>
                                
                            </select>
                            <span style="color:red;"><?php if (isset($erPhim)) {
                                 echo $erPhim;
                                 } else {
                                    $erPhim = "";
                            } ?></span>
                        </div>

                        <!-- Phòng chiếu -->
                        <div class="form-group">
                            <label for="phong">Phòng Chiếu:</label>
                            <select id="phong" name="id_phong" class="form-control">
                                <!-- Example options -->
                                <?php foreach ($data as $item){
                                    extract($item);?>
                                    <option value="<?=$id_phong?>"><?=$ten_phong?></option>
                                <?php
                                 }
                                 ?>
                            </select>
                            <span style="color:red;"><?php if (isset($erPhong)) {
                                 echo $erPhong;
                                 } else {
                                    $erPhong = "";
                            } ?></span>
                        </div>

                        <!-- Thời gian bắt đầu -->
                        <div class="form-group">
                            <label for="start_time">Thời Gian Bắt Đầu:</label>
                            <input type="datetime-local" id="start_time" name="thoi_gian_bat_dau" class="form-control">
                            <span style="color:red;"><?php if (isset($erTimesfirst)) {
                                 echo $erTimesfirst;
                                 } else {
                                    $erTimesfirst = "";
                            } ?></span>
                            <span style="color:red;"><?php if (isset($erTime)) {
                                 echo $erTime;
                                 } else {
                                    $erTime = "";
                            } ?></span>
                        </div>

                        <!-- Thời gian kết thúc -->
                        <div class="form-group">
                            <label for="end_time">Thời Gian Kết Thúc:</label>
                            <input type="datetime-local" id="end_time" name="thoi_gian_ket_thuc" class="form-control">
                            <span style="color:red;"><?php if (isset($erTimesend)) {
                                 echo $erTimesend;
                                 } else {
                                    $erTimesend = "";
                            } ?></span>
                            <span style="color:red;"><?php if (isset($erTime)) {
                                 echo $erTime;
                                 } else {
                                    $erTime = "";
                            } ?></span>
                        </div>

                        <!-- Trạng thái -->
                        <!-- <div class="form-group">
                            <label for="status">Trạng Thái:</label>
                            <select id="status" name="status" class="form-control">
                                <option value="scheduled">Đã Lên Lịch</option>
                                <option value="completed">Hoàn Thành</option>
                                <option value="cancelled">Hủy</option>
                            </select>
                        </div> -->

                        <!-- Submit Button -->
                        <input type="submit" name="add_btn" class="btn btn-primary"value="Thêm mới">
                        <a href="index.php?act=" class="btn btn-secondary">Hủy</a>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>
