<?php 
session_start();
ob_start();
include 'config.php';
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
    echo "<p align='center'>Anda Harus Login Terlebih dahulu!</p>";
    echo "<meta http-equiv='refresh' content='2;url=login.php'>";
} else {
    define('INDEX', true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        Aplikasi Manajemen Pegawai
    </header>
    <div class="container">
        <aside>
            <ul class="menu">
                <li><a href="dashboard.php" class="aktif">Dashboard</a></li>
                <li><a href="?hal=pegaawai">Data Pegawai</a></li>
                <li><a href="logout.php">Keluar</a></li>
            </ul>
        </aside>
        <section class="main">
            <?php
            include 'konten.php';
            ?>
        </section>
    </div>
    <footer>
        Copyright &copy; Vio Aprivia Nugraha
    </footer>
</body>
</html>
<?php
}
?>
