<aside class="col-sm-3 mt-3">
  <!-- form login -->
  <div class="login-form">
    <div class="card">
      <div class="card-header" style="font-weight: 500">TÀI KHOẢN</div>
      <?php
      if (isset($_SESSION['user'])) {
        extract($_SESSION['user']);

      ?>
        <div class="opt-acc">
          <div class="wrap-customer">
            <div class="name-customer" style=" margin-top: 10px; ">
              <h3 class="bg-info p-1 m-3" style="text-align: center; border-radius: 3px; font-size: 15px; margin: 0 auto; padding: 0px; margin: 0px;">Hello, <?= $user ?></h3>
            </div>
          </div>
          <ul>
          <li>
              <a href="index.php?act=mybill">Đơn hàng của tôi</a>
            </li>
            <li>
              <a href="index.php?act=doimk">Đổi mật khẩu ?</a>
            </li>
            <li>
              <a href="index.php?act=capnhattk">Cập nhật tài khoản</a>
            </li>
            <?php
            if ($vaitro == 1) { ?>
              <li>
                <a href="admin/index.php">Đăng nhập Admin</a>
              </li>
            <?php } ?>
            <li>
              <a href="index.php?act=dangxuat">Đăng xuất</a>
            </li>
          </ul>
        </div>
      <?php
      } else {
      ?>
        <form action="index.php?act=dangnhap" method="post">
          <div class="mb-3 mt-3 px-3">
            <label for="username" class="form-label">Tên đăng nhập:</label>
            <input type="text" class="form-control" placeholder="Nhập username" name="user" />
          </div>
          <div class="mb-3 px-3">
            <label for="pwd" class="form-label">Mật khẩu:</label>
            <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password" />
          </div>
          <div class="form-check mb-3 mx-3">
            <label class="form-check-label" style="font-size: 14px">
              <input class="form-check-input" type="checkbox" name="remember" />
              Ghi nhớ tài khoản
            </label>
          </div>
          <input type="submit" class="btn btn-primary mx-3 pb-2 mb-3 trans-04" value="Đăng nhập" name="dangnhap">
          <div class="opt-acc">
            <ul>
              <li><a href="index.php?act=quenmk">Quên mật khẩu ?</a></li>
              <li><a href="index.php?act=dangky">Đăng ký tài khoản mới</a></li>
            </ul>
          </div>
    </form>
      <?php } ?>

    </div>
  </div>

  <!-- list opt -->
  <div class="list-opt mt-4">
    <div class="card">
      <div class="card-header" style="border-bottom: none; font-weight: 500">
        DANH MỤC
      </div>
      <div class="card-text">
        <ul class="list-group" style="border-radius: inherit; border-right: none">
          <?php foreach ($showlistdm as $dm) {
            extract($dm);
            $linkdm = "index.php?act=sanpham&iddm=" . $id;
            echo ' <li class="list-group-item list-group-item-action" style="border-left: none; border-right: none">
              <a href="' . $linkdm . '" class="cate">' . $namedm . '</a>
            </li>';
          }
          ?>
        </ul>
      </div>
      <form action="index.php?act=sanpham" method="post">
        <div class="card-footer" style="border-top: none; display: flex;">
          <input type="text" class="form-control" placeholder="Nhập từ khóa tìm kiếm" name="iptimkiem" />
          <input type="submit" name="btntimkiem" value="Tìm kiếm" class="btn btn-primary ms-2">
        </div>
      </form>
    </div>
  </div>

  <!-- list top 10 -->
  <div class="top10 mt-4">
    <div class="card">
      <div class="card-header" style="font-weight: 500">
        TOP 10 YÊU THÍCH
      </div>
      <div class="card-body">
        <ul class="ultop10">
          <?php
          foreach ($top10sp as $topsp) {
            extract($topsp);
            $linksp = "index.php?act=sanphamct&idsp=" . $id;
            $anhsp = $img_path . $anhsp;
            echo '    <li class="pb-3">
              <a href="' . $linksp . '"><img src="' . $anhsp . '" alt="" style="
              border: 1px solid #dee3e0;
              width: 30px;
              border-radius: 5px;
              margin-right: 10px;
            " /></a>
              
              <a href="' . $linksp . '">' . $namesp . '</a>
            </li>
           ';
          }
          ?>

        </ul>
      </div>
    </div>
  </div>
</aside>