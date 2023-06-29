<?php 
function insert_dm($namedm) { 
    $sql = "INSERT INTO danh_muc(namedm) values ('$namedm')";
    pdo_execute($sql);
}
function delete_dm($id) { 
    $sql = "DELETE FROM danh_muc WHERE id=" .$id;
    pdo_execute($sql);
} 
function loadall_dm() { 
    $sql = "SELECT * FROM danh_muc order by id desc";
    $listdm = pdo_query($sql);
    return $listdm;
}
function loadone_dm($id) { 
    $sql = "SELECT * FROM danh_muc WHERE id=" .$id;
    $dm = pdo_query_one($sql);
    return $dm;
}
// loadone danh mục để lấy tên danh mục
function load_namedm($iddm) {
if ($iddm > 0 ) { 
    $sql = "SELECT * FROM danh_muc WHERE id=" .$iddm;
    $dm = pdo_query_one($sql);
    extract($dm);
    return $namedm;
}  else { 
    return " ";
}
}
function update_dm($id, $namedm){ 
    $sql = "UPDATE danh_muc SET namedm = '$namedm' WHERE id=" . $id;
    pdo_execute($sql);
}
?>
