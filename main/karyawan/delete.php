<?php
require "../conn.php";
$npk = $_GET['npk'];

$sql = "DELETE FROM tb_master WHERE npk=$npk";

if(mysqli_query($conn, $sql)) {
    echo "Record has been deleted";
    echo "<script>window.location='karyawan.php'</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>