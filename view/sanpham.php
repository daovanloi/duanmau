<!-- container-row -->
<div class="row">
  <!-- ARTICLE -->
  <article class="col-sm-9">
  <h3 class="alert alert-success mt-3">Sản phẩm: <strong><?= $namedm ?></strong> </h3>
    <!-- product -->
    <div class="container text-center">
      <!-- row 1 -->
    <div class="row">
        <?php foreach ($listsp as $sp) {
          extract($sp);
          $linksp = "index.php?act=sanphamct&idsp=". $id;
          $anhmoi = $img_path . $anhsp;
          echo '<div class="col border mr-4 mt-3">
                <div class="block-img text-center">
                <a href="'.$linksp.'"><img src=' . $anhmoi . ' alt="" width="220px" height="230px" style="margin-bottom: 20px" /></a>
                </div>
                <span>$' . $giasp . '</span>
                <h4><a href="'.$linksp.'">' . $namesp . '</a></h4>
              </div>';
        } ?>

      </div>

    </div>
  </article>
  <!-- ASIDE -->
 <?php include "aside.php" ?>
</div>