<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tài khoản xóa</h1>

    <!-- Content Row -->
    <div class="row">

        <!-- Table column -->
        <div class="col-lg-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quản lý danh tài khoản</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên đăng nhập</th>                               
                                    <th>Email</th>
                                    <th>Hình ảnh</th>
                                    <th>Vai trò</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>

                                </tr>
                            </thead>
                            <tbody>
                       <?php $i=1;
                            foreach ($listTrash as $key) {
                            extract($key);
                            
                            $detailAccount="index.php?act=detailAcc&idAcc=".$id_taikhoan;
                            $anh="../../Uploads/".$hinh_anh;
                        ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$ten_dang_nhap ?></td>
                                    
                                    <td><?=$email ?></td>
                                    <td><img width="100px" src="<?=$anh ?>" alt=""></td>
                                    
                                    <td><?php if($vai_tro==0){
                                        echo"user";
                                    }else if($vai_tro==1){
                                        echo"Admin";
                                    } ?></td>
                                    <td><?php if($trang_thai==0){
                                        echo"Đang hoạt động";
                                    }else if($trang_thai==1){
                                        echo"Không hoạt động";
                                    } ?></td>
                                    <td>
                                       

                                        <!-- Edit link with icon -->
                                        <a onclick=" return confirmRestore()" href="<?= $restoreGenre?>" class="btn btn-danger btn-sm deleteCategory" data-id="1">
                                        <i class="fas fa-undo-alt"></i>
                                    </a>
                                       
                                    </td>
                                </tr>
                        <?php
                            $i++;
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
                    