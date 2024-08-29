<?php
if(isset($getone)&& is_array($getone)){
    extract($getone);
}
?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Phòng chiếu </h1>

<!-- Content Row -->
<div class="row">

    <!-- Table column -->
    <div class="col-lg-12">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sửa phòng</h6>
            </div>
            <div class="card-body">
            
                <div class="input-group mb-3 w-100">
               <form class="input-group mb-3 w-50"   action="index.php?act=updateRoom" method="post" >
               <input name="id_phong" type="hidden" class="form-control" id="inputCategoryName"value="<?=$id_phong ?>" >
               <input name="ten_phong" type="text" class="form-control" id="inputCategoryName" value="<?=$ten_phong ?>" >
               <input name="suc_chua" type="text" class="form-control" id="inputCategoryName" value="<?=$suc_chua ?>" >
                    <div class="input-group-append">
                       
                        <input class="btn btn-success" id="btnAddCategory" type="submit" name="updateBtn" value="Cập nhật">
                           
                       
                    </div>
             
               </form>
         
                </div>
                <span style="color:red;"><?php if(isset($thong_bao)){
                 echo"<p >".$thong_bao."</p>";
                                
                }else {
                  echo $thong_bao = "";
                }
                  ?></span>
            </div>
        </div>

    </div>

</div>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <?= $error ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
</div>