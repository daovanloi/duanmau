<div class="row">
    <article class="col-sm-9 mt-3">
        <!-- thông tin đặt hàng -->
        <form action="index.php?act=billconfirm" method="post">
        <div class="card">
            <div class="card-header cart">Thông tin đặt hàng</div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['user'])) {
                    $user = $_SESSION['user']['user'];
                    $diachi = $_SESSION['user']['diachi'];
                    $email = $_SESSION['user']['email'];
                    $sdt = $_SESSION['user']['sdt'];
                } else {
                    $user = "Vui lòng đăng nhập để đặt hàng!";
                    $diachi = "Vui lòng đăng nhập để đặt hàng!";
                    $email = "Vui lòng đăng nhập để đặt hàng!";
                    $sdt = "Vui lòng đăng nhập để đặt hàng!";
                }
                ?>
                <div class="wrap-infocart mar-t5">
                    <span>Người đặt hàng: </span>
                    <input name="user" type="text" class="ip-cart ml-100" value="<?= $user ?>" readonly/>
                </div>
                <div class="wrap-infocart mar-t5">
                    <span>Địa chỉ: </span>
                    <input name="diachi" type="text" class="ip-cart ml-165" value="<?= $diachi ?>" readonly/>
                </div>
                <div class="wrap-infocart mar-t5">
                    <span>Email: </span>
                    <input name="email" type="email" class="ip-cart ml-175" value="<?= $email ?>" readonly/>
                </div>
                <div class="wrap-infocart mar-t5">
                    <span>Điện thoại: </span>
                    <input name="sdt" type="text" class="ip-cart ml-140" value="<?= $sdt ?>" readonly/>
                </div>
            </div>
        </div>
        <!-- phương thức thanh toán -->
        <div class="card mt-3">
            <div class="card-header cart">Phương thức thanh toán</div>
            <div class="card-body">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pttt" id="inlineRadio1" value="1" checked>
                    <label class="form-check-label" for="inlineRadio1">Thanh toán khi nhận hàng</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pttt" id="inlineRadio2" value="2">
                    <label class="form-check-label" for="inlineRadio2">Chuyển khoản ngân hàng</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pttt" id="inlineRadio3" value="3">
                    <label class="form-check-label" for="inlineRadio3">Thanh toán Online</label>
                </div>
            </div>
        </div>
        <!-- thông tin giỏ hàng -->
        <div class="card mt-3 mb-3">
            <div class="card-header cart">Thông tin giỏ hàng</div>
            <div class="card-body">
                <table class="table table-hover">
                    <?php viewcart(0); ?>
                </table>
            </div>
        </div>
        <input type="submit" name="orderconfirm" class="btn btn-success" value="Xác nhận đặt hàng">
        <a href="index.php?act=viewcart"><input type="button" class="btn btn-danger" value="Quay lại giỏ hàng"></a>
        </form>
    </article>
    <?php include "./view/aside.php"; ?>
</div>