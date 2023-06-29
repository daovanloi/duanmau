  <div class="row">
      <!-- ARTICLE -->
      <article class="col-sm-9">

          <!-- form -->
          <div class="form-customer">
              <!-- 2 thanh thông báo -->
              <div class="header-notice mb-4">
                  <div class="alert alert-danger text-uppercase mt-3" role="alert">
                      Cập nhật tài khoản
                  </div>
              </div>
              <?php
                if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                    extract($_SESSION['user']);
                }
                ?>
              <!-- form đăng nhập -->
              <div class="wrap-avtform">
                  <div class="avatar-user">
                      <img src="" alt="avatar user image">
                  </div>
                  <form action="index.php?act=capnhattk" method="post" style="margin-left: 10px" class="form-main">
                      <div class="form-group mb-3">
                          <label for="exampleInputEmail1" style="font-weight: bold; margin-bottom: 10px">Tên đăng nhập</label>
                          <input name="user" type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user ?>" readonly />
                      </div>
                      <div class="form-group mb-3">
                          <label for="exampleInputPassword1" style="font-weight: bold; margin-bottom: 10px">Mật khẩu</label>
                          <input name="password" type="password" class="form-control" id="exampleInputPassword1" value="<?= $password ?>" />
                      </div>
                      <div class="form-group mb-3">
                          <label for="exampleInputPassword1" style="font-weight: bold; margin-bottom: 10px">Email</label>
                          <input name="email" type="email" class="form-control" id="exampleInputPassword1" value="<?= $email ?>" />
                      </div>
                      <div class="form-group mb-3">
                          <label for="exampleInputEmail1" style="font-weight: bold; margin-bottom: 10px">Địa chỉ</label>
                          <input name="diachi" type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $diachi ?>" />
                      </div>
                      <div class="form-group mb-3">
                          <label for="exampleInputEmail1" style="font-weight: bold; margin-bottom: 10px">Số điện thoại</label>
                          <input name="sdt" type="text" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $sdt ?>" />
                      </div>
                      <!-- <div class="mb-4">
                      <label class="form-label" style="font-weight: bold; text-transform: uppercase;">Hình ảnh</label>
                      <div class="border" style="border-radius: 8px; padding: 6px">
                          <div class="form-group">
                              <input name="anhuser" type="file" class="form-control-file" style="font-size: 13px; margin-left: 10px;" />
                          </div>
                      </div>
                  </div> -->
                      <input type="hidden" name="id" value="<?= $id ?>">
                      <input type="submit" class="btn btn-primary" value="Cập nhật" name="capnhat">
                      <input type="reset" class="btn btn-danger" value="Nhập lại">
                      <h3 class="notice-success" style="font-size: 17px; color: #2cd45f; margin: 15px 10px;">
                          <?php
                            if (isset($notice) && ($notice != "")) {
                                echo $notice;
                            }
                            ?>
                      </h3>
                  </form>
              </div>
          </div>
          <div class="img-login" style="text-align: center;">
              <img src="view/images/update.png" alt="" style="width: 500px; height: 500px; margin-top: 200px;" />
          </div>

      </article>

      <?php include "view/aside.php"; ?>
  </div>