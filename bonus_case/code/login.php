<?php

include('conn.php');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$login = $_POST['login'];

$cek_login = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
$count_login = mysqli_num_rows($cek_login);

if ($login) {
    if ($count_login == 1) {
        $_SESSION = mysqli_fetch_assoc($cek_login);
        if ($_SESSION['id_user'] == "0") {
            $_SESSION['id_user'] = "0";
        } else {
            $_SESSION['id_user'] = "1";
        }
        echo "<script>window.location.href='instansi.php'</script>";
    } else {
        $message = "<div class='demo-spacing-0'><div class='alert alert-danger mt-1 alert-validation-msg alert-dismissible fade show' role='alert'><div class='alert-body d-flex align-items-center'><i data-feather='info' class='me-50'></i><span><strong>Incorrect</strong> id or password is, Please try again.</span></div><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div></div>";
    }
}
