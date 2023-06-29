<div class="row">
  <article class="col-sm-9">
  <h5 class="alert alert-success mt-3">Chi tiết sản phẩm</h5>
    <div class="wrap-article">
      <?php 
      extract($onesp);
      $anhsp = $img_path . $anhsp;
      echo '<div class="img-art text-center pt-5 pb-4">
       <img src="' . $anhsp . '" alt="" width="200px;">
   </div>
   <div class="list-detail-prd" >
       <ul>
           <li><a href="#">Mã sản phẩm: <span style="font-weight: bold;">' . $id . '</span></a></li>
           <li><a href="#">Tên sản phẩm: <span style="font-weight: bold;">' . $namesp . '</span></a></li>
           <li><a href="#">Đơn giá: $<span style="font-weight: bold;">' . $giasp . '</span></a></li>
           <li><a href="#">Giảm giá: <span style="font-weight: bold;">0%</span></a></li>
       </ul>
   </div>
   <div class="content-detail" style="padding: 0px 30px; margin: 0px;text-align: justify">
       <p style="padding: 0px; margin: 5px 0px;">' . $motasp . '</p>
  
</div>';

      ?>
      <div class="comment-detail mt-5">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
          <script>
            $(document).ready(function() {

              $("#binhluan").load("view/binhluan/formbinhluan.php", {
                idsp: <?= $id ?>
              });
            });
          </script>
         
          <!-- card bình luận -->
          <div class="card" id="binhluan">

          </div>
        <!-- card sp cùng loại -->
        <div class="card mt-4">
          <div class="card-header text-uppercase ">sản phẩm cùng loại</div>
          <div class="card-body list-same">
            <ul style="padding: 0px 30px; margin: 0px;">
              <?php
              foreach ($spsame as $same) {
                extract($same);
                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                echo ' <li>
                  <a href="' . $linksp . '">' . $namesp . '</a>
            </li>';
              }
              ?>


            </ul>
          </div>
          <div class="card-footer">
            <form class="flex-ip" action="index.php?act=sanpham" method="post">
              <div class="ip-cmt">
                <input type="text" class="form-control form-control-lg " placeholder="Nhập sản phẩm bạn muốn tìm kiếm..." name="iptimkiem">
              </div>
              <div class="btn-cmt" style="padding-left: 10px;">
                <input type="submit" class="btn btn-primary " value="Tìm kiếm" name="btntimkiem">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </article>
  <?php include "aside.php" ?>