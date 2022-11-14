<?php
  include('koneksi.php'); 
  
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
    <title>ADMIN</title>

</head>

<body>
    <nav class="navtop">
    	<div>
    		<h1>borneo festival</h1>
    	</div>
    </nav>
    <div class="center">
        <h1>Pesan tiket</h1>
    </div>
    <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
        <section class="base">
            <div>
                <label>Nama</label>
                <input type="text" name="nama" autofocus="" required="" />
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" />
            </div>
            <div>
                <label>No. Telpon</label>
                <input type="number" name="notelp" required="" />
            </div>
            <div>
                <label>Jumlah Tiket</label>
                <input type="number" name="jumlah_tiket" required="" min="1" max="20" />
            </div>
            <div>
                <label>Kategori :</label>                        
                <label><input type="radio" name="kategori" value="VIP" style='width: 50px'> VIP (Rp. 150.000/tiket)</label>
                <label><input type="radio" name="kategori" value="Festival" style='width: 50px'>Festival (Rp. 100.000/tiket)</label>
            </div>
            <div>
                <label>Bukti Pembayaran (Rek. BRI: 7632-01-007520-53-0)</label>
                <input type="file" name="bukti_pembayaran" required="" />
            </div>

            <div>
                <button class="kirim" type="submit">Kirim</button>
            </div>

           
        </section>
        
    </form>
</body>

</html>