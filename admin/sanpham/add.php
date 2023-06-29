 <!-- ARTICLE -->
 <article class="mt-4">
 <h5 class="alert alert-success">Thêm mới sản phẩm</h5>
   <form class="form-insert" action="./index.php?act=addsp" method="post" enctype="multipart/form-data">
       <!-- form1 -->
       <div class="form1 mt-4">
         <div class="mb-3">
           <label class="form-label" style="font-weight: bold; text-transform: uppercase;">Danh mục</label>
           <select name="iddm" class="form-select" aria-label="Default select example">
            <option value="0">Chọn danh mục</option>
        <?php 
        foreach($listdm as $dm ) { 
          extract($dm);
          echo '<option value='.$id.'>'.$namedm.'</option>';
        }
        ?>
       </select>
         </div>
       <!-- form-2 -->
       <div class="form1 ">
         <div class="mb-3">
           <label class="form-label" style="font-weight: bold; text-transform: uppercase;">Tên sản phẩm</label>
           <input type="text" class="form-control" name="namesp"/>
         </div>
         <div class="form1 ">
         <div class="mb-3">
           <label class="form-label" style="font-weight: bold; text-transform: uppercase;">Giá</label>
           <input type="text" class="form-control" name="giasp"/>
         </div>
       </div>
       </div>
       <!-- form-3-->
       <div>
           <label class="form-label" style="font-weight: bold; text-transform: uppercase;">Hình ảnh</label>
           <div class="border" style="border-radius: 8px; padding: 6px">
             <div class="form-group">
               <input type="file" class="form-control-file" style="font-size: 13px; margin-left: 10px;" name="anhsp"/>
             </div>
           </div>
         </div>
     
     </div>
  
   <div class="mb-3 mt-3">
     <label for="exampleFormControlTextarea1" class="form-label" style="font-weight: bold;">Mô tả</label>
     <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="motasp"></textarea>
   </div>
   <div class="form-group mb-2">
            <input type="submit" name="btn_add" class="btn btn-success" value="Thêm mới">
            <input type="reset" name="btn_retype"  class="btn btn-danger" value="Nhập lại">
            <a href="./index.php?act=listsp" name="btn_list" class="btn btn-primary">Danh sách</a>
          </div>
          </form>
   <?php 
         if(isset($notice) && $notice > 0) { 
          echo $notice;
         }
         ?>
 </article>