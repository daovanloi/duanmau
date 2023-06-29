<?php 
function insert_bl($noidung, $iduser, $idsp, $ngaybl) { 
    $sql = "INSERT INTO binh_luan(noidung, iduser, idsp, ngaybl) values ('$noidung', '$iduser', '$idsp', '$ngaybl')";
    pdo_execute($sql);
}
function loadall_bl($idsp) { 
    $sql ="SELECT * FROM binh_luan where 1";
    if($idsp > 0 )
    $sql .=" AND idsp='".$idsp."'";
    else
    $sql .=" ORDER BY id DESC";
    $listbl = pdo_query($sql);
    return $listbl;
}
function xoa_bl($id) { 
    $sql = "DELETE FROM binh_luan WHERE id=" .$id;
    pdo_execute($sql);
} 
?>