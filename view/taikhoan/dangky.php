 <!-- container-row -->
 <div class="row">
     <!-- ARTICLE -->
     <article class="col-sm-9">
         <!-- form -->
         <div class="form-customer">
             <!-- 2 thanh thông báo -->
             <div class="header-notice mb-4">
                 <div class="alert alert-info text-uppercase mt-3" role="alert">
                     Đăng ký thành viên
                 </div>
             </div>
             <!-- form đăng nhập -->
             <form style="margin-left: 10px" action="index.php?act=dangky" method="post">
                 <div class="form-group mb-3">
                     <label for="exampleInputEmail1" style="font-weight: bold; margin-bottom: 10px">Tên đăng nhập</label>
                     <input type="text" name="user" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp" />
                 </div>
                 <div class="form-group mb-3">
                     <label for="exampleInputEmail1" style="font-weight: bold; margin-bottom: 10px">Mật khẩu</label>
                     <input type="password" name="password" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp" />
                 </div>
                 <div class="form-group mb-3">
                     <label for="exampleInputEmail1" style="font-weight: bold; margin-bottom: 10px">Email</label>
                     <input type="email" name="email" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp" />
                 </div>
                 <input type="submit" name="dangky" class="btn btn-primary " value="Đăng ký">
                 <input type="reset" name="nhaplai" value="Nhập lại" class="btn btn-danger">
             </form>
             <h3 class="notice-success" style="font-size: 17px; color: #2cd45f; margin: 15px 10px;">
         <?php 
         if(isset($notice) && ($notice != "")) { 
            echo $notice;
         }
         ?>
         </h3>
         </div>
         <div class="img-login" style="text-align: center;">
              <img src="view/images/joinus.png" alt="" style="width: 500px; height: 500px; margin-top: 200px;" />
          </div>
         
     </article>
     <?php include "view/aside.php"; ?>
 </div>