<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Thêm/Sửa Suất Chiếu</h1>

    <!-- Content Row -->
    <div class="row">

        <!-- Form column -->
        <div class="col-lg-12">

            <!-- Form Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thêm/Sửa Suất Chiếu</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="process_showtime.php">
                        <!-- Phim -->
                        <div class="form-group">
                            <label for="phim">Phim:</label>
                            <select id="phim" name="id_phim" class="form-control">
                                <!-- Example options -->
                                <option value="1">Phim A</option>
                                <option value="2">Phim B</option>
                                <option value="3">Phim C</option>
                            </select>
                        </div>

                        <!-- Phòng chiếu -->
                        <div class="form-group">
                            <label for="phong">Phòng Chiếu:</label>
                            <select id="phong" name="id_phong" class="form-control">
                                <!-- Example options -->
                                <option value="1">Phòng 1</option>
                                <option value="2">Phòng 2</option>
                                <option value="3">Phòng 3</option>
                            </select>
                        </div>

                        <!-- Thời gian bắt đầu -->
                        <div class="form-group">
                            <label for="start_time">Thời Gian Bắt Đầu:</label>
                            <input type="datetime-local" id="start_time" name="start_time" class="form-control">
                        </div>

                        <!-- Thời gian kết thúc -->
                        <div class="form-group">
                            <label for="end_time">Thời Gian Kết Thúc:</label>
                            <input type="datetime-local" id="end_time" name="end_time" class="form-control">
                        </div>

                        <!-- Trạng thái -->
                        <div class="form-group">
                            <label for="status">Trạng Thái:</label>
                            <select id="status" name="status" class="form-control">
                                <option value="scheduled">Đã Lên Lịch</option>
                                <option value="completed">Hoàn Thành</option>
                                <option value="cancelled">Hủy</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary"><?= isset($showtime) ? 'Cập Nhật' : 'Thêm Mới' ?></button>
                        <a href="index.php?act=manageShowtimes" class="btn btn-secondary">Hủy</a>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>
