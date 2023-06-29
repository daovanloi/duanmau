<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";
include "header.php";

//controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {

            // CONTROLLER DANH MỤC
        case "adddm":
            if (isset($_POST['btn_add']) && ($_POST['btn_add'])) {
                $namedm = $_POST['namedm'];
                insert_dm($namedm);
                $notice = "Thêm thành công!";
            }
            include "danhmuc/add.php";
            break;
        case "listdm":
            $listdm = loadall_dm();
            include "danhmuc/list.php";
            break;
        case "deletedm":
            if (isset($_GET["id"]) && $_GET["id"] > 0) {
                delete_dm($_GET['id']);
            }
            $listdm = loadall_dm();
            include "danhmuc/list.php";
            break;
        case "editdm":
            if (isset($_GET["id"]) && $_GET["id"] > 0) {
                $id = $_GET["id"];
                $dm = loadone_dm($id);
            }
            include "danhmuc/update.php";
            break;
        case "updatedm":
            if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                $namedm = $_POST['namedm'];
                $id = $_POST['id'];
                update_dm($id, $namedm);
            }
            $listdm = loadall_dm();
            include "danhmuc/list.php";
            break;

            // CONTROLLER SẢN PHẨM
        case "addsp":
            if (isset($_POST['btn_add']) && ($_POST['btn_add'])) {
                $iddm = $_POST['iddm'];
                $namesp = $_POST['namesp'];
                $giasp = $_POST['giasp'];
                $motasp = $_POST['motasp'];
                $anhsp = $_FILES['anhsp']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["anhsp"]["name"]);
                move_uploaded_file($_FILES["anhsp"]["tmp_name"], $target_file);
                insert_sp($namesp, $giasp, $anhsp, $motasp, $iddm);
                $notice = "Thêm thành công!";
            }
            $listdm = loadall_dm();
            include "sanpham/add.php";
            break;
        case "listsp":
            if (isset($_POST['btn_search']) && ($_POST['btn_search'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdm = loadall_dm();
            $listsp = loadall_sp($kyw, $iddm);
            include "sanpham/list.php";
            break;
        case "xoasp":
            if (isset($_GET["id"]) && $_GET["id"] > 0) {
                delete_sp($_GET['id']);
            }
            $listdm = loadall_dm();
            $listsp = loadall_sp();
            include "sanpham/list.php";
            break;
        case "suasp":
            if (isset($_GET["id"]) && $_GET["id"] > 0) {
                $sp = loadone_sp($_GET["id"]);
            }
            $listdm = loadall_dm();
            include "sanpham/update.php";
            break;
        case "updatesp":
            if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                $iddm = $_POST['iddm'];
                $id = $_POST['id'];
                $namesp = $_POST['namesp'];
                $giasp = $_POST['giasp'];
                $motasp = $_POST['motasp'];
                $anhsp = $_FILES['anhsp']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["anhsp"]["name"]);
                move_uploaded_file($_FILES["anhsp"]["tmp_name"], $target_file);

                update_sp($id, $namesp, $giasp, $anhsp, $motasp, $iddm);
            }
            $listdm = loadall_dm();
            $listsp = loadall_sp();
            include "sanpham/list.php";
            break;

            // CONTROLLER TÀI KHOẢN

        case "dskh":
            $listtk = loadall_tk();
            include "taikhoan/list.php";
            break;
        case "xoatk":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                xoa_tk($id);
            }
            $listtk = loadall_tk();
            include "taikhoan/list.php";
            break;
        case "suatk":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $tk =  loadone_tk($id);
            }
            include "taikhoan/update.php";
            break;
        case 'capnhattk':
            if (isset($_POST['btn_capnhat']) && $_POST['btn_capnhat']) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $sdt = $_POST['sdt'];
                $vaitro = $_POST['vaitro'];
                update_tk($id, $user, $email, $diachi, $sdt, $vaitro);
            }
            $listtk = loadall_tk();
            include "taikhoan/list.php";
            break;

            // CONTROLLER BÌNH LUẬN
        case "dsbl":
            $listbl = loadall_bl(0);
            $listsp = loadall_sp();
            include "binhluan/list.php";
            break;
        case "xoabl":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                xoa_bl($id);
            }
            $listbl = loadall_bl($idsp);
            include "binhluan/list.php";
            break;
            // CONTROLLER ĐƠN HÀNG
        case 'dsdh':
            if (isset($_POST['kyw']) && $_POST['kyw'] != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            $listbill = loadall_bill_kyw($kyw, 0);
            include "donhang/list.php";
            break;
case 'xoabill': 
    if(isset($_GET['id'])) { 
        $id = $_GET['id'];
        xoa_bill($id);
    } else { 
        $listbill = [];
    }
    header("Location: index.php?act=dsdh");
    break;
   
            // CONTROLLER THỐNG KÊ
        case 'thongke':
            $listtk = loadall_thongke();
            include "thongke/list.php";
            break;
        case 'bieudo':
            $listtk = loadall_thongke();
            include "thongke/chart.php";
            break;

        default:
            include "content.php";
            break;
    }
} else {
    include "content.php";
}


include "footer.php";
