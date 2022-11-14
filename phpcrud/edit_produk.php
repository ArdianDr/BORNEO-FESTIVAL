<?php
include 'koneksi.php';

  if (isset($_GET['id_pesan'])) {
    $id_pesan = ($_GET["id_pesan"]);

    $query = "SELECT * FROM pesan WHERE id_pesan='$id_pesan'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }

    $data = mysqli_fetch_assoc($result);
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data id_pesan.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="crud.css">
    <title>CRUD</title>

</head>

<body>
    
    <div class="center">
        <h1>Edit Produk</h1>
    </div>
    <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
        <section class="base">
            <input name="id_pesan" value="<?php echo $data['id_pesan']; ?>" hidden />
            <div>
                <label>Nama</label>
                <input type="text" name="nama" value="<?php echo $data['nama']; ?>" autofocus="" required="" />
            </div>
            <div>
                <label>Email</label>
                <input type="text" name="email" value="<?php echo $data['email']; ?>" />
            </div>
            <div>
                <label>No. telp</label>
                <input type="text" name="notelp" required="" value="<?php echo $data['notelp']; ?>" />
            </div>
            <div>
                <label>Jumlah Pesanan</label>
                <input type="number" name="jumlah_tiket" required=""  min="1" max="20" value=" <?php echo $data['jumlah_tiket']; ?>" />
            </div>
            <div>
                <label>Kategori :</label>                        
                <label><input type="radio" name="kategori" value="VIP" style='width: 50px'> VIP</label>
                <label><input type="radio" name="kategori" value="Festival" style='width: 50px'>Festival</label>
            </div>
            <div>
                <label>Bukti Pembayaran</label>
                <img src="img/<?php echo $data['bukti_pembayaran']; ?>"
                    style="width: 120px;float: left;margin-bottom: 5px;">
                <input type="file" name="bukti_pembayaran" />
                <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
            </div>
            <div>
                <button type="submit">Simpan Perubahan</button>
            </div>
        </section>
    </form>
</body>

</html>