<!DOCTYPE HTML>
<html>

<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style_login.css">
</head>

<body>
    <center>
        <div class="judul">
            Admin Pustaka
        </div>
        <div class="container">
            <h1>Login</h1>
            <?php if (isset($_GET['error'])) {
                echo "username atau password salah";
            } ?>
            <form action="cek_login.php" method="POST">
                <label for="">Username</label><br>
                <input type="text" name="user"><br>
                <label for="">Password</label><br>
                <input type="password" name="pass"><br>
                <button type="submit" name="submit">Log In</button>
            </form>
        </div>
    </center>
</body>

</html>