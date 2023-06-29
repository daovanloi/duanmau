  <!-- container-row -->
  <div class="row">
      <!-- ARTICLE -->
      <article class="col-sm-9">
          <!-- form -->
          <div class="form-customer">
              <!-- 2 thanh thông báo -->
              <div class="header-notice mb-4">
                  <div class="alert alert-danger text-uppercase mt-3" role="alert">
                      Quên mật khẩu
                  </div>
              </div>
              <!-- form đăng nhập -->
              <form action="index.php?act=quenmk" method="post" style="margin-left: 10px">
                  <div class="form-group mb-3">
                      <label for="exampleInputEmail1" style="font-weight: bold; margin-bottom: 10px">Tên đăng nhập</label>
                      <input name="user" type="text" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp" />
                  </div>
                  <div class="form-group mb-3">
                      <label for="exampleInputEmail1" style="font-weight: bold; margin-bottom: 10px">Email</label>
                      <input type="email" name="email" class="form-control w-50" id="exampleInputEmail1" aria-describedby="emailHelp" />
                  </div>
                  <input name="timmk" type="submit" class="btn btn-primary" value="Tìm lại mật khẩu">
                  <input type="reset" class="btn btn-danger" value="Nhập lại">
              </form>
          </div>

         <h3 class="notice-success" style="font-size: 17px; color: red; margin: 15px 10px;">
         <?php 
         if(isset($noticeerr) && ($noticeerr != "")) { 
            echo $noticeerr;
         } 
         ?>
         </h3>
          <div class="img-login" style="text-align: center;">
              <img src="view/images/forgotpass.png" alt="" style="width: 500px; height: 500px; margin-top: 200px;" />
          </div>
      </article>
      <?php include "view/aside.php"; ?>
</div>