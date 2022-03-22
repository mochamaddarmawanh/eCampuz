<?php

include('conn.php');

$id_instansi = $_POST['id_instansi'];

if ($_POST['delete']) {
    $conn->query("DELETE FROM tb_instansi WHERE id_instansi = '$id_instansi'");
    header("location:../instansi.php?create=delete");
}