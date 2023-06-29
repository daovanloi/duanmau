<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <h5 class="alert alert-danger mt-4">Đã có lỗi xảy ra</h5>
    </div>
    <h3 class="text-danger pt-1" style="font-size: 17px; margin: 30px 0px;">
        <?php
        if (isset($notice) && ($notice != "")) {
            echo $notice;
        } else if (isset($noticebill) && ($noticebill != "")) {
            echo $noticebill;
        }
        ?>
    </h3>
    <div class="img-404 text-center py-3">
        <img src="view/images/sorry.png" alt="Ảnh thông báo lỗi" width="700px;">
    </div>
</body>

</html>