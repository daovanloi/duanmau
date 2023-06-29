<article>
  <h5 class="alert alert-success mt-3">Danh sách đơn hàng</h5>
  <div class="filter">
    <form action="./index.php?act=dsdh" method="post">
      <input type="text" name="kyw" style="border: 1px solid #999; border-radius: 3px; outline: none; padding: 2px 0px 2px 10px;">
       <input type="submit" value="Tìm kiếm" name="timbill" style="background-color: #36854f; border: none; font-size: 15px; color: #ffff; width: 70px; height: 30px; border-radius: 3px;">
    </form>
  </div>
  <table class="table mt-4 mb-4">
    <thead class="table-success">
      <tr>
        <th></th>
        <th>Mã đơn hàng</th>
        <th>Khách hàng</th>
        <th>Số lượng hàng</th>
        <th>Tổng giá trị đơn hàng</th>
        <th>Ngày đặt hàng</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($listbill as $bill) {
        extract($bill);
        $xoabill = "index.php?act=xoabill&id=".$id;
        // nối chuỗi để in ra khách hàng;
        $kh = '
                  <span class="fw-semibold">' . $user . '</span><br>
                  ' . $email . ' <br>
                  ' . $diachi . ' <br>
                  ' . $sdt . ' 
                ';
                $countsp = loadall_cart_count($bill['id']);
                $ttdh = get_ttdh($bill['trangthai']);
        echo '   <tr>
          <td class="pb-3 pt-3"><input type="checkbox" name="" id=""></td>
          <td class="pb-3 pt-3">DAM-' . $id . '</td>
          <td class="pb-3 pt-3">'.$kh.'</td>
          <td class="pb-3 pt-3">'.$countsp.'</td>
          <td class="pb-3 pt-3">'.$tongdonhang.'</td>
          <td class="pb-3 pt-3">'.$ngaydathang.'</td>
          <td class="pb-3 pt-3">'.$ttdh.'</td>
          <td class="td-opt pb-3 pt-3">
              <a href="" class="btn-edit">Sửa</a>
              <a href="'.$xoabill.'" class="btn-delete">Xóa</a>
          </td>
          </tr>';
      }
      ?>
    </tbody>
  </table>
  <div class="wrap-btn" style="display: flex; justify-content: space-between">
    <div class="form-group pb-4">
      <input type="button" class="btn btn-success" value="Chọn tất cả">
      <input type="button" class="btn btn-warning" value="Bỏ chọn tất cả">
      <input type="button" class="btn btn-danger" value="Xóa các mục đã chọn">
      <input type="button" class="btn btn-success" value="Nhập thêm">
    </div>
    <nav aria-label="...">
      <ul class="pagination">
        <li class="page-item disabled">
          <span class="page-link">Previous</span>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item " aria-current="page">
          <span class="page-link">2</span>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
  </div>

</article>