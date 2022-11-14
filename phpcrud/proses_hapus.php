<?php
include 'koneksi.php';
$id_pesan = $_GET["id_pesan"];

    $query = "DELETE FROM pesan WHERE id_pesan='$id_pesan' ";
    $hasil_query = mysqli_query($koneksi, $query);

    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='index.php';</script>";
    }