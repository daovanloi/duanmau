 <div class="row">
     <!-- ARTICLE -->
     <article class="col-sm-9">
         <!-- form -->
         <div class="form-customer">
             <!-- 2 thanh thông báo -->
             <div class="header-notice mb-4">
                 <div class="alert alert-danger text-uppercase mt-3" role="alert">
                     Đổi mật khẩu
                 </div>
             </div>
             <!-- form đăng nhập -->
             <form action="index.php?act=doimk" method="post" style="margin-left: 10px">
             <input type="hidden" name="id" >
                 <div class="form-group mb-3">
                     <label for="exampleInputEmail1" style="font-weight: bold; margin-bottom: 10px">Tên đăng nhập</label>
                     <input name="user" type="text" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp" />
                 </div>
                 <div class="form-group mb-3">
                     <label for="exampleInputEmail1" style="font-weight: bold; margin-bottom: 10px">Email</label>
                     <input name="email" type="email" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp" />
                 </div>
                 <div class="form-group mb-3">
                     <label for="exampleInputPassword1" style="font-weight: bold; margin-bottom: 10px">Mật khẩu cũ</label>
                     <input name="password" type="password" class="form-control w-50" id="exampleInputPassword1" />
                 </div>
                 <div class="form-group mb-3">
                     <label for="exampleInputPassword1" style="font-weight: bold; margin-bottom: 10px">Mật khẩu mới</label>
                     <input name="newpass" type="password" class="form-control w-50" id="exampleInputPassword1" />
                 </div>
                 <div class="form-group mb-3">
                     <label for="exampleInputPassword1" style="font-weight: bold; margin-bottom: 10px">Xác nhận mật khẩu mới</label>
                     <input name="newpass" type="password" class="form-control w-50" id="exampleInputPassword1" />
                 </div>
                 <input type="submit" name="btn_doimk" class="btn btn-primary" value=" Đổi mật khẩu">  
                 <h3 class="notice-success" style="font-size: 17px; color: #2cd45f; margin: 15px 10px;">
                          <?php
                            if (isset($notice) && ($notice != "")) {
                                echo $notice;
                            }
                            ?>
                      </h3>
             </form>
         </div>
         <div class="img-login" style="text-align: center">
             <img src="view/images/changepass.png" alt="" style="width: 500px; height: 500px; margin-top: 200px" />
         </div>
     </article>
     <?php include "view/aside.php"; ?>
 </div>