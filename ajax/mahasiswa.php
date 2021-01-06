<?php
require '../functions.php';

// ambil keyword dari ajax
$keyword = $_GET["keyword"];

$query = "SELECT * FROM mahasiswa WHERE 
            nama LIKE '%$keyword%' OR 
            nip LIKE '%$keyword%' OR 
            email LIKE '%$keyword%' OR 
            jurusan LIKE '%$keyword%'
            ORDER BY id ASC
            ";

$mahasiswa = query($query);
?>
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