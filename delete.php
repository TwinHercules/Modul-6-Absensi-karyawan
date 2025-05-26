<?php
include 'connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM `karyawan_absensi` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: dashboard.php?message=deleted");
}

?>