<?php
require_once "app.php";

$id = $_GET['id'];

$d = findLaguByID($conn, $id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lagu Detail</title>
</head>

<body>
    <h1>Detail Lagu</h1>

    <a href="/lagu.php">Kembali ke daftar lagu</a>

    <br>
    <br>

    <p>Tahun Lulus : <?= $d['nama_lagu'] ?></p>
    <p>Jenjang : <?= $d['genre'] ?></p>
    <p>Instansi : <?= $d['pencipta'] ?></p>
    <p>No. Ijazah : <?= $d['tahun_rilis'] ?></p>

</body>

</html>

<?php
mysqli_close($conn);
?>