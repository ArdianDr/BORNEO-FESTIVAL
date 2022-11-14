<?php
session_start();
require 'koneksi.php';


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cek_email= "SELECT * FROM user WHERE email = '$email'";
    $cek_email2= "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($conn, $cek_email);
    $result2 = mysqli_query($conn, $cek_email2);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            
            echo "<script>
                alert('Login berhasil!');
                document.location.href = 'index_utama.php';
            </script>";
        }
    }
    if (mysqli_num_rows($result2) === 1) {
        $row = mysqli_fetch_assoc($result2);
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            
            echo "<script>
                alert('Login berhasil!');
                document.location.href = 'phpcrud/index.php';
            </script>";
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>LOGIN</title>
</head>

<body>
    <div class="container">
    <div class="loginlg">
        <img src="img/logo2.png" width="85px" alt="">
    </div>
        <div class="login">
        <?php if (isset($error)) : ?>
        <center>
            <p style="color: red; font-weight:600;">Email/Password is Wrong!</p>
        </center>
        <?php endif; ?>
        <form action="" method="post">
            <p class="login">Sign In</p>
            <hr>
            <p>Borneo Festival</p>
            <label>Email</label>
            <input type="text" id="email" name="email" placeholder="exemple@gmail.com" class="form_login" required>

            <label>Password</label>
            <input type="password" id="password" name="password" placeholder="Password" class="form_login" required>

            <input type="submit" class="tombol_login" name="login" placeholder="Log In">

            <br />
            <br />
            <center>
                Not a member ?<a class="link" href="registrasi.php"> Sign Up</a>
            </center>
        </form>
    </div>
    
</body>

</html>