<?php
session_start();
include "./model/pdo.php";
include "./model/danhmuc.php";
include "./model/sanpham.php";
include "./model/taikhoan.php";
include "./model/cart.php";
include "./view/header.php";
include "global.php";

// kiểm tra session my cart đã tồn tại là 1 mảng chưa, nếu chưa thì khởi tạo 1 mảng mới
if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
// gán 1 biến để trả về dữ liệu select từ modul sản phẩm
$spnew = loadall_sp_home();
$showlistdm = loadall_dm(); 
$top10sp = loadall_sp_top10();
// kiểm tra sự tồn tại của act rồi dùng switch case chọn điều hướng đến các chức năng
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {

            // CONTROLLER SẢN PHẨM
        case 'sanpham':
            if (isset($_POST['iptimkiem']) && $_POST['iptimkiem'] != "") {
                $iptimkiem = $_POST['iptimkiem'];
            } else {
                $iptimkiem = " ";  
            }
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $listsp = loadall_sp($iptimkiem, $iddm);
            $namedm = load_namedm($iddm);
            include "./view/sanpham.php";
            break;

            // CONTROLLER SẢN PHẨM CHI TIẾT
        case 'sanphamct':
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                $id = $_GET['idsp'];
                $onesp = loadone_sp($id);
                extract($onesp);
                $spsame = loadall_sp_same($id, $iddm);
                include "./view/sanphamct.php";
            } else {
                include "index.php";
            }
            break;
            
            // CONTROLLER ĐĂNG KÝ
        case 'dangky':
            if (isset($_POST['dangky']) && $_POST['dangky']) {
                $user = $_POST['user'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                insert_tk($user, $password, $email);
                $notice = "Đăng ký thành công! Vui lòng đăng nhập";
            }
            include "./view/taikhoan/dangky.php";
            break;

            // CONTROLLER ĐĂNG NHẬP
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $user = $_POST['user'];
                $password = $_POST['password'];
                $checkuser = check_user($user, $password);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header("Location: index.php");
                } else {
                    $notice = "Tài khoản không tồn tại! Vui lòng đăng nhập một tài khoản khác";
                    include "view/thongbaoloi.php";
                    break;
                }
            }
            include "index.php";
            break;

            // CONTROLLER ĐỔI MẬT KHẨU
        case 'doimk':
            if(isset($_POST['btn_doimk']) && ($_POST['btn_doimk'])) { 
                $id = $_POST['id'];
                $user = $_POST['user'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $newpass = $_POST['newpass'];
                update_mk($id, $user, $email,  $newpass);
                $_SESSION['user'] = check_user($user, $password);
                $notice = "Đổi mật khẩu thành công!";
            }
            include "view/taikhoan/doimk.php";
            break;

            // CONTROLLER CẬP NHẬT TÀI KHOẢN
        case 'capnhattk':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $sdt = $_POST['sdt'];
                update_tk_home($id, $user, $password,  $email, $diachi, $sdt);
                $_SESSION['user'] = check_user($user, $password);
                $notice = "Cập nhật tài khoản thành công!";
            }
            include "./view/taikhoan/capnhattk.php";
            break;

            // CONTROLLER QUÊN MẬT KHẨU
        case 'quenmk':
            if (isset($_POST['timmk']) && $_POST['timmk']) {
                $user = $_POST['user'];
                $email = $_POST['email'];
                $laymk = tim_mk($user, $email);
                if (is_array($laymk)) {
                    $notice = "Mật khẩu của bạn là: " . $laymk['password'];
                } else {
                    $noticeerr = "Email hoặc user không đúng!";
                }
            }
            include "./view/taikhoan/quenmk.php";
            break;
        case 'dangxuat':
            session_destroy();
            header("location: index.php");
            break;

            // CONTROLLER THÊM GIỎ HÀNG
        case 'addtocart':
            if (isset($_POST['addtocart']) && $_POST['addtocart']) {
                $id = $_POST['id'];
                $namesp = $_POST['namesp'];
                $anhsp = $_POST['anhsp'];
                $giasp = $_POST['giasp'];
                $soluong = 1;
                $thanhtien = $soluong * $giasp;
                $spadd = [$id, $namesp, $anhsp, $giasp, $soluong, $thanhtien];
                array_push($_SESSION['mycart'], $spadd);
            }
            include "view/giohang/viewcart.php";
            break;
        case 'xoacart':
            if (isset($_GET['idcart'])) {
                $idcart = $_GET['idcart'];
                array_splice($_SESSION['mycart'], $idcart, 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header('location: index.php?act=viewcart');
            break;
        case 'viewcart':
            include "view/giohang/viewcart.php";
            break;
        case 'bill':
            include "view/giohang/bill.php";
            break;
        case 'billconfirm':
            //tạo bill
            if (isset($_POST['orderconfirm']) && $_POST['orderconfirm']) {
                if (isset($_SESSION['user'])) {
                    $iduser = $_SESSION['user']['id'];
                    $user = $_POST['user'];
                    $diachi = $_POST['diachi'];
                    $sdt = $_POST['sdt'];
                    $email = $_POST['email'];
                    $pttt = $_POST['pttt'];
                    $ngaydathang = date('h:i:sa d/m/Y');
                    $tongdonhang = tongdonhang();
                    $idbill = insert_bill($iduser, $user, $diachi, $sdt, $email, $pttt, $ngaydathang, $tongdonhang);
                } else {
                    $noticebill = "Bạn phải đăng nhập để đặt hàng!";
                    include "view/thongbaoloi.php";
                    break;
                }
                // insert into cart: $session['mycart'] & $idbill:
                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                }

                // khi đã ấn xác nhận đặt hàng thì reset lại $_SESSION['mycart']:
                $_SESSION['mycart'] = [];
            }
            $bill = loadone_bill($idbill);
            $billct = loadall_cart($idbill);
            include "view/giohang/billconfirm.php";
            break;

            // CONTROLLER GIỎ HÀNG CỦA TÔI
        case 'mybill':
            $listbill = loadall_bill($_SESSION['user']['id']);
            include "view/giohang/mybill.php";
            break;
        case 'xoabill':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                xoa_bill($id);
            }
            $listbill = loadall_bill($_SESSION['user']['id']);
            include "view/giohang/mybill.php";
            break;
        case 'gioithieu':
            include "./view/gioithieu.php";
            break;
        case 'lienhe':
            include "./view/lienhe.php";
            break;
        case 'gopy':
            include "./view/gopy.php";
            break;
        case 'hoidap':
            include "./view/hoidap.php";
            break;
        default:
            include "./view/content.php";
            break;
    }
} else {
    include "./view/content.php";
}

include "./view/footer.php";
