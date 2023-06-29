<?php
// func show sản phẩm và sửa code html
function viewcart($colxoa)
{
    global $img_path;
    $tongtien = 0;
    $i = 0;

    if ($colxoa == 1) {
        $xoasp_th = '<th>Thao tác</th>';
    } else {
        $xoasp_th = '';
    }
    echo '
    
    <thead>
    <tr>
    <th>Hình ảnh</th>
    <th>Sản phẩm</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
   ' . $xoasp_th . '
</tr>
</thead>';
    foreach ($_SESSION['mycart'] as $cart) {
        $anhsp = $img_path . $cart[2];
        $thanhtien = $cart[3] * $cart[4];
        $tongtien += $thanhtien;
        if ($colxoa == 1) {
            $xoasp_td = '<a href="index.php?act=xoacart&idcart=' . $i . '"><input type="button" class="btn btn-danger" value="Xóa"></a>';
        } else {
            $xoasp_td = '';
        }

        echo '
  <tbody>
      <tr>
          <td><img src="' . $anhsp . '" alt="Ảnh sản phẩm" width="50px"></td>
          <td>' . $cart[1] . '</td>
          <td>' . $cart[3] . '</td>
          <td>' . $cart[4] . '</td>
          <td>' . $thanhtien . '</td>
          <td>' . $xoasp_td . '</td>
        </tr>
        </tbody> ';

        $i += 1;
    }

    echo '  <tr>
          <td colspan="6"><p class="ttt">Tổng thành tiền: <span class="text-danger">$' . $tongtien . '</span></p>  </td>
        </tr>';
}
//func show bill chia tiết
function show_billct($listbill)
{
    global $img_path;
    $tongtien = 0;
    $i = 0;
    echo '
    <thead>
    <tr>
    <th>Hình ảnh</th>
    <th>Sản phẩm</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
</tr>
</thead>';
    foreach ($listbill as $cart) {
        $anhsp = $img_path . $cart['anhsp'];
        $tongtien += $cart['thanhtien'];
        echo '
  <tbody>
      <tr>
          <td><img src="' . $anhsp . '" alt="Ảnh sản phẩm" width="50px"></td>
          <td>' . $cart['namesp'] . '</td>
          <td>' . $cart['giasp'] . '</td>
          <td>' . $cart['soluong'] . '</td>
          <td>' . $cart['thanhtien'] . '</td>
        </tr>
        </tbody> ';

        $i += 1;
    }

    echo '  <tr>
          <td colspan="5"><p class="ttt">Tổng thành tiền: <span class="text-danger">$' . $tongtien . '</span></p>  </td>
        </tr>';
}
function tongdonhang()
{
    $tongtien = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $thanhtien = $cart[3] * $cart[4];
        $tongtien += $thanhtien;
    }
    return $tongtien;
}
function insert_bill($iduser, $user, $diachi, $sdt, $email, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "INSERT INTO hoa_don(iduser, user, diachi, sdt, email, pttt, ngaydathang, tongdonhang) values ('$iduser','$user', '$diachi', '$sdt', '$email', '$pttt', '$ngaydathang',' $tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}
function insert_cart($iduser, $idsp, $anhsp, $namesp, $giasp, $soluong, $thanhtien, $idbill)
{
    $sql = "INSERT INTO gio_hang(iduser, idsp, anhsp, namesp, giasp, soluong, thanhtien, idbill) values ('$iduser', '$idsp', '$anhsp', '$namesp', '$giasp', '$soluong', '$thanhtien', '$idbill')";
    pdo_execute($sql);
}
function loadone_bill($id)
{
    $sql = "SELECT * FROM hoa_don WHERE id=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadall_cart($idbill)
{
    $sql = "SELECT * FROM gio_hang WHERE idbill=" . $idbill;
    $bill = pdo_query($sql);
    return $bill;
}
function loadall_cart_count($idbill)
{
    $sql = "SELECT * FROM gio_hang WHERE idbill=" . $idbill;
    $bill = pdo_query($sql);
    return count($bill);
}
function loadall_bill($iduser)
{
    $sql = "SELECT * FROM hoa_don WHERE iduser= ".$iduser ;
    $sql .= " ORDER BY id DESC";
    $bill = pdo_query($sql);
    return $bill;
}
function loadall_bill_kyw($kyw = "", $iduser = 0)
{
    $sql = "SELECT * FROM hoa_don WHERE 1";
    if ($iduser > 0)  $sql .= " AND iduser=" . $iduser;
    if ($kyw != "")  $sql .= " AND id LIKE '%" . $kyw . "%'";
    $sql .= " ORDER BY id DESC";
    $listbill = pdo_query($sql);
    return $listbill;
}
function xoa_bill($id)
{
    $sql = "DELETE FROM hoa_don WHERE id=" . $id;
    pdo_execute($sql);
}
function get_ttdh($kttt)
{
    switch ($kttt) {
        case '0':
            $tt = "Đơn hàng mới";
            break;
        case '2':
            $tt = "Đang xử lý";
            break;
        case '3':
            $tt = "Đang giao hàng";
            break;
        case '4':
            $tt = "Đã giao hàng";
            break;
        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}
function loadall_thongke()
{
    $sql = "SELECT dm.id as madm, dm.namedm as tendm, count(sp.id) as countsp, min(sp.giasp) as mingiasp, max(sp.giasp) as maxgiasp, avg(sp.giasp) as avggiasp";
    $sql .= " FROM san_pham sp LEFT JOIN danh_muc dm ON dm.id = sp.iddm";
    $sql .= " GROUP BY dm.id ORDER BY dm.id DESC";
    $listbill = pdo_query($sql);
    return $listbill;
}
