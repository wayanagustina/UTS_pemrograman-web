<?php
require_once "app.php";

$id = $_GET["id"];
$sql = "DELETE FROM `lagu` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: lagu.php?msg=Data deleted successfully");
} else {
    echo "Failed: " . mysqli_error($conn);
}