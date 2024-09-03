<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Quản lý Suất Chiếu</h1>

    <!-- Content Row -->
    <div class="row">

        <!-- Table column -->
        <div class="col-lg-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách suất chiếu đã xóa</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Phim</th>
                                    <th>Phòng Chiếu</th>
                                    <th>Thời Gian Bắt Đầu</th>
                                    <th>Thời Gian Kết Thúc</th>
                                    <th>Trạng Thái</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example rows, replace with PHP loop for dynamic content -->
                                <tr>
                                    <td>1</td>
                                    <td>Phim A</td>
                                    <td>Phòng 1</td>
                                    <td>2024-09-01 18:00</td>
                                    <td>2024-09-01 20:00</td>
                                    <td>Đã Lên Lịch</td>
                                    <td>
                                        <!-- View details link with icon -->
                                        <a href="index.php?act=showtimeDetail&idShowtime=1" class="btn btn-info btn-sm viewDetails" data-id="1">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <!-- Edit link with icon -->
                                        <a href="index.php?act=editShowtime&idShowtime=1" class="btn btn-primary btn-sm editCategory" data-id="1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Delete link with icon -->
                                        <a onclick="return xoa_Showtime()" href="index.php?act=deleteShowtime&idShowtime=1" class="btn btn-danger btn-sm deleteCategory" data-id="1">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <!-- Add more rows dynamically here using JavaScript -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Notification message (optional) -->
                    <p id="notificationMessage"></p>
                </div>
            </div>

        </div>

    </div>

</div>
<script>
    function xoa_Showtime(){
        return confirm('Bạn chắc chắn muốn xóa suất chiếu này không?');
    }
</script>
