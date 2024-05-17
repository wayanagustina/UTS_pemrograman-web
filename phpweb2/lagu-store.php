<?php
require_once "app.php";
session_start();

$n = laguBaru($conn, $_POST);

mysqli_close($conn);

if (is_null($n)) {
    $_SESSION['BERHASIL_TAMBAH_LAGU'] = "Gagal Menambah Lagu";
} else {
    $_SESSION['BERHASIL_TAMBAH_LAGU'] = "Berhasil menambah data nama_lagu: {$_POST['nama_lagu']}, genre: {$_POST['genre']}, pencipta: {$_POST['pencipta']}, tahun rilis: {$_POST['tahun_rilis']}";
}

header("Location: /lagu.php");
die();
