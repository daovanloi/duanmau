<!-- container-row -->
<div class="row">
  <!-- ARTICLE -->
  <article class="col-sm-9">
    <!-- slideshow -->
    <div class="slide-show mt-3">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./view/images/slide1.jpg" class="d-block w-100" alt="img layout" style="height: 500px" />
          </div>
          <div class="carousel-item">
            <img src="./view/images/slide2.jpg" class="d-block w-100" alt="img layout" style="height: 500px" />
          </div>
          <div class="carousel-item">
            <img src="./view/images/slide3.jpg" class="d-block w-100" alt="img layout" style="height: 500px" />
          </div>
          <div class="carousel-item">
            <img src="./view/images/slide4.jpg" class="d-block w-100" alt="img layout" style="height: 500px" />
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!-- product -->
    <div class="container text-center">
      <!-- row 1 -->
      <div class="row">
        <?php foreach ($spnew as $sp) {
          extract($sp);
          $linksp = "index.php?act=sanphamct&idsp=" . $id;
          $anhmoi = $img_path . $anhsp;
          echo '  <div class="col border mr-4 mt-3">
          <div class="block-img text-center">
          <a href="' . $linksp . '"> <img
              src="' . $anhmoi . '"
              alt=""
              width="200px"
              height="200px"
              style="margin-bottom: 20px"
            />
            </a>
          </div>
          <div class="pandname">
          <span>$' . $giasp . '</span>
          <h4><a href="' . $linksp . '">' . $namesp . '</a></h4>
        </div>
          <form action="index.php?act=addtocart" method="post" class="btn-cart">
          <input type="hidden" name="id" value="' . $id . '">
          <input type="hidden" name="namesp" value="' . $namesp . '">
          <input type="hidden" name="anhsp" value="' . $anhsp . '">
          <input type="hidden" name="giasp" value="' . $giasp . '">
            <input type="submit" class="addtocart" name="addtocart" value="Thêm vào giỏ hàng">
          </form>
        </div>';
        } ?>

      </div>

    </div>
  </article>
  <!-- ASIDE -->
  <?php include "aside.php" ?>
</div>