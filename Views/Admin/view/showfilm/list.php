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
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách suất chiếu</h6>
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
                                 <?php $key=1;
                                 foreach ($listAllShow as $item){
                                    extract($item);
                                    // var_dump($listAllShow);
                                    $editShow="index.php?act=editShowtime&idShowtime=".$id;
                                    $viewdetail="index.php?act=showtimeDetail&idShowtime=".$id;
                                    $deleteShow="index.php?act=deleteShowtime&idShowtime=".$id;
                                 ?>
                                  <tr>
                               
                                    <td><?= $key?></td>
                                    <td><?=$ten_phim?></td>
                                    <td><?=$ten_phong?></td>
                                    <td><?=$thoi_gian_bat_dau?></td>
                                    <td><?=$thoi_gian_ket_thuc?></td>
                                    <td><?php 
                                        
                                       if ($trang_thai ==0 ) {
                                           echo "Đã lên lịch";
                                       } elseif ($trang_thai ==1 ) {
                                           echo "Hoàn thành";
                                       } elseif ($trang_thai == 2) {
                                           echo "Hủy";
                                       } else {
                                           echo "Trạng thái không xác định"; // Trường hợp lỗi hoặc giá trị không mong muốn
                                       }
                                   
                                        ?>
                                    </td>
                                    <td>
                                        <!-- View details link with icon -->
                                        <a href="<?=$viewdetail?>" class="btn btn-info btn-sm viewDetails" data-id="1">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <!-- Edit link with icon -->
                                        <a href="<?=$editShow?>" class="btn btn-primary btn-sm editCategory" data-id="1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Delete link with icon -->
                                        <a onclick="return xoa_Showtime()" href="<?=$deleteShow?>" class="btn btn-danger btn-sm deleteCategory" data-id="1">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $key++;
                                 }?>
                               
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
