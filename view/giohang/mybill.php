<div class="row">
<article class="col-sm-9 mt-3">
    <div class="card">
      <div class="card-header cart">Giỏ hàng</div>
      <div class="card-body">
        <table class="table table-hover">
        <thead>
                  <tr>
                    <th>Mã đơn hàng</th>
                    <th>Thời gian đặt hàng</th>
                    <th>Số lượng</th>
                    <th>Tổng giá trị đơn hàng</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                    if(is_array($listbill)) { 
                        foreach($listbill as $bill) {
                            extract ($bill);
                            $xoabill = "index.php?act=xoabill&id=".$id;
                            $ttdh = get_ttdh($bill['trangthai']);
                            $countsp = loadall_cart_count($bill['id']);
                            echo '  
                            <tr>
                            <td>DAM-'.$id.'</td>
                            <td>'.$ngaydathang.'</td>
                            <td>'.$countsp.'</td>
                            <td>'.$tongdonhang.'</td>
                            <td>'.$ttdh.'</td>
                            <td><a href="'.$xoabill.'" class="btn-delete">Xóa</a></td>
                          </tr>';
                        }
                    }
                    ?>
                
                </tbody>
        </table>
      </div>
    </div>
    <div class="mt-2">
    <a href="index.php?act=bill"><input type="button" class="btn btn-success" value="Đặt hàng"></a>
      <a href="index.php?act=xoacart"><input type="button" class="btn btn-danger" value="Xóa giỏ hàng"></a>
      <a href="index.php"><input type="button" class="btn btn-warning" value="Xem thêm sản phẩm"></a>
    </div>
</article>
<?php 
include "view/aside.php";
?>
</div>