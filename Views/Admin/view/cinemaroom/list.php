<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Phòng chiếu</h1>

    <!-- Content Row -->
    <div class="row">

        <!-- Table column -->
        <div class="col-lg-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quản lý danh sách phòng</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Phòng</th>
                                    <td>Sức chứa</td>
                                    <th>Thao tác</th>

                                </tr>
                            </thead>
                            <tbody>
<?php 
foreach ($data as $key => $room) {
?>
                                <tr>
                                    <td><?=$key +1?></td>
                                    <td><?=$room['ten_phong'] ?></td>
                                    <td><?=$room['tong_so_ghe'] ?></td>
                                    <td>
                                        <!-- View details link with icon -->

                                        <!-- Edit link with icon -->
                                        <a href="index.php?act=editRoom&idRoom=<?= $room['id_phong'] ?>"
                                            class="btn btn-primary btn-sm editCategory" data-id="1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Delete link with icon -->
                                        <a onclick="return xoa_Room()"
                                            href="index.php?act=deleteRoom&idRoom=<?= $room['id_phong'] ?>"
                                            class="btn btn-danger btn-sm deleteCategory" data-id="1">
                                            <i class="fas fa-trash-alt"></i>
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

                    <?php if (isset($thong_bao)) {
                        echo "<p >" . $thong_bao . "</p>";
                    }
                    ?>
                </div>
            </div>

        </div>

    </div>

</div>
<script>
    function xoa_Room(){
        return confirm('Bạn chắc chắn muốn xóa phòng này không?');
    }
</script>