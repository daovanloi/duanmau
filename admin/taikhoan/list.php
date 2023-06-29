<!-- ARTICLE -->
<article >
<h5 class="alert alert-success mt-4">Danh sách khách hàng</h5>
        <table class="table mt-4 mb-4">
            <thead class="table-success">
              <tr>
                <th></th>
                <th>Mã KH</th>
                <th>Tên đăng nhập</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Vai trò?</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach($listtk as $tk) {
                extract($tk);
                $suatk = "index.php?act=suatk&id=".$id;
                $xoatk = "index.php?act=xoatk&id=".$id;
            echo ' <tr>
            <td class="pb-3 pt-3"><input type="checkbox" name="" id=""></td>
            <td class="pb-3 pt-3">'.$id.'</td>
            <td class="pb-3 pt-3">'.$user.'</td>
            <td class="pb-3 pt-3">'.$email.'</td>
            <td class="pb-3 pt-3">'.$diachi.'</td>
            <td class="pb-3 pt-3">'.$sdt.'</td>
            <td class="pb-3 pt-3">'.$vaitro.'</td>
            <td class="td-opt pb-3 pt-3">
                <a href="'.$suatk.'" class="btn-edit">Sửa</a>
                <a href="'.$xoatk.'" class="btn-delete">Xóa</a>
            </td>
          </tr>'; 
              }
              ?>
            </tbody>
          </table>
          <div class="wrap-btn" style="display: flex; justify-content: space-between">
          <div class="form-group pb-4">
            <button class="btn btn-success" name="">Chọn tất cả</button>
            <button class="btn btn-warning" name="btn_clear">Bỏ chọn tất cả</button>
            <button class="btn btn-danger" name="btn_delete">Xóa các mục đã chọn</button>
            <a href="../index.php?act=dangky" name="btn_add" class="btn btn-primary">Nhập thêm</a>
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