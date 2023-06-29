<!-- ARTICLE -->
<article>
  <div class="mt-4">
    <h5 class="alert alert-success mt-4">Danh sách sản phẩm</h5>
  </div>
  <div class="filter">
    <form action="./index.php?act=listsp" method="post">
      <input type="text" name="kyw" style="border: 1px solid #999; border-radius: 3px; outline: none; padding: 2px 0px 2px 10px;">
      <select name="iddm" style="border: 1px solid #999; border-radius: 3px; padding: 3px 0px; font-size: 15px; color: #333;">
        <option value="0" selected>Tất cả</option>
        <?php 
        foreach($listdm as $dm ) { 
          extract($dm);
          if($iddm == $id) {
            echo '<option value= "'.$id.'" selected>'.$namedm.'</option>';
          } else { 
            echo '<option value= "'.$id.'">'.$namedm.'</option>';
          }
        }
        ?>
       </select>
       <input type="submit" value="Tìm kiếm" name="btn_search" style="background-color: #36854f; border: none; font-size: 15px; color: #ffff; width: 70px; height: 30px; border-radius: 3px;">
    </form>
  </div>
  <table class="table mt-4 mb-4">
    <thead class="table-success">
      <tr>
        <th></th>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Hình ảnh</th>
        <th>Lượt xem</th>
        <th>Thao tác</th>
      
      </tr>
    </thead>
    <tbody>
      <?php foreach ($listsp as $sp) {
        extract($sp);
        $suasp = "index.php?act=suasp&id=" . $id;
        $xoasp = "index.php?act=xoasp&id=" . $id;
        $anhurl = '../uploads/' . $anhsp;
        if (is_file($anhurl)) {
        $anhsp = "<img src='".$anhurl."' alt= 'Ảnh sản phẩm' style='width: 80px; height: 80px; border: 1px solid #3b8dc4 '/>";
        } else {
          $anhsp = "Không có ảnh !";
        }
        echo
        ' <tr>
                <td class="pb-3 pt-3"><input type="checkbox" name="" id=""></td>
                    <td class="pb-3 pt-3">' . $id . '</td>
                    <td class="pb-3 pt-3">' . $namesp . '</td>
                    <td class="pb-3 pt-3">' . $giasp . '</td>
                    <td class="pb-3 pt-3">' . $anhsp . '</td>
                    <td class="pb-3 pt-3">' . $luotxemsp . '</td>
                    <td class="td-opt pb-3 pt-3 col-sm-2">
                        <a href="' . $suasp . '" class="btn-edit">Sửa</a>
                        <a href="' . $xoasp . '" class="btn-delete">Xóa</a>
                    </td>
               </tr>';
      }

      ?>
    </tbody>
  </table>
  <div class="wrap-btn" style="display: flex; justify-content: space-between">
    <div class="form-group pb-4">
      <input type="submit" class="btn btn-success" value="Chọn tất cả">
      <input type="submit" class="btn btn-warning" value="Bỏ chọn tất cả">
      <input type="submit" class="btn btn-danger" value="Xóa các mục đã chọn">
      <a href="./index.php?act=addsp" class="btn btn-primary">Nhập thêm</a>
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