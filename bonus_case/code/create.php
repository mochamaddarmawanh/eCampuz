<?php

include('conn.php');

$instansi = $_POST['instansi'];
$deskripsi = $_POST['deskripsi'];

$save_instansi = $_POST['save_instansi'];

if ($save_instansi) {
    $conn->query("INSERT INTO tb_instansi (instansi, deskripsi) VALUES ('$instansi', '$deskripsi')");
    header("location:../instansi.php?create=sukses");
}