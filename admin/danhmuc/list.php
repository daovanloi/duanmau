<!-- ARTICLE -->
<article>
<h5 class="alert alert-success mt-4">Danh sách loại hàng</h5>
    <table class="table mt-4 mb-4">
        <thead class="table-success">
            <tr>
                <th></th>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listdm as $dm) {
                extract($dm);
                $editdm = "./index.php?act=editdm&id=" . $id;
                $deletedm = "./index.php?act=deletedm&id=" . $id;
                echo '<tr>
<td class="pb-3 pt-3"><input type="checkbox" name="" id=""></td>
<td class="pb-3 pt-3">' . $id . '</td>
<td class="pb-3 pt-3">' . $namedm . '</td>
<td class="td-opt pb-3 pt-3">
    <a href="' . $editdm . '" class="btn-edit">Sửa</a>
    <a href="' . $deletedm . '" class="btn-delete">Xóa</a>
</td>
</tr>';
            }

            ?>
        </tbody>
    </table>
    <div class="wrap-btn" style="display: flex; justify-content: space-between">
        <div class="form-group pb-4">
        <input type="submit" class="btn btn-success" value="Chọn tất cả">
            <input type="submit" class="btn btn-warning" name="btn_clear" value="Bỏ chọn tất cả">
            <input type="submit" class="btn btn-danger" name="btn_delete" value="Xóa các mục đã chọn">
            <a href="./index.php?act=adddm" name="btn_add" class="btn btn-primary">Nhập thêm</a>
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