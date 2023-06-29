<?php
function loadall_tk() { 
    $sql = "SELECT * FROM tai_khoan order by id desc";
    $listtk = pdo_query($sql);
    return $listtk;
}
function insert_tk($user, $password, $email)
{
    $sql = "INSERT INTO tai_khoan(user, password, email) values ('$user','$password','$email')";
    pdo_execute($sql);
}

function check_user($user, $password)
{
    $sql = "SELECT * FROM tai_khoan WHERE user='" . $user . "' AND password='" . $password . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function tim_mk($user, $email)
{
    $sql = "SELECT * FROM tai_khoan WHERE user='" . $user . "' AND email ='" . $email . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function xoa_tk($id) { 
    $sql = "DELETE FROM tai_khoan WHERE id='" . $id . "'";
    pdo_execute($sql);
}
function loadone_tk($id)
{
    $sql = "SELECT * FROM tai_khoan WHERE id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function update_tk($id, $user, $email, $diachi, $sdt, $vaitro)
{
    $sql = "UPDATE tai_khoan SET
user= '$user',
email='$email',  
diachi='$diachi',
sdt='$sdt', 
vaitro = '$vaitro' 
WHERE id= $id";
    pdo_execute($sql);
}
function update_tk_home($id, $user, $password,  $email, $diachi, $sdt)
{
    $sql = "UPDATE tai_khoan SET
user= '$user',
password='$password',
email='$email',  
diachi='$diachi',
sdt='$sdt' 
WHERE id= $id";
    pdo_execute($sql);
}
function update_mk($id, $user, $email,  $newpass)
{
    $newpass = $_POST['newpass'];
    $sql = "UPDATE tai_khoan SET
user= '$user',
password='$newpass',
email='$email'
WHERE id= $id";
    pdo_execute($sql);
}


