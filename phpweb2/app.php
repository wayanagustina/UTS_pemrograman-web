<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uts";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Gagal konek ke database: " . mysqli_connect_error());
}

function getAllData($conn)
{
    $sql = "SELECT * FROM lagu";
    $result = mysqli_query($conn, $sql);

    $data = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    return $data;
}

function findLaguByID($conn, $id)
{
    $sql = "SELECT * FROM lagu WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            return $row;
        }
    }

    return null;
}

function laguBaru($conn, $data)
{
    $sql = "INSERT INTO lagu
    (nama_lagu, genre, pencipta, tahun_rilis)
    VALUES (
        '{$data['nama_lagu']}', 
        '{$data['genre']}', 
        '{$data['pencipta']}', 
        '{$data['tahun_rilis']}'
    );";

    if (mysqli_query($conn, $sql)) {
        return mysqli_insert_id($conn);
    }

    return null;
}
