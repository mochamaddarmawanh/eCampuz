<?php

include('conn.php');

$id_instansi = $_POST['id_instansi'];
$instansi = $_POST['instansi'];
$deskripsi = $_POST['deskripsi'];

$update = $_POST['update'];

if ($update) {
    $conn->query("UPDATE tb_instansi SET instansi = '$instansi', deskripsi = '$deskripsi' WHERE id_instansi = '$id_instansi'");
    header("location:../instansi.php?create=update");
}