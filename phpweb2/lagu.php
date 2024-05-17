<?php
session_start();
require_once "app.php";

$p = getAllData($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lagu</title>
    <style>
        table,
        th,
        td {
            border: 1px solid;
            padding: 10px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }
    </style>
</head>

<body>
    <h1>List Lagu</h1>

    <a href="/">Kembali ke home</a>

    <br>

    <a href="/lagu-tambah.php">Tambah</a>

    <br>
    <br>

    <?php if (isset($_SESSION['BERHASIL_TAMBAH_LAGU'])) : ?>
        <p><?= $_SESSION['BERHASIL_TAMBAH_LAGU'] ?></p>
        <?php session_unset(); ?>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>Nama lagu</th>
                <th>Genre</th>
                <th>Pencipta</th>
                <th>Tahun Rilis</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($p as $k => $v) : ?>
                <tr>
                    <td><?= $v['nama_lagu'] ?></td>
                    <td><?= $v['genre'] ?></td>
                    <td><?= $v['pencipta'] ?></td>
                    <td><?= $v['tahun_rilis'] ?></td>
                    <td><a href="<?= "/lagu-detail.php?id={$v['id']}" ?>">Detail</a>
                    <a href="<?= "/lagu-edit.php?id={$v['id']}" ?>">Edit</a>
                    <a href="<?= "/lagu-delete.php?id={$v['id']}" ?>">Delete</a>
                    
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>

<?php
mysqli_close($conn);
?>