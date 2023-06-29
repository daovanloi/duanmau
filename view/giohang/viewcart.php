<div class="row">
<article class="col-sm-9 mt-3">
    <div class="card">
      <div class="card-header cart">Giỏ hàng</div>
      <div class="card-body">
        <table class="table table-hover">
            <?php viewcart(1); ?>
        </table>
      </div>
    </div>
    <div class=" mt-2">
    <a href="index.php?act=bill"><input type="button" class="btn btn-success" value="Đặt hàng"></a>
      <a href="index.php?act=xoacart"><input type="button" class="btn btn-danger" value="Xóa giỏ hàng"></a>
      <a href="index.php"><input type="button" class="btn btn-warning" value="Xem thêm sản phẩm"></a>
    </div>
</article>
<?php include "./view/aside.php"; ?>
</div>