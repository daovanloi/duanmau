<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
$idsp = $_REQUEST['idsp'];
$listbl = loadall_bl($idsp);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="card">
        <div class="card-header text-uppercase">Bình luận</div>
        <div class="card-body">
            <?php 
            foreach($listbl as $bl) { 
                extract($bl);
                $linkdm = "index.php?act=sanpham&iddm=". $id;
                echo '  <ul style="padding: 0px 30px; margin: 0px;">
                <li>
                    <div class="flex-cmt">
                        <div class="content-cmt">
                            <span>'.$noidung.'
                            </span>
                        </div>
                        <div class="customer-cmt">
                            <p><i>'.$iduser.',</i> <span>'.$ngaybl.'</span></p>
                        </div>
                    </div>
                </li>
            </ul>
               ';
            }
            ?>  
        </div>
        <div class="card-footer">
        <?php
      if (isset($_SESSION['user'])) {
        extract($_SESSION['user']);
      ?>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="flex-ip">
                <input type="hidden" name="idsp" value="<?= $idsp ?>">
                <div class="ip-cmt">
                    <input name="noidung" type="text" class="form-control form-control-lg " placeholder="Nhập bình luận của bạn...">
                </div>
                <div class="btn-cmt" style="padding-left: 10px;">
                    <input name="btn_guibl" type="submit" class="btn btn-primary" value="Bình luận">
                </div>
            </form>
        <?php } else { ?>
            <h6 class="text-danger fw-bold">Bạn phải đăng nhập để bình luận!</h6>
            <?php } ?>
        </div>
        <?php
        if (isset($_POST['btn_guibl']) && $_POST['btn_guibl']) {
            $noidung = $_POST['noidung'];
            $idsp = $_POST['idsp'];
            $iduser = $_SESSION['user']['id'];
            $ngaybl = date("h:i:sa d/m/Y");
            insert_bl($noidung, $iduser, $idsp, $ngaybl);
            header("Location: ". $_SERVER['HTTP_REFERER']);
        }
        ?>
    </div>
</body>

</html>