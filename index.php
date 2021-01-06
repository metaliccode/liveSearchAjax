<?php
// koneksi ke database 
require 'functions.php';
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// ambil data seluruh mahasiswa 
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC ");

// tombol cari di klik 
if (isset($_POST["cari"])) {
    $mahasiswa =  cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Mahasiswa</h1>
    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br><br>
    <!-- Form untuk pencarian  -->
    <form action="" method="POST">
        <input id="keyword" type="text" name="keyword" size="30" autofocus placeholder="Masukan Keyword Pencarian..." autocomplete="off">
        <button id="tombol-cari" type="submit" name="cari">CARI!</button>
    </form>
    <!-- akhir form pencarian  -->

    <br><br>
    <!-- tabel Mahasiswa  -->
    <div id="container">
        <table border="1" cellspacing="0" cellpadding="5">
            <tr>
                <th>No.</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Nip</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1;
            foreach ($mahasiswa as $row) :
            ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><img src="img/<?= $row["gambar"]; ?>" width="30"></td>
                    <td><?= $row["nip"]; ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><?= $row["jurusan"]; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>
                        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin?');">Hapus</a>
                    </td>
                </tr>
            <?php $i++;
            endforeach; ?>
        </table>
    </div>
    <!-- end tabel mahasiswa -->

    <!-- script js (Ajax) -->
    <script src="js/script.js"></script>
</body>

</html>