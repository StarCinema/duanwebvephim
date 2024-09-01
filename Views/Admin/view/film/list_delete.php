<style>
    .custom-img-height {
        max-height: 200px;
        /* Đặt chiều cao tối đa */
    }
</style>
<!-- main page -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Danh sách xóa</h1>

    <!-- bộ lọc -->
    

    <!-- Content Row -->
    <div class="row">

        <!-- Table column -->
        <div class="col-lg-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quản lý phim</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên phim</th>
                                    <th>Ngày thêm</th>
                                    <th>Thể loại</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($listTrash as $key => $phim) {
                                  ?>
                                <tr>
                                    <td><?=$key +1?></td>
                                    <td><?=$phim['ten_phim'] ?></td>
                                    <td><?=$phim['thoi_gian_tao'] ?></td>
                                    <td><?=$phim['ten_danh_muc'] ?></td>
                                    <td>
                                        <!-- Restore link with icon -->
                                        <a onclick=" return confirmRestore()" href="index.php?act=restoreFilm&idFilm=<?=$phim['id_phim'] ?>" class="btn btn-danger btn-sm deleteCategory" data-id="1">
                                        <i class="fas fa-undo-alt"></i>
                                    </a>
                                    </td>
                                </tr>
                                  <?php
                                }
                                ?>
                                <!-- Add more rows dynamically here using JavaScript -->
                            </tbody>
                        </table>



                    </div>


                </div>
            </div>

        </div>

    </div>

</div>
<script>
        function confirmRestore() {
            return confirm('Bạn có chắc chắn muốn khôi phục mục này không?');
        }
        function confirmRestoreAll() {
            return confirm('Bạn có chắc chắn muốn khôi phục toàn bộ không?');
        }
    </script>
<!-- end main page-fluid -->