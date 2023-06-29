 <?php
    if (is_array($tk)) {
        extract($tk);
    }
    ?>

 <!-- ARTICLE -->
 <article>
 <h5 class="alert alert-success mt-3">Cập nhật tài khoản</h5>
     <form action="index.php?act=capnhattk" method="post" class="form-insert">
         <div class="wrap-formcus">
             <!-- form1 -->
             <div class="form1 pt-4">
                 <div class="mb-3">
                     <label class="form-label" style="font-weight: bold; text-transform: uppercase">Mã khách hàng</label>
                     <input name="id" type="text" class="form-control" style="background-color: #e4e6eb;" readonly value="<?= $id ?>" />
                 </div>
                 <div class="mb-3">
                     <label class="form-label" style="font-weight: bold; text-transform: uppercase">Tên đăng nhập</label>
                     <input name="user" type="text" class="form-control" value="<?= $user ?>" />
                 </div>
                 <div class="mb-3">
                     <label class="form-label" style="font-weight: bold; text-transform: uppercase">Email</label>
                     <input name="email" type="email" class="form-control" value="<?= $email ?>" />
                 </div>
             </div>
             <!-- form-2 -->
             <div class="form1 pt-4">
                 <div class="mb-3">
                     <label class="form-label" style="font-weight: bold; text-transform: uppercase">Địa chỉ</label>
                     <input name="diachi" type="text" class="form-control" value="<?= $diachi ?>" />
                 </div>
                 <div class="mb-3">
                     <label class="form-label" style="font-weight: bold; text-transform: uppercase">Số điện thoại</label>
                     <input name="sdt" type="text" class="form-control" value="<?= $sdt ?>" />
                 </div>
                 <div class="mb-3">
                     <label class="form-label" style="font-weight: bold; text-transform: uppercase">Vai trò</label>
                     <input name="vaitro" type="text" class="form-control" value="<?= $vaitro ?>" />

                 </div>
             </div>
         </div>
   

     <div class="form-group pb-4">
         <input type="submit" class="btn btn-success" value="Cập nhật" name="btn_capnhat">
         <input type="reset" class="btn btn-danger" value="Nhập lại">
         <a href="index.php?act=dskh" name="btn_list" class="btn btn-primary">Danh sách</a>
     </div>
     </form>
 </article>