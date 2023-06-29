 <div class="row">
 <!-- ARTICLE -->
 <article class="col-sm-9 mt-3">

     <h6 class="alert alert-success text-center">
         Cảm ơn quý khách đã đặt hàng!
     </h6>
     <?php
        if (isset($bill) && is_array($bill)) {
            extract($bill);
        }
        ?>
     <!-- mã đơn hàng -->
     <div class="card">
         <div class="card-header cart">Thông tin đơn hàng</div>
         <div class="card-body">
             <li class="fw-semibold">Mã đơn hàng: <span class="fw-bold text-danger">DANM-<?= $bill['id']; ?></span></li>
             <li class="fw-semibold">Thời gian đặt hàng: <span class="fw-bold text-danger"><?= $bill['ngaydathang']; ?></span></li>
             <li class="fw-semibold">Tổng đơn hàng: <span class="fw-bold text-danger"><?= $bill['tongdonhang']; ?></span></li>
         </div>
     </div>
     <!-- thông tin đặt hàng -->
     <div class="card mt-3">
         <div class="card-header cart">Thông tin khách hàng</div>
         <div class="card-body">
             <div class="wrap-infocart mar-t5">
                 <span>Người đặt hàng: </span>
                 <input name="user" type="text" class="ip-cart ml-100" value="<?= $user ?>" disabled/>
             </div>
             <div class="wrap-infocart mar-t5">
                 <span>Địa chỉ: </span>
                 <input name="diachi" type="text" class="ip-cart ml-165" value="<?= $diachi ?>" disabled/>
             </div>
             <div class="wrap-infocart mar-t5">
                 <span>Email: </span>
                 <input name="email" type="email" class="ip-cart ml-175" value="<?= $email ?>" disabled/>
             </div>
             <div class="wrap-infocart mar-t5">
                 <span>Điện thoại: </span>
                 <input name="sdt" type="text" class="ip-cart ml-140" value="<?= $sdt ?>" disabled/>
             </div>
         </div>
     </div>
         <!-- phương thức thanh toán -->
         <div class="card mt-3">
             <div class="card-header cart">Phương thức thanh toán</div>
             <div class="card-body">
                 <div>
                     <span class="text-danger fw-bold"><?= $bill['pttt'] ?></span>
                 </div>
             </div>
         </div>
         <!-- thông tin giỏ hàng -->
         <div class="card mt-3 mb-3">
             <div class="card-header cart">Chi tiết giỏ hàng</div>
             <div class="card-body">
                 <table class="table table-hover">
                     <?php
                        show_billct($billct);
                        ?>
                 </table>
             </div>
         </div>
         <div class=" mt-2">
      <a href="index.php"><input type="button" class="btn btn-warning" value="Xem thêm sản phẩm"></a>
    </div>
         <h3>
            <?php 
            if(isset($notice) && $notice != "") { 
                echo $notice;
            }
            ?>
         </h3>
 </article>
 <?php include "./view/aside.php"; ?>
        </div>