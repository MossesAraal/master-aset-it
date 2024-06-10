<?php
require "../conn.php";

$no_req = $_POST['no_req'];
$nama = $_POST['nama'];
$npk = $_POST['npk'];
$kebutuhan = $_POST['kebutuhan'];
$item = $_POST['item'];
$department = $_POST['department'];
$keperluan = $_POST['keperluan'];

$sql = "UPDATE tb_master SET nama='$nama', npk=$npk, kebutuhan='$kebutuhan', item='$item', department='$department', keperluan='$keperluan' WHERE no_req='$no_req'";

if(mysqli_query($conn, $sql)) {
    echo "Record has been updated";
    echo "<script>window.location='karyawan.php';</script>";
} else {
    echo "Error: " . mysqli_error();
}

mysqli_close($conn);
?>