      <!-- Begin Page Content -->
      <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Phòng đã xóa</h1>

<!-- Content Row -->
<div class="row">

    <!-- Table column -->
    <div class="col-lg-12">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
           
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên phòng</th>
                                <th>Sức chứa</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                                $i=1;
                                foreach ($data  as $item){
                                     extract($item);
                                     $restoreRoom="index.php?act=restoreRoom&idRoom=".$id_phong;
                                     ?>
                                <tr>
                                    <td><?= $i?></td>
                                    
                                    
                                    <td><?= $ten_phong?></td>
                                    <td><?= $tong_so_ghe?></td>

                                <td>
                                 
                                    <a onclick=" return confirmRestore()" href="<?= $restoreRoom?>" class="btn btn-danger btn-sm deleteCategory" data-id="1">
                                        <i class="fas fa-undo-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                $i++;
                                }?>
                          
                         
                            <!-- Add more rows dynamically here using JavaScript -->
                        </tbody>
                    </table>

                    
                    
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <a onclick="return confirmRestoreAll()" href="index.php?act=restoreRoom">
                        <button class="btn btn-outline-primary" type="button" id="btnRestoreAll">
                            <i class="fas fa-undo mr-2"></i> Khôi phục toàn bộ
                        </button>
                        </a>
                    </div>
                </div>
                
                
            </div>
        </div>

    </div>

</div>

</div>
<!-- /.container-fluid -->
<script>
        function confirmRestore() {
            return confirm('Bạn có chắc chắn muốn khôi phục phòng này không?');
        }
        function confirmRestoreAll() {
            return confirm('Bạn có chắc chắn muốn khôi phục toàn bộ không?');
        }
    </script>