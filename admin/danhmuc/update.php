<!-- ARTICLE -->
<?php
if (is_array($dm)) {
    extract($dm);
}
?>
<article class="mt-4 mb-5" style="padding-bottom: 200px;">
    <h5 class="alert alert-success">Cập nhật danh mục</h5>
    <form action="./index.php?act=updatedm" method="post">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label " style="font-weight: bold;">Mã loại</label>
            <input type="text" class="form-control w-50 bg-light" id="formGroupExampleInput" placeholder="auto number" disabled>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label" style="font-weight: bold;">Tên loại</label>
            <input type="text" name="namedm" class="form-control w-50" id="formGroupExampleInput2" value="<?= $namedm ?>">
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
            <input type="submit" name="btn_update" class="btn btn-success" value="Cập nhật">
            <input type="reset" name="btn_retype" class="btn btn-danger" value="Nhập lại">
            <a href="./index.php?act=listdm" name="btn_list" class="btn btn-primary">Danh sách</a>
        </div>
        <br>
        <?php
        if (isset($notice1) && ($notice1 != "")) {
            echo $notice1;
        }
        ?>
    </form>
</article>