<?php
include '../../inc/koneksi.php';
session_start();

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$sql = mysqli_query($koneksi, "SELECT * FROM jenis_barang");
$id_jenis = $_SESSION['id_jenis'];
$edit = mysqli_query($koneksi, "SELECT * FROM jenis_barang WHERE id_jenis='$id_jenis'");

if (isset($_POST['proses-tambah'])) {
    $_SESSION['fungsi'] = "tambah-jenis";
}

if (isset($_POST['kembali'])) {
    $_SESSION['fungsi'] = "muncul";
}

if (isset($_POST['proses-edit'])) {
    $_SESSION['fungsi'] = "edit-jenis";
    $_SESSION['id_jenis'] = $_POST['id_jenis'];
}

if (isset($_POST['tambah'])) {
    $nama_jenis = $_POST['nama_jenis'];
    $_SESSION['fungsi'] = "muncul";
    mysqli_query($koneksi, "INSERT INTO jenis_barang VALUES('','$nama_jenis')");
    header('location:index.php');
}

if (isset($_POST['edit-aja'])) {
    $id_jenis = $_SESSION['id_jenis'];
    $nama_jenis = $_POST['nama_jenis'];
    $_SESSION['fungsi'] = "muncul";
    mysqli_query($koneksi, "UPDATE jenis_barang SET nama_jenis='$nama_jenis' WHERE id_jenis='$id_jenis'");
    header('location:index.php');
}

if (isset($_POST['hapus'])) {
    $id_jenis = $_POST['id_jenis'];
    $_SESSION['fungsi'] = "muncul";
    mysqli_query($koneksi, "DELETE FROM jenis_barang WHERE id_jenis='$id_jenis'");
    header('location:index.php');
}
?>