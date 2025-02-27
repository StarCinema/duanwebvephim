<style>
    .custom-img-height {
        max-height: 200px;
        /* Đặt chiều cao tối đa */
    }
</style>
<script>
        function confirmDelete() {
            return confirm('Bạn có chắc chắn muốn xóa mục này không?');
        }
</script>
<!-- main page -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Phim</h1>

    <!-- bộ lọc -->
    <div class="row mb-4">
        <div class="col-lg-12">
            <form class="form-inline" method="post" action="index.php?act=film">
                <div class="form-group mr-2">
                    <label for="filterCategory" class="mr-2">Loại phim:</label>
                    <select name="danh_muc" class="form-control" id="filterCategory">
                        <option value="0">Tất cả</option>
                        <?php foreach ($listdanhmuc as $item) {
                            extract($item);
                            ?>

                            <option value="<?= $id_danh_muc ?>"><?= $ten_danh_muc ?></option>

                            <?php
                        } ?>
                    </select>
                </div>
                <input name="tim_btn" type="submit" class="btn btn-primary" value="Lọc">
            </form>
        </div>
    </div>

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
                                foreach ($data as $key => $phim) {
                                  ?>
                                <tr>
                                    <td><?=$key +1?></td>
                                    <td><?=$phim['ten_phim'] ?></td>
                                    <td><?=$phim['thoi_gian_tao'] ?></td>
                                    <td><?=$phim['ten_danh_muc'] ?></td>
                                    <td>
                                        <!-- View details link with icon -->
                                        <a href="index.php?act=filmDetail&idFilm=<?=$phim['id_phim'] ?>" class="btn btn-info btn-sm viewDetails"
                                            data-id="1">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <!-- Edit link with icon -->
                                        <a href="index.php?act=editFilm&idFilm=<?=$phim['id_phim'] ?>" class="btn btn-primary btn-sm editCategory"
                                            data-id="1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Delete link with icon -->
                                        <a onclick="return confirmDelete()"
                                            href="index.php?act=deleteFilm&idFilm=<?=$phim['id_phim'] ?>"
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


                </div>
            </div>

        </div>

    </div>

</div>

<!-- end main page-fluid -->