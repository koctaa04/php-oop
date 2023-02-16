<?php
include '../config/koneksi.php';

$db = new Database();
$aksi = $_GET['aksi'];

if($aksi == "tambah") {
    // tambah siswa
    // 
    $db->tambah_siswa($_POST['nis'], $_POST['nama'], $_POST['tgl_lahir'] , $_POST['alamat']);
    header("location:siswa.php");
} elseif ($aksi == "update") {
    // var_dump($_POST);
    // die;
    // update siswa
    $db->update_siswa($_POST['id'], $_POST['nis'], $_POST['nama'], $_POST['tgl_lahir'], $_POST['alamat']);
    header("location:siswa.php");
} elseif ($aksi == "hapus") {
    $db->hapus_siswa($_GET['id']);
    header("location:siswa.php");
}

?>