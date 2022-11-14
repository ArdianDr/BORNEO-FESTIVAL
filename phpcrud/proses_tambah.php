<?php
include 'koneksi.php';
  $nama   = $_POST['nama'];
  $email  = $_POST['email'];
  $notelp = $_POST['notelp'];
  $jumlah_tiket  = $_POST['jumlah_tiket'];
  $kategori  = $_POST['kategori'];
  $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];
  $tanggal = $tanggal = date("Y-m-d H:i:s", );

if($bukti_pembayaran != "") {
  $ekstensi_diperbolehkan = array('png','jpg', 'jpeg'); 
  $x = explode('.', $bukti_pembayaran); 
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['bukti_pembayaran']['tmp_name'];   
  $angka_acak = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$bukti_pembayaran;
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
    move_uploaded_file($file_tmp, 'img/'.$nama_gambar_baru);
      $query = "INSERT INTO pesan (nama, email, notelp,  jumlah_tiket, kategori, bukti_pembayaran, tanggal) VALUES ('$nama', '$email','$notelp', '$jumlah_tiket','$kategori', '$nama_gambar_baru','$tanggal')";
      $result = mysqli_query($koneksi, $query);
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                  " - ".mysqli_error($koneksi));
        } else{
          echo "<script>alert('Invoice akan dikirim melalui email.');window.location='../index_utama.php';</script>";
        }

        } else{     
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpeg, jpg atau png.');window.location='tambah.php';</script>";
        }
} else {
  $query = "INSERT INTO pesan (nama, email, notelp, jumlah_tiket, kategori, bukti_pembayaran, tanggal) VALUES ('$nama', '$email','$notelp' ,'$jumlah_tiket','$kategori', null,,'$tanggal')";
  $result = mysqli_query($koneksi, $query);           
  if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
          " - ".mysqli_error($koneksi));
  } else{
    echo "<script>alert('Data berhasil ditambah.');window.location='index.html';</script>";
    }
}