<?php
require 'koneksi.php';

if (isset($_POST['register'])) {
    $email = strtolower(stripslashes($_POST['email']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    if ($password == $cpassword) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $cek_email = "SELECT email FROM user WHERE email = '$email'";
        $temp = mysqli_query($conn, $cek_email);
        $row = mysqli_fetch_assoc($temp);

        if ($row) {
            echo "<script>
                alert('email ini telah digunakan!');
                document.location.href = 'registrasi.php';
            </script>";
        } else {
            $insert_sql = "INSERT INTO user VALUES ('','$email','$password')";
            mysqli_query($conn, $insert_sql);

            if (mysqli_affected_rows($conn) > 0) {
                echo "<script>
                        alert('Data berhasil diregistrasi!');
                        document.location.href = 'index.php';
                    </script>";
            } else {
                echo "<script>
                        alert('Data gagal diregistrasi!');
                        document.location.href = 'registrasi.php';
                    </script>";
            }
        }
    } else {
        echo "<script>
                    alert('Konfirmasi Password tidak sesuai!');
                    document.location.href = 'registrasi.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Registrasi</title>
</head>

<body>
    <div class="container">
    <div class="loginlg">
    <img src="logo2.png" malt="">
    </div>

        <form action="" method="post">
            <p class="login">Sign Up</p>
            <hr>
            <p>Borneo Festival</p>

            <label>Email</label>
            <input type="text" id="email" name="email" placeholder="exemple@gmail.com" class="form_login" required>

            <label>Password</label>
            <input type="password" id="password" name="password" placeholder="Password" class="form_login" required>

            <label>Confirm Password</label>
            <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" class="form_login"
                required>

            <input type="submit" class="tombol_login" name="register" placeholder="Registrasi">
        </form>
    
    </div>
    
</body>

</html>