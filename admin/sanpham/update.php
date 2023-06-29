 <!-- ARTICLE -->

 <?php
  if (is_array($sp)) {
    extract($sp);
  }
  $anhurl = "../uploads/" . $anhsp;
  if (is_file($anhurl)) {
    $anhsp = "<img src='" . $anhurl . "' alt= 'Ảnh sản phẩm' style='width: 80px; height: 80px; border: 1px solid #3b8dc4 '/>";
  } else {
    $anhsp = "Không có ảnh !";
  }
  ?>
 <article class="mt-4">
   <h5 class="alert alert-success">Cập nhật sản phẩm</h5>
   <form class="form-insert" action="./index.php?act=updatesp" method="post" enctype="multipart/form-data">
     <!-- form1 -->
     <div class="form1 mt-3">
       <div class="mb-3">
         <label class="form-label" style="font-weight: bold; text-transform: uppercase;">Danh mục</label> <br>
         <select name="iddm" class="form-select" aria-label="Default select example">
           <option value="0" selected>Tất cả</option>
           <?php
            foreach ($listdm as $dm) {
              extract($dm);
              if ($iddm == $id) {
                echo '<option value= "' . $id . '" selected>' . $namedm . '</option>';
              } else {
                echo '<option value= "' . $id . '">' . $namedm . '</option>';
              }
            }
            ?>
         </select>
       </div>
       <!-- form-2 -->

       <div class="form1 ">
         <div class="mb-3">
           <label class="form-label" style="font-weight: bold; text-transform: uppercase;">Tên sản phẩm</label>
           <input type="text" class="form-control" name="namesp" value="<?= $namesp ?>" />
         </div>
         <div class="form1 ">
           <div class="mb-3">
             <label class="form-label" style="font-weight: bold; text-transform: uppercase;">Giá</label>
             <input type="text" class="form-control" name="giasp" value="<?= $giasp ?>" />
           </div>
         </div>
       </div>
       <!-- form-3-->
       <div>
         <label class="form-label" style="font-weight: bold; text-transform: uppercase;">Hình ảnh</label>
         <div class="border" style="border-radius: 8px; padding: 6px">
           <div class="form-group">
             <input type="file" class="form-control-file" style="font-size: 13px; margin-left: 10px;" name="anhsp" />
             <?= $anhsp ?>
           </div>
         </div>
       </div>

     </div>
     <div class="mb-3 mt-3">
       <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: bold;">Mô tả</label>
       <textarea name="motasp" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $motasp ?></textarea>
     </div>

     <div class="form-group pb-4">
       <input type="hidden" name="id" value="<?= $sp['id'] ?>">
       <input type="submit" name="btn_update" class="btn btn-success" value="Cập nhật">
       <input type="reset" name="btn_retype" class="btn btn-danger" value="Nhập lại">
       <a href="./index.php?act=listsp" name="btn_list" class="btn btn-primary">Danh sách</a>

     </div>
     <?php
      if (isset($notice) && $notice > 0) {
        echo $notice;
      }
      ?>
   </form>
 </article>