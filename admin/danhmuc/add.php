<!-- ARTICLE -->
<article class="mt-4 mb-5" style="padding-bottom: 200px;">
<h5 class="alert alert-success">Thêm mới danh mục</h5>
       <form action="./index.php?act=adddm" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label " style="font-weight: bold;">Mã loại</label>
            <input type="text" class="form-control w-50 bg-light" id="formGroupExampleInput" placeholder="auto number" disabled>
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label"  style="font-weight: bold;">Tên loại</label>
            <input type="text" name="namedm" class="form-control w-50" id="formGroupExampleInput2">
          </div>
          <div class="form-group">
            <input type="submit" name="btn_add" class="btn btn-success" value="Thêm mới">
            <input type="reset" name="btn_retype"  class="btn btn-danger" value="Nhập lại">
            <a href="./index.php?act=listdm" class="btn btn-primary">Danh sách</a>
          </div>
          <br>
         <?php 
         if(isset($notice) && $notice > 0) { 
          echo $notice;
         }
         ?>
       
       </form>
      </article>