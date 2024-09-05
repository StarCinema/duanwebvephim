<?php
if (isset($oneShows) && is_array($oneShows)) {
    extract($oneShows);

}
?>
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
                    <h6 class="m-0 font-weight-bold text-primary">Sửa Suất Chiếu</h6>
                </div>
                <div class="card-body">
                    <form action="index.php?act=updateShowtime" method="post" enctype="multipart/form-data">
                        <!-- Phim -->
                        <input name="id" value="<?= $id ?>" type="hidden" class="form-control" id="id">
                        <div class="form-group">
                            <label for="phim">Phim:</label>
                            <select id="phim" name="id_phim" class="form-control">
                                <!-- Example options -->
                                <?php
                                foreach ($phim as $item) {
                                    extract($item);
                                    if ($oneShows['id_phim'] == $id_phim)
                                        $sl = "selected";
                                    else
                                        $sl = "";
                                    echo '<option  value="' . $id_phim . '"' . $sl . '>' . $ten_phim . '</option>';


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
                                <?php
                                foreach ($data as $item) {
                                    extract($item);
                                    if ($oneShows['id_phong'] == $id_phong)
                                        $sl = "selected";
                                    else
                                        $sl = "";
                                    echo '<option  value="' . $id_phong . '"' . $sl . '>' . $ten_phong . '</option>';


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
                            <input type="datetime-local" id="start_time" name="thoi_gian_bat_dau" class="form-control"
                                value="<?= $thoi_gian_bat_dau ?>">
                            <span style="color:red;"><?php if (isset($erTimesfirst)) {
                                echo $erTimesfirst;
                            } else {
                                $erTimesfirst = "";
                            } ?></span>
                        </div>

                        <!-- Thời gian kết thúc -->
                        <div class="form-group">
                            <label for="end_time">Thời Gian Kết Thúc:</label>
                            <input type="datetime-local" id="end_time" name="thoi_gian_ket_thuc" class="form-control"
                                value="<?= $thoi_gian_ket_thuc ?>">
                            <span style="color:red;"><?php if (isset($erTimesend)) {
                                echo $erTimesend;
                            } else {
                                $erTimesend = "";
                            } ?></span>
                        </div>


                        <!-- Trạng thái -->
                        <div class="form-group">
                            <label for="status">Trạng Thái:</label>
                            <select id="status" name="trang_thai" class="form-control">
                                <!-- Tùy chọn cho trạng thái 'Đã Lên Lịch' -->
                                <option value="0" <?= ($trang_thai_show == 0) ? 'selected' : '' ?>>Đã Lên Lịch</option>

                                <!-- Tùy chọn cho trạng thái 'Hoàn Thành' -->
                                <option value="1" <?= ($trang_thai_show == 1) ? 'selected' : '' ?>>Hoàn Thành</option>

                                <!-- Tùy chọn cho trạng thái 'Hủy' -->
                                <option value="2" <?= ($trang_thai_show == 2) ? 'selected' : '' ?>>Hủy</option>
                            </select>
                        </div>


                        <!-- Submit Button -->
                        <input type="submit" class="btn btn-primary" name="up_btn" value="Cập nhập">
                        <a href="index.php?act=showFilm" class="btn btn-secondary">Hủy</a>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>