<?php
function insert_sp($namesp, $giasp, $anhsp, $motasp, $iddm)
{
    $sql = "INSERT INTO san_pham(namesp, giasp, anhsp, motasp, iddm) values ('$namesp','$giasp','$anhsp','$motasp','$iddm')";
    pdo_execute($sql);
}
function delete_sp($id)
{
    $sql = "DELETE FROM san_pham WHERE id=" . $id;
    pdo_execute($sql);
}
// phần show sản phẩm trang home
function loadall_sp_home()
{
    $sql = "SELECT * FROM san_pham WHERE 1 ORDER BY id desc limit 0,12";
    $listsp = pdo_query($sql);
    return $listsp;
}
// phần show top 10 sản phẩm trang home
function loadall_sp_top10()
{
    $sql = "SELECT * FROM san_pham WHERE 1 ORDER BY luotxemsp desc limit 0,10";
    $listsp = pdo_query($sql);
    return $listsp;
}
function loadall_sp($kyw = "", $iddm = 0)
{
    $sql = "SELECT * FROM san_pham WHERE 1";
    if ($kyw != '') {
        $sql .= " AND namesp LIKE'%" . $kyw . "%' ";
    }
    if ($iddm > 0) {
        $sql .= " AND iddm = '" . $iddm . "' ";
    }
    $sql .= " ORDER BY id desc";
    $listsp = pdo_query($sql);
    return $listsp;
}
function loadone_sp($id)
{
    $sql = "SELECT * FROM san_pham WHERE id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}

function loadall_sp_same($id, $iddm)
{
    $sql = "SELECT * FROM san_pham WHERE iddm =" . $iddm ." AND id <> ".$id ;
    $listsp = pdo_query($sql);
    return $listsp;
}
function update_sp($id, $namesp, $giasp, $anhsp, $motasp, $iddm)
{
    if ($anhsp != '')
        $sql = "UPDATE san_pham SET
iddm = '$iddm',
namesp='$namesp',
giasp='$giasp', 
anhsp='$anhsp', 
motasp='$motasp'
WHERE id='$id'";
    else
        $sql = "UPDATE san_pham SET
iddm = '$iddm',
namesp='$namesp',
giasp='$giasp', 
motasp='$motasp'
WHERE id= $id";

    pdo_execute($sql);
}
